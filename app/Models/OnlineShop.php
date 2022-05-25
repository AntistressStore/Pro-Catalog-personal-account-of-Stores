<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class OnlineShop extends Model
{
    use HasFactory;
    use AsSource;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'phone',
        'address',
        'city',
        'im_url',
        'is_courier_delivery',
        'is_pickup',
        'plastic_cards',
        'is_cash',
        'is_cashless',
        'is_individuals',
        'is_legal_entities',
        'is_trading_floor',
        'is_credit',
        'weekdays_worktime',
        'weekends_worktime',

        'legal_name',
        'legal_address',
        'postal_address',
        'legal_type',
        'ogrn',
        'legal_name_indoc',
        'user_id',
        'price_list_id',
        'url',
    ];
}
