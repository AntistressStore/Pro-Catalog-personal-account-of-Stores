<?php

namespace App\Orchid\Layouts\PriceList;

use App\Models\PriceList;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class PriceListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'pricelists';

    protected function textNotFound(): string
    {
        return __('Прайс листы не добавлены. Вы можете их добавить нажав кнопку "Добавить прайс лист"');
    }

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('name', 'Название прайс листа')
                ->render(function (PriceList $priceList) {
                    return Link::make($priceList->name)
                        ->route('platform.pricelist.create', $priceList)
            ;
                }),
            TD::make('created_at', 'Создан')->render(function (PriceList $priceList) {
                return $priceList->created_at->format('d.m.Y');
            }),
            TD::make('updated_at', 'Обновлен')->render(function (PriceList $priceList) {
                return $priceList->created_at->format('d.m.Y');
            }),
            TD::make('', 'Действия')->render(function (PriceList $priceList) {
                return Link::make('Редактировать')
                    ->route('platform.pricelist.create', $priceList->id)
                ;
            }),
        ];
    }
}
