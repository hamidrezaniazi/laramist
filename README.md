# Laramist - Laravel Model History (5.8+)

[![Latest Version on Packagist](https://img.shields.io/packagist/v/hamidrezaniazi/laramist.svg?style=flat-square)](https://packagist.org/packages/hamidrezaniazi/laramist)
[![Build Status](https://img.shields.io/travis/hamidrezaniazi/laramist/master.svg?style=flat-square)](https://travis-ci.org/hamidrezaniazi/laramist)
[![StyleCI](https://github.styleci.io/repos/213745197/shield?branch=master)](https://github.styleci.io/repos/213745197)
[![Quality Score](https://img.shields.io/scrutinizer/g/hamidrezaniazi/laramist.svg?style=flat-square)](https://scrutinizer-ci.com/g/hamidrezaniazi/laramist)
[![Total Downloads](https://img.shields.io/packagist/dt/hamidrezaniazi/laramist.svg?style=flat-square)](https://packagist.org/packages/hamidrezaniazi/laramist)

The logging model's changes have never been easier like this.

## Installation

You can install the package via composer:
```bash
composer require hamidrezaniazi/laramist
```
You can publish the migration with:
```bash
php artisan vendor:publish --provider="Hamidrezaniazi\Laramist\LaramistServiceProvider" --tag="migrations"
```
After publishing the migration you can create the model_histories table by running the migrations:
```bash
php artisan migrate
```

## Usage
You should just use the trait bellow in the model which you want log its changes.
``` php
use ModelHistoryTrait;
```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email hamidrezaniazi@yahoo.com instead of using the issue tracker.

## Credits

- [Hamidreza Niazi](https://github.com/hamidrezaniazi)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
