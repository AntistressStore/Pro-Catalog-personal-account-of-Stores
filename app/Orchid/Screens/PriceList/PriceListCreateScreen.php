<?php

namespace App\Orchid\Screens\PriceList;

use App\Models\PriceList;
use Illuminate\Http\{RedirectResponse, Request};
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\{Input, Select};
use Orchid\Screen\Screen;
use Orchid\Support\Facades\{Alert, Layout};

class PriceListCreateScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [];
    }

    /**
     * Display header name.
     */
    public function name(): ?string
    {
        return 'Добавить прайс лист';
    }

    public function store(Request $request): Redirector|RedirectResponse
    { //dd($request->all());
        PriceList::create($request->all());

        Alert::info('Новый прайс лист успешно добавлен\обновлен');

        return redirect()->route('platform.pricelist.index');
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Сохранить')
                ->class('btn btn-primary')
                ->method('store'),
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        $onlineshops = Auth::user()->onlineshops;

        return [
            Layout::rows([
                Select::make('online_shop_id')
                    ->title('Интернет магазин')
                    ->options(
                        array_combine(
                        $onlineshops->pluck('id')->toArray(),
                        $onlineshops->pluck('name')->toArray()
                        )
                    )
                    ->required(),

                Input::make('url')
                    ->title('Cсылка на файл')
                    ->placeholder('Ссылка')
                    //->help("Введите ОГРН организации")
                    ->required()
                // ->popover('Tooltip - hint that user opens himself.')
                ,
            ]),
        ];
    }
}
