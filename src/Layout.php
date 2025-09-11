<?php

namespace Inmanturbo\LayoutFeatures;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Inmanturbo\Features\FeatureRegistry;
use Laravel\Pennant\Feature;

class Layout
{
    static array $options = [];

    /**
    * Create a new class instance.
    */
    public function __construct(
        public readonly string $driver,
        public readonly string $name,
        public readonly string $component,
        public readonly ?string $description,
        public readonly ?string $icon = null,
    ) {}

    public static function updateCurrentLayout(string|Layout $layout)
    {
        $scope = Auth::user();

        if ($layout instanceof Layout) {
            $layout = $layout->name;
        }

        if ($layout === 'default') {
            FeatureRegistry::resetDefaults($scope, 'layout');
            return 'default';
        }

        Feature::activate('layout', $layout);
    }

    public static function currentLayout(): ?Layout
    {
        $component = Feature::value('layout');
        $layout = config("layout.options.{$component}");

        return match (true) {
            $layout instanceof Layout => $layout,
            is_null($layout) => config('layout.default'),
            default => null,
        };
    }

    public static function layoutComponent(): ?string
    {
        return static::currentLayout()?->component;
    }

    public static function LayoutOptions()
    {
        return array_merge(config('layout.options'), static::$options);
    }
}
