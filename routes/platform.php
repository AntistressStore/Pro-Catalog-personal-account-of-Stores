<?php

declare(strict_types=1);

use App\Orchid\Screens\Examples\{ExampleCardsScreen, ExampleChartsScreen, ExampleFieldsAdvancedScreen, ExampleFieldsScreen, ExampleLayoutsScreen, ExampleScreen, ExampleTextEditorsScreen};
use App\Orchid\Screens\OnlineShop\{OnlineShopCreateScreen, OnlineShopListScreen};
use App\Orchid\Screens\PriceList\{PriceListCreateScreen, PriceListScreen};
use App\Orchid\Screens\Role\{RoleEditScreen, RoleListScreen};
use App\Orchid\Screens\User\{UserEditScreen, UserListScreen, UserProfileScreen};
use App\Orchid\Screens\{PlatformScreen};
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the need "dashboard" middleware group. Now create something great!
|
*/

// Main
Route::screen('/main', PlatformScreen::class)
    ->name('platform.main')
;

// Platform > Profile
Route::screen('profile', UserProfileScreen::class)
    ->name('platform.profile')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Profile'), route('platform.profile'))
        ;
    })
;

// Platform > OnlineShop
Route::screen('/onlineshop', OnlineShopListScreen::class)->name('platform.onlineshop.index')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Настройки магазинов'), route('platform.onlineshop.index'))
        ;
    })
    ;

Route::screen('/onlineshop/create', OnlineShopCreateScreen::class)->name('platform.onlineshop.create')
    ->breadcrumbs(function (Trail $trail) {
        return $trail->parent('platform.index')->push(__('Настройки магазинов'), route('platform.onlineshop.index'))
            ->push(__('Добавить магазин'), route('platform.onlineshop.create'))
    ;
    })
;

Route::screen('/onlineshop/{onlineshop}/edit', OnlineShopCreateScreen::class)->name('platform.onlineshop.edit')
    ->breadcrumbs(function (Trail $trail) {
        return $trail->parent('platform.index')->push(__('Настройки магазинов'), route('platform.onlineshop.index'))
            ->push(__('Добавить магазин'), route('platform.onlineshop.create'))
    ;
    })
;

// Platform > PriceList

Route::screen('/pricelist', PriceListScreen::class)->name('platform.pricelist.index')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Прайс лист магазина'), route('platform.pricelist.index'))
        ;
    })
    ;

    Route::screen('/pricelist/create', PriceListCreateScreen::class)->name('platform.pricelist.create')
        ->breadcrumbs(function (Trail $trail) {
            return $trail->parent('platform.index')->push(__('Прайс лист магазина'), route('platform.pricelist.index'))
                ->push(__('Добавить прайс лист'), route('platform.pricelist.create'))
    ;
        })
;

// Platform > System > Users
Route::screen('users/{user}/edit', UserEditScreen::class)
    ->name('platform.systems.users.edit')
    ->breadcrumbs(function (Trail $trail, $user) {
        return $trail
            ->parent('platform.systems.users')
            ->push(__('User'), route('platform.systems.users.edit', $user))
        ;
    })
;

// Platform > System > Users > Create
Route::screen('users/create', UserEditScreen::class)
    ->name('platform.systems.users.create')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.systems.users')
            ->push(__('Create'), route('platform.systems.users.create'))
        ;
    })
;

// Platform > System > Users > User
Route::screen('users', UserListScreen::class)
    ->name('platform.systems.users')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Users'), route('platform.systems.users'))
        ;
    })
;

// Platform > System > Roles > Role
Route::screen('roles/{role}/edit', RoleEditScreen::class)
    ->name('platform.systems.roles.edit')
    ->breadcrumbs(function (Trail $trail, $role) {
        return $trail
            ->parent('platform.systems.roles')
            ->push(__('Role'), route('platform.systems.roles.edit', $role))
        ;
    })
;

// Platform > System > Roles > Create
Route::screen('roles/create', RoleEditScreen::class)
    ->name('platform.systems.roles.create')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.systems.roles')
            ->push(__('Create'), route('platform.systems.roles.create'))
        ;
    })
;

// Platform > System > Roles
Route::screen('roles', RoleListScreen::class)
    ->name('platform.systems.roles')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Roles'), route('platform.systems.roles'))
        ;
    })
;

// Example...
Route::screen('example', ExampleScreen::class)
    ->name('platform.example')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push('Example screen')
        ;
    })
;

Route::screen('example-fields', ExampleFieldsScreen::class)->name('platform.example.fields');
Route::screen('example-layouts', ExampleLayoutsScreen::class)->name('platform.example.layouts');
Route::screen('example-charts', ExampleChartsScreen::class)->name('platform.example.charts');
Route::screen('example-editors', ExampleTextEditorsScreen::class)->name('platform.example.editors');
Route::screen('example-cards', ExampleCardsScreen::class)->name('platform.example.cards');
Route::screen('example-advanced', ExampleFieldsAdvancedScreen::class)->name('platform.example.advanced');

//Route::screen('idea', Idea::class, 'platform.screens.idea');
