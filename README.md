# Layout Features

[![Latest Version on Packagist](https://img.shields.io/packagist/v/inmanturbo/layout-features.svg?style=flat-square)](https://packagist.org/packages/inmanturbo/layout-features)

Layout feature for inmanturbo/features and the laravel-starter-kits.

## Installation

You can install the package via composer:

```bash
composer require inmanturbo/layout-features
```

The service provider will be automatically registered thanks to Laravel's package auto-discovery.

## Publishing Assets

### Publish the configuration file

```bash
php artisan vendor:publish --tag=layout-config
```

This will publish the `layout.php` configuration file to your `config` directory.

### Publish the view examples

```bash
php artisan vendor:publish --tag=layout-views
```

This will publish the Livewire component view to `resources/views/livewire/layout-features.blade.php`.

## Layout Class Methods

The `Layout` class provides several public static methods for managing layout features:

### `updateCurrentLayout(string|Layout $layout)`
Updates the current layout for the authenticated user. Accepts either a layout name string or a Layout instance.

### `currentLayout(): ?Layout`
Returns the current active Layout instance for the authenticated user, or null if none is set.

### `layoutComponent(): ?string`
Returns the component name of the current layout, or null if no layout is active.

### `layoutOptions()`
Returns an array of all available layout options, merging both configuration-defined and runtime-registered options.

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.