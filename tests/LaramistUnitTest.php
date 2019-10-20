<?php

namespace Hamidrezaniazi\Laramist\Tests;

use Orchestra\Testbench\TestCase;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Testing\WithFaker;
use Hamidrezaniazi\Laramist\Tests\Model\User;
use Hamidrezaniazi\Laramist\Models\ModelHistory;
use Hamidrezaniazi\Laramist\Tests\Model\MockModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Hamidrezaniazi\Laramist\Tests\Migrations\CreateMockModelsTable;
use Hamidrezaniazi\Laramist\Tests\Migrations\CreateLaramistUsersTable;

class LaramistUnitTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function getEnvironmentSetUp($app)
    {
        include_once __DIR__.'/../database/migrations/create_model_histories_table.php.stub';

        (new \CreateModelHistoriesTable())->up();
        (new CreateMockModelsTable())->up();
        (new CreateLaramistUsersTable())->up();
    }

    /**
     * @test
     */
    public function itShouldHaveMorphRelationToOtherModels()
    {
        $modelHistory = new ModelHistory();
        $this->assertInstanceOf(MorphTo::class, $modelHistory->subject());
    }

    /**
     * @test
     */
    public function itCanLogModelChanges()
    {
        Event::fake();
        $user = User::create();
        $model = MockModel::create([
            'first_field'  => $this->faker->word,
            'second_field' => $this->faker->word,
        ]);
        $model->first_field = 'changed_first_data';
        $model->save();
        ModelHistory::logChanges($model, $user);
        $this->assertDatabaseHas('model_histories', [
            'subject_type' => $model->getMorphClass(),
            'subject_id'   => $model->id,
            'changed'      => json_encode($model->getChanges()),
            'causer_id'    => $user->id,
        ]);
        $modelHistory = ModelHistory::first();
        $this->assertEquals('changed_first_data', $modelHistory->changed['first_field']);
        $this->assertArrayHasKey('first_field', $modelHistory->changed);
        $this->assertArrayNotHasKey('second_field', $modelHistory->changed);
    }

    /**
     * @test
     */
    public function itShouldNotStoreChangeLogIfModelWasNotChanged()
    {
        Event::fake();
        $user = User::create();
        $model = MockModel::create([
            'first_field'  => $this->faker->word,
            'second_field' => $this->faker->word,
        ]);
        ModelHistory::logChanges($model, $user);
        $this->assertDatabaseMissing('model_histories', [
            'subject_type' => $model->getMorphClass(),
            'subject_id'   => $model->id,
            'changed'      => json_encode($model->getChanges()),
            'causer_id'    => $user->id,
        ]);
    }
}
