<?php

namespace App\Orchid\Screens\PriceList;

use App\Models\PriceList;
use App\Orchid\Layouts\PriceList\PriceListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class PriceListScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return ['pricelists' => \auth()->user()->pricelists];
    }

    /**
     * Display header name.
     */
    public function name(): ?string
    {
        return 'Прайс лист магазина';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [Link::make('Добавить прайс лист')
            ->icon('plus')
            ->href(\route('platform.pricelist.create')), ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [PriceListLayout::class];
    }
}
