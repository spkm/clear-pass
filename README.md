![Banner](https://banners.beyondco.de/ClearPass%20API.png?theme=dark&packageManager=composer+require&packageName=spkm%2Fclear-pass&pattern=architect&style=style_2&description=&md=1&showWatermark=1&fontSize=100px&images=https%3A%2F%2Flaravel.com%2Fimg%2Flogomark.min.svg)

#### A PHP package for managing Guest WiFi users on Aruba ClearPass.

## Installation and usage
This package requires PHP 8.3 & Laravel 11.0 or higher. See the `tests/` folder for documentation.

### Basic Installation
You can install this package via composer using:
```
composer require spkm/clear-pass
```
Publish the config file with:
```
php artisan vendor:publish --provider="spkm\ClearPass\ClearPassServiceProvider"
```

### Usage

```php
use spkm\ClearPass\Facades\ClearPass;
use spkm\ClearPass\Requests\GetGuestUsersRequest;

$paginator = ClearPass::paginate(new GetGuestUsersRequest());

foreach ($paginator as $response) {
    $response->json();
}
```

### Security

If you discover any security related issues, please email hello@spkmitchell.co.uk instead of using the issue tracker.

## Credits

- [Simon Mitchell](https://github.com/spkm)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
