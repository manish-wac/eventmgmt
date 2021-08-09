<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Admin\Auth\IndexController;
use App\Http\Controllers\Admin\Location\CountryController;
use App\Http\Controllers\Admin\Location\StateController;
use App\Http\Controllers\Admin\Location\DistrictController;
use App\Http\Controllers\Admin\Location\TalukController;
use App\Http\Controllers\Admin\Location\CityController;
use App\Http\Controllers\Admin\Location\EventController;
use App\Http\Controllers\Admin\Location\LocalBodiesController;
use App\Http\Controllers\Admin\Location\MerchantUnitController;
use App\Http\Controllers\Admin\Promoter\PromoterLOneController;
use App\Http\Controllers\Admin\Games\GameController;
use App\Http\Controllers\Admin\Games\QuestionsController;
use App\Http\Controllers\User\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});




//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/events', [UserController::class, 'index'])->name('user.location.event');
Route::get('event-list', [UserController::class, 'dataTable'])->name('user.location.event.datatable');



Route::get('test/login', [TestController::class, 'authenticate']);

Route::get('login', [IndexController::class, 'loadLoginView'])->name('admin.auth.login');
Route::post('login', [IndexController::class, 'adminLogin'])->name('admin.auth.admin-login');


Route::post('forgot-password', [IndexController::class, 'adminForgotPassword'])->name('admin.auth.forgot-password');
Route::get('reset-password/{token}/{email}', [IndexController::class, 'adminResetPassword'])->name('admin.auth.reset-password')->middleware('signed');

Route::post('update-password', [IndexController::class, 'adminUpdatePassword'])->name('admin.auth.update-password');

