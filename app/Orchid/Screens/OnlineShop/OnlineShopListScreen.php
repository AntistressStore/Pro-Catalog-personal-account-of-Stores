<?php

namespace App\Orchid\Screens\OnlineShop;

use App\Models\OnlineShop;
use App\Orchid\Layouts\OnlineShop\OnlineShopListLayout;
use Orchid\Screen\Actions\{Link};
use Orchid\Screen\Screen;

class OnlineShopListScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'onlineshops' => OnlineShop::where('user_id',\auth()->user()->id)->paginate(),
        ];
    }

    /**
     * Display header name.
     */
    public function name(): ?string
    {
        return 'Настройки магазинов';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Добавить магазин')
                ->icon('plus')
                ->href(\route('platform.onlineshop.create')),
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [OnlineShopListLayout::class];
    }
}
