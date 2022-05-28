<?php

declare(strict_types=1);

namespace App\Orchid;

use Orchid\Platform\{Dashboard, ItemPermission, OrchidServiceProvider};
use Orchid\Screen\Actions\Menu;

class PlatformProvider extends OrchidServiceProvider
{
    public function boot(Dashboard $dashboard): void
    {
        parent::boot($dashboard);

        // ...
    }

    /**
     * @return Menu[]
     */
    public function registerMainMenu(): array
    {
        return [
            Menu::make('Настройки магазинов')
                ->icon('briefcase')
                ->route('platform.onlineshop.index')
                ->title('Меню'),

            Menu::make('Прайс лист магазина')
                ->icon('briefcase')
                ->route('platform.pricelist.index'),
        ];
    }

    /**
     * @return Menu[]
     */
    public function registerProfileMenu(): array
    {
        return [
            Menu::make('Profile')
                //->route('platform.profile')
                ->icon('user'),
        ];
    }

    /**
     * @return ItemPermission[]
     */
    public function registerPermissions(): array
    {
        return [
            ItemPermission::group(__('System'))
                ->addPermission('platform.systems.roles', __('Roles'))
                ->addPermission('platform.systems.users', __('Users')),
        ];
    }
}
