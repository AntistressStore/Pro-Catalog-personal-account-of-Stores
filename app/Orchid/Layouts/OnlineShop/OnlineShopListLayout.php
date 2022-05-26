<?php

namespace App\Orchid\Layouts\OnlineShop;

use App\Models\OnlineShop;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class OnlineShopListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'onlineshops';

    protected function textNotFound(): string
    {
        return __('Магазины не добавлены. Вы можете их добавить нажав кнопку "Добавить магазин"');
    }

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('name', 'Название магазина')
                ->render(function (OnlineShop $onlineshop) {
                    return Link::make($onlineshop->name)
                        ->route('platform.onlineshop.edit', $onlineshop)
            ;
                }),
            TD::make('created_at', 'Создан')->render(function (OnlineShop $onlineshop) {
                return $onlineshop->created_at->format('d.m.Y');
            }),
            TD::make('updated_at', 'Обновлен')->render(function (OnlineShop $onlineshop) {
                return $onlineshop->created_at->format('d.m.Y');
            }),
            TD::make('', 'Действия')->render(function (OnlineShop $onlineshop) {
                return Link::make('Редактировать')
                    ->route('platform.onlineshop.edit', $onlineshop->id)
                ;
            }),
        ];
    }
}
