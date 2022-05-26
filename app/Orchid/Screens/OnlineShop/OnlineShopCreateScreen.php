<?php

namespace App\Orchid\Screens\OnlineShop;

use App\Models\OnlineShop;
use Illuminate\Http\{RedirectResponse, Request};
use Illuminate\Routing\Redirector;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\{CheckBox, Input, Select};
use Orchid\Screen\Screen;
use Orchid\Support\Facades\{Alert, Layout};

class OnlineShopCreateScreen extends Screen
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
        return 'Добавить магазин';
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

    public function store(Request $request): Redirector|RedirectResponse
    {
        OnlineShop::create($request->all());

        Alert::info('Новый магазин успешно добавлен. Дождитесь звонка с подтверждением от нашего менеджера.
        Это может занять некоторое время, так как каждый магазин проверяется на соответствие нашим требованиям.');

        return redirect()->route('platform.onlineshop.index');
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::columns([
                Layout::rows([
                    Input::make('user_id')
                        ->value(\auth()->user()->id)
                        ->type('hidden'),
                    Input::make('legal_name')
                        ->title('Юридическое лицо:')
                        ->placeholder('Введите юридическое лицо')
                        //->help('Введите юридическое лицо')
                        ->required(),
                    Input::make('legal_name_indoc')
                        ->title('Название юридического лица,
                как в учредительных документах:')
                        ->placeholder('Введите юридическое лицо, как в учредительных документах')
                        // ->help('Название юридического лица,
                        // как в учредительных документах')
                        ->required(),

                    Select::make('legal_type')
                        ->title('Тип организации')
                        ->options(['IP' => 'ИП', 'OOO' => 'ООО', 'AO' => 'AO', 'PAO' => 'ПАО', 'ZAO' => 'ЗАО'])
                        ->required(),

                    Input::make('ogrn')
                        ->title('ОГРН')
                        ->placeholder('Введите ОГРН организации')
                        //->help("Введите ОГРН организации")
                        ->required()
                    // ->popover('Tooltip - hint that user opens himself.')
                    ,
                    Input::make('legal_address')
                        ->title('Адрес организации')
                        ->placeholder('Введите адрес организации')
                        //->help("Введите ОГРН организации")
                        ->required(),
                    Input::make('url')
                        ->title('Страница, где указаны юридические данные организации')
                        ->placeholder('Введите url адрес начиная с http://')->type('url')
                        //->help("Введите ОГРН организации")
                        ->required(),
                ])->title('Юридические данные'),
                Layout::rows([
                    Input::make('name')
                        ->title('Название:')
                        ->placeholder('Введите название магазина')
                        //->help('Введите юридическое лицо')
                        ->required(),
                    Input::make('phone')
                        ->title('Телефон:')->mask('(999) 999-9999')
                        ->placeholder('Введите телефон магазина')
                        //->help('Введите юридическое лицо')
                        ->required(),
                    Input::make('city')
                        ->title('Город:')
                        ->placeholder('Введите город магазина')
                        //->help('Введите юридическое лицо')
                        ->required(),
                    Input::make('address')
                        ->title('Адрес:')
                        ->placeholder('Введите адрес магазина')
                        //->help('Введите юридическое лицо')
                        ->required(),
                    Input::make('im_url')
                        ->title('Страница интернет магазина')
                        ->placeholder('Введите url адрес начиная с http://')->type('url')
                        //->help("Введите ОГРН организации")
                        ->required(),

                    CheckBox::make('is_courier_delivery')
                        ->title('Курьерская доставка')
                        ->placeholder('Есть ли у вас курьерская доставка')->sendTrueOrFalse(),

                    CheckBox::make('is_pickup')
                        ->title('Самовывоз')
                        ->placeholder('Есть ли у вас самовывоз')->sendTrueOrFalse(),

                    CheckBox::make('is_cashless')
                        ->title('Безналичный расчет')
                        ->placeholder('Есть ли у вас Безналичный расчет')->sendTrueOrFalse(),

                    CheckBox::make('is_cash')
                        ->title('Наличный расчет')
                        ->placeholder('Есть ли у вас оплата наличными')->sendTrueOrFalse(),

                    CheckBox::make('is_legal_entities')
                        ->title('Работаете с юридическими лицами')
                        ->placeholder('Вы работаете с юридическими лицами?')->sendTrueOrFalse(),

                    CheckBox::make('is_individuals')
                        ->title('Вы работаете с физическими лицами')
                        ->placeholder('Работаете с физическими лицами?')->sendTrueOrFalse(),

                    CheckBox::make('is_trading_floor')
                        ->title('Торговый зал')
                        ->placeholder('Есть ли торговый зал?')->sendTrueOrFalse(),

                    CheckBox::make('is_credit')
                        ->title('Кредит')
                        ->placeholder('Есть ли продажи в кредит?')->sendTrueOrFalse(),

                    Input::make('plastic_cards')
                        ->title('Какие пластиковые карты принимаете к оплате:')
                        ->placeholder('Введите название пластиковых карт'),

                    Input::make('weekdays_worktime')
                        ->title('Часы работы в рабочие дни:')
                        ->placeholder('Формат: 09:00-18:00')->mask('99:99-99:99')
                        ->help('Формат: 09:00-18:00'),
                    Input::make('weekends_worktime')
                        ->title('Часы работы в выходные:')
                        ->placeholder('Формат: 09:00-18:00')->mask('99:99-99:99')
                        ->help('Формат: 09:00-18:00'),

                    // DateTimer::make('weekdays_open')
                    //     ->title('Opening date')
                    //     ->noCalendar()
                    //     ->format('H:i'),
                    // DateTimer::make('weekdays_open')
                    //     ->title('Opening date')
                    //     ->noCalendar()
                    //     ->format('H:i'),

                    // TextArea::make('textarea')
                    //     ->title('Example textarea')
                    //     ->rows(6),
                ])->title('Анкета магазина'),
            ]),
        ];
    }
}
