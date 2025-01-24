<?php

declare(strict_types=1);

namespace App\Providers;

use App\Services\ThemeApplier;
use Illuminate\Support\ServiceProvider;
use MoonShine\Contracts\ColorManager\ColorManagerContract;
use MoonShine\Contracts\Core\DependencyInjection\ConfiguratorContract;
use MoonShine\Contracts\Core\DependencyInjection\CoreContract;
use MoonShine\Laravel\DependencyInjection\MoonShine;
use MoonShine\Laravel\DependencyInjection\MoonShineConfigurator;
use Sweet1s\MoonshineRBAC\Resource\PermissionResource;
use Sweet1s\MoonshineRBAC\Resource\RoleResource;
use Sweet1s\MoonshineRBAC\Resource\UserResource;

class MoonShineServiceProvider extends ServiceProvider
{
    /**
     * @param  MoonShine  $core
     * @param  MoonShineConfigurator  $config
     *
     */
    public function boot(
        CoreContract $core,
        ConfiguratorContract $config,
        ColorManagerContract $colorManager
    ): void {
        // $config->authEnable();

        (new ThemeApplier($colorManager))->theme1();
        // (new ThemeApplier($colorManager))->theme2();
        // (new ThemeApplier($colorManager))->theme3();


        $core
            ->resources([
                UserResource::class,
                RoleResource::class,
                PermissionResource::class,

            ])
            ->pages([
                ...$config->getPages(),
            ])
        ;
    }
}
