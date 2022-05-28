<?php

namespace App\Orchid\Screens\PriceList;

use App\Models\PriceList;
use Illuminate\Http\{RedirectResponse, Request};
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\{Input, Password, Select};
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
    {
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
            Layout::columns([
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
                        ->required()
                    ,
                    Input::make('name')
                        ->title('Название')
                        ->placeholder('Ссылка')
                        ->help("Введите любое название в это поле, чтобы отличить один список от другого")
                    ,
                ])->title('Анкета магазина'),
                Layout::rows([
                    Input::make('login')
                        ->title('Логин')
                        ->placeholder('Логин')
                        ->help("Если для доступа нужен логин и пароль, введите Логин в это поле. В противном случае оставьте пустым"),

                        Password::make('password')
                        ->title('Пароль')
                        ->placeholder('Пароль')
                        ->help("Если для доступа нужен логин и пароль, введите Пароль в это поле. В противном случае оставьте пустым")
                    ,
                ])->title('Доступы (при необходимости)'),
            ]),
        ];
    }
}
