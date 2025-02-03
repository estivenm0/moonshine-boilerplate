<?php

declare(strict_types=1);

namespace App\MoonShine\Layouts;

use App\MoonShine\Resources\RoleResource;
use App\MoonShine\Resources\UserResource;
use App\Services\ThemeApplier;
use MoonShine\Laravel\Layouts\AppLayout;
use MoonShine\ColorManager\ColorManager;
use MoonShine\Contracts\ColorManager\ColorManagerContract;
use MoonShine\Laravel\Components\Layout\{Locales, Notifications, Profile, Search};
use MoonShine\MenuManager\MenuGroup;
use MoonShine\MenuManager\MenuItem;
use MoonShine\UI\Components\{
    Breadcrumbs,
    Components,
    Layout\Flash,
    Layout\Div,
    Layout\Body,
    Layout\Burger,
    Layout\Content,
    Layout\Footer,
    Layout\Head,
    Layout\Favicon,
    Layout\Assets,
    Layout\Meta,
    Layout\Header,
    Layout\Html,
    Layout\Layout,
    Layout\Logo,
    Layout\Menu,
    Layout\Sidebar,
    Layout\ThemeSwitcher,
    Layout\TopBar,
    Layout\Wrapper,
    When
};
use Sweet1s\MoonshineRBAC\Resource\PermissionResource;
use App\MoonShine\Resources\PostResource;


final class MoonShineLayout extends AppLayout
{

    protected function assets(): array
    {
        return [
            ...parent::assets(),
        ];
    }

    // protected function getFaviconComponent(): Favicon
    // {
    //     return parent::getFaviconComponent()->customAssets([
    //         'apple-touch' => 'favicon_path',
    //         '32' => 'favicon_path',
    //         '16' => 'favicon_path',
    //         'safari-pinned-tab' => 'favicon_path',
    //         'web-manifest' => 'favicon_path',
    //     ]);
    // }


    protected function getFooterComponent(): Footer
    {
        return Footer::make()
            ->copyright(fn(): string => 'Credits To <a href="https://moonshine-laravel.com/" target="_blank">MoonShine</a>'
            )
            ->menu($this->getFooterMenu());
    }

    protected function menu(): array
    {
        return [
            MenuGroup::make('system', [
                MenuItem::make('admins_title',  UserResource::class)
                    ->translatable('moonshine::ui.resource'),

                MenuItem::make('role',  RoleResource::class)
                    ->translatable('moonshine::ui.resource'),

                MenuItem::make('permissions',  PermissionResource::class)
                    ->translatable('moonshine-rbac::ui')
                    ->icon('s.shield-check'),
            ])
                ->translatable('moonshine::ui.resource')
                ->icon('m.cube'),
        ];
    }

    /**
     * @param ColorManager $colorManager
     */
    protected function colors(ColorManagerContract $colorManager): void
    {
        // parent::colors($colorManager);
    }



    public function build(): Layout
    {
        return parent::build();
    }
}
