<?php

declare(strict_types=1);

namespace App\MoonShine\Layouts;

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
use Sweet1s\MoonshineRBAC\Resource\RoleResource;
use Sweet1s\MoonshineRBAC\Resource\UserResource;

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
                    ->translatable('moonshine::ui.resource')
                    ->icon('s.user-group'),

                MenuItem::make('role',  RoleResource::class)
                    ->translatable('moonshine::ui.resource')
                    ->icon('s.rectangle-group'),

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
        $this->theme1($colorManager);
        // $this->theme2($colorManager);
        // $this->theme3($colorManager);
    }

    protected function theme1(ColorManagerContract $colorManager): void
    {
        $colorManager->background('#17202a')
                        ->content('#1c2833')
                        ->tableRow('#212f3c')
                        ->borders('#34495e')
                        ->buttons('#34495e')
                        ->dividers('#5d6d7e')
                        ->primary('#ca6f1e')
                        ->secondary('#f5b041')
                        ->successBg('#117a65') 
                        ->successText('#82e0aa') 
                        ->warningBg('#b7950b')
                        ->warningText('#f7dc6f')
                        ->errorBg('#7b241c')
                        ->errorText('#f5b7b1')
                        ->infoBg('#21618c')
                        ->infoText('#85c1e9');

        $colorManager->successBg('#1e8449') 
                        ->successBg('#117a65', dark: true) 
                        ->successText('#82e0aa', dark: true) 
                        ->warningBg('#b7950b', dark: true)
                        ->warningText('#f7dc6f', dark: true)
                        ->errorBg('#a93226', dark: true)
                        ->errorText('#f5b7b1',  dark: true)
                        ->infoBg('#21618c', dark: true)
                        ->infoText('#85c1e9', dark: true);
    }

    protected function theme2(ColorManagerContract $colorManager): void
    {
        $colorManager->background('#121212')
                        ->content('#1a1a1a')
                        ->tableRow('#333333')
                        ->borders('#4f4f4f')
                        ->buttons('#5d6d7e')
                        ->dividers('#7f8c8d')
                        ->primary('#2980b9') 
                        ->secondary('#16a085') 
                        ->successBg('#1abc9c') 
                        ->successText('#a3e4d7') 
                        ->warningBg('#f39c12')
                        ->warningText('#fad7a0')
                        ->errorBg('#c0392b')
                        ->errorText('#f1948a')
                        ->infoBg('#34495e')
                        ->infoText('#d6eaf8');

        $colorManager->successBg('#239b56', dark: true) 
                        ->successText('#7dcea0', dark: true)
                        ->warningBg('#d68910', dark: true)
                        ->warningText('#f9e79f', dark: true)
                        ->errorBg('#a93226', dark: true)
                        ->errorText('#f5b7b1', dark: true)
                        ->infoBg('#1c2833', dark: true)
                        ->infoText('#85c1e9', dark: true);
    }

    protected function theme3(ColorManagerContract $colorManager): void 
    {
        $colorManager->background('#2c3e50') 
                        ->content('#34495e') 
                        ->tableRow('#3e5066') 
                        ->borders('#5d6d7e') 
                        ->buttons('#2e86c1') 
                        ->dividers('#85929e') 
                        ->primary('#1abc9c') 
                        ->secondary('#2980b9') 
                        ->successBg('#28b463') 
                        ->successText('#d4efdf') 
                        ->warningBg('#d68910') 
                        ->warningText('#f9e79f') 
                        ->errorBg('#943126') 
                        ->errorText('#f5b7b1') 
                        ->infoBg('#5dade2') 
                        ->infoText('#d6eaf8');

        $colorManager->successBg('#239b56', dark: true) 
                        ->successText('#82e0aa', dark: true)
                        ->warningBg('#d68910', dark: true)
                        ->warningText('#f9e79f', dark: true)
                        ->errorBg('#a93226', dark: true)
                        ->errorText('#f5b7b1', dark: true)
                        ->infoBg('#1f618d', dark: true)
                        ->infoText('#aed6f1', dark: true);
    }


    public function build(): Layout
    {
        return parent::build();
    }
}