Route::group(["middleware" => "admin"], function () {

    Route::get('admin-dashboard', [IndexController::class, 'loadAdminDashboard'])->name('admin.auth.dashboard');

    Route::group(["prefix" => "admin"], function () {

        /* routes for location submenus - start*/
        Route::group(["prefix" => "location"], function () {
            /* Submenu - Country  - start*/
                Route::get('country', [CountryController::class, 'index'])->name('admin.auth.country');
                Route::get('country-list', [CountryController::class, 'dataTable'])->name('admin.auth.country-list');
                Route::post('add-country', [CountryController::class, 'createCountry'])->name('admin.location.add-new-country');
                Route::post('update-country', [CountryController::class, 'updateCountryDetails'])->name('admin.location.update-country-details');
                Route::delete('delete-country', [CountryController::class, 'deleteCountry'])->name('admin.location.delete-country');

                Route::get('get-country-details', [CountryController::class, 'getCountryDetails'])->name('admin.location.get-details-country'); // not using
            /* Submenu - Country  - end*/

            /* Submenu - State  - start*/
                Route::get('state', [StateController::class, 'index'])->name('admin.auth.state');
                Route::get('state-list', [StateController::class, 'dataTable'])->name('admin.auth.state-list');
                Route::post('add-state', [StateController::class, 'addSubmit'])->name('admin.location.add-new-state');
                Route::get('get-state-details', [StateController::class, 'getStateDetails'])->name('admin.location.get-details-state');

                Route::post('update-state', [StateController::class, 'update'])->name('admin.location.update-state-details');
                Route::delete('delete-state', [StateController::class, 'delete'])->name('admin.location.delete-state');

                Route::get('state/get-all/{country_id}', [StateController::class, 'fetchAllStates'])->name('admin.location.state-fetch-all');
            /* Submenu - State  - end*/

            /* Submenu - District  - start*/
                Route::get('district', [DistrictController::class, 'index'])->name('admin.auth.district');
                Route::get('district-list', [DistrictController::class, 'dataTable'])->name('admin.auth.district-list');
                Route::post('add-district', [DistrictController::class, 'addSubmit'])->name('admin.location.add-new-district');
                Route::get('district/get-all/{state_id}', [DistrictController::class, 'fetchAllDistricts'])->name('admin.location.district-fetch-all');

                Route::post('update-district', [DistrictController::class, 'update'])->name('admin.location.update-district-details');
                Route::delete('delete-district', [DistrictController::class, 'delete'])->name('admin.location.delete-district');

                Route::get('get-district-details', [DistrictController::class, 'getDistrictDetails'])->name('admin.location.get-details-district');
            /* Submenu - District  - end*/

            /* Submenu - Taluk  - start*/
                Route::get('taluk', [TalukController::class, 'index'])->name('admin.location.taluk');
                Route::get('taluk-list', [TalukController::class, 'dataTable'])->name('admin.location.taluk.datatable');
                Route::get('taluk/add', [TalukController::class, 'add'])->name('admin.location.taluk.add');
                Route::post('taluk/add', [TalukController::class, 'addSubmit'])->name('admin.location.taluk.addsubmit');
                Route::get('taluk/check-unique', [TalukController::class, 'checkUniqueName'])->name('admin.location.taluk.check-unique');
                Route::get('taluk/edit/{id}', [TalukController::class, 'edit'])->name('admin.location.taluk.edit');
                Route::post('taluk/edit/{id}', [TalukController::class, 'update'])->name('admin.location.taluk.update');
                Route::get('taluk/get-all/{district_id}', [TalukController::class, 'fetchAllTaluk'])->name('admin.location.taluk-fetch-all');

                Route::delete('taluk/delete/{id}', [TalukController::class, 'delete'])->name('admin.location.taluk.delete');



            /* Submenu - Taluk  - end*/

            /* Submenu - City  - start*/
            Route::get('city', [CityController::class, 'index'])->name('admin.location.city');
            Route::get('city-list', [CityController::class, 'dataTable'])->name('admin.location.city.datatable');
            Route::get('city/add', [CityController::class, 'add'])->name('admin.location.city.add');
            Route::post('city/add', [CityController::class, 'addSubmit'])->name('admin.location.city.addsubmit');
            Route::get('city/check-unique', [CityController::class, 'checkUniqueName'])->name('admin.location.city.check-unique');
            Route::get('city/edit/{id}', [CityController::class, 'edit'])->name('admin.location.city.edit');
            Route::post('city/edit/{id}', [CityController::class, 'update'])->name('admin.location.city.update');
            Route::get('city/get-all/{taluk_id}', [CityController::class, 'fetchAllCity'])->name('admin.location.city-fetch-all');

            Route::delete('city/delete/{id}', [CityController::class, 'delete'])->name('admin.location.city.delete');
            /* Submenu - City  - end*/

            /* Submenu - Event  - start*/
            Route::get('event', [EventController::class, 'index'])->name('admin.location.event');
            Route::get('event-list', [EventController::class, 'dataTable'])->name('admin.location.event.datatable');
            Route::get('event/add', [EventController::class, 'add'])->name('admin.location.event.add');
            Route::post('event/add', [EventController::class, 'addSubmit'])->name('admin.location.event.addsubmit');
            Route::get('event/check-unique', [EventController::class, 'checkUniqueName'])->name('admin.location.event.check-unique');
            Route::get('event/edit/{id}', [EventController::class, 'edit'])->name('admin.location.event.edit');
            Route::post('event/edit/{id}', [EventController::class, 'update'])->name('admin.location.event.update');
            Route::get('event/get-all/{district_id}', [EventController::class, 'fetchAllEvent'])->name('admin.location.event-fetch-all');

            Route::delete('event/delete/{id}', [EventController::class, 'delete'])->name('admin.location.event.delete');
            /* Submenu - City  - end*/


            /* Submenu - Merchant-unit  - start*/

                Route::get('merchant-unit', [MerchantUnitController::class, 'index'])->name('admin.location.merchant-unit');
                Route::get('merchant-unit/datatable', [MerchantUnitController::class, 'dataTable'])->name('admin.location.merchant-unit.datatable');
                Route::get('merchant-unit/add', [MerchantUnitController::class, 'add'])->name('admin.location.merchant-unit.add');
                Route::post('merchant-unit/add', [MerchantUnitController::class, 'addSubmit'])->name('admin.location.merchant-unit.addsubmit');
                Route::get('merchant-unit/edit/{id}', [MerchantUnitController::class, 'edit'])->name('admin.location.merchant-unit.edit');
                Route::post('merchant-unit/edit/{id}', [MerchantUnitController::class, 'update'])->name('admin.location.merchant-unit.edit');
                Route::delete('delete-merchant-unit', [MerchantUnitController::class, 'delete'])->name('admin.location.delete-merchant-unit');
                Route::post('merchant-unit/check-unique', [MerchantUnitController::class, 'checkUniqueName'])->name('admin.location.merchant-unit.check-unique');
            /* Submenu - Merchant-unit  - end*/

            /* Submenu - local-bodies  - start*/

                Route::get('local-bodies', [LocalBodiesController::class, 'index'])->name('admin.location.local-bodies');
                Route::get('local-bodies/add', [LocalBodiesController::class, 'add'])->name('admin.location.local-bodies.add');
                Route::post('local-bodies/add', [LocalBodiesController::class, 'addSubmit'])->name('admin.location.local-bodies.addsubmit');
                Route::get('local-bodies/datatable', [LocalBodiesController::class, 'dataTable'])->name('admin.location.local-bodies.datatable');
                Route::get('local-bodies/edit/{id}', [LocalBodiesController::class, 'edit'])->name('admin.location.local-bodies.edit');
                Route::post('local-bodies/edit/{id}', [LocalBodiesController::class, 'update'])->name('admin.location.local-bodies.edit');
                Route::delete('delete-local-bodies', [LocalBodiesController::class, 'delete'])->name('admin.location.delete-state');
            /* Submenu - local-bodies  - end*/


    });
    /* routes for location submenus - end*/


    /* routes for promoter submenus - start*/

    Route::group(["prefix" => "admin/promoter"], function () {

        /* Submenu - Promoter L1  - start*/

        Route::get('l1-promoter', [PromoterLOneController::class, 'index'])->name('admin.promoter.l1-promoter');
        Route::get('l1-promoter/add', [PromoterLOneController::class, 'add'])->name('admin.promoter.l1-promoter.add');
        Route::post('l1-promoter/add', [PromoterLOneController::class, 'addSubmit'])->name('admin.promoter.l1-promoter.add');

        /* Submenu - Promoter L1  - end*/

    });

        /* route for game submenus - start */
        Route::group(["prefix" => "games"], function () {
            /* Submenu - Game  - start*/
            Route::get('game', [GameController::class, 'index'])->name('admin.games.game');
            Route::get('game-list', [GameController::class, 'dataTable'])->name('admin.games.games-list');


            Route::get('questions', [QuestionsController::class, 'index'])->name('admin.games.questions');
            Route::get('questions/add', [QuestionsController::class, 'add'])->name('admin.games.questions.add');
            Route::post('questions/add-submit', [QuestionsController::class, 'addSubmit'])->name('admin.games.questions.add');

            Route::get('results', [GameController::class, 'index'])->name('admin.games.results');

        });
        /* route for game submenus - end */

        Route::get('logout', [IndexController::class, 'adminLogout'])->name('admin.auth.admin-logout');

    });

});
