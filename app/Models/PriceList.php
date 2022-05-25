<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class PriceList extends Model
{
    use HasFactory; use AsSource;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'online_shop_id',
        'name',
        'description',
        'url',
        'img',
        'classservice',
        'active',
    ];
}
