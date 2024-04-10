<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::group(['prefix' => '{locale}', 'where' => ['locale' => '[a-zA-Z]{2}'], 'middleware' => 'locale'], function() {
    Route::get('/',[PageController::class, "index"])->name('home');
    Route::get('/about',[PageController::class, "about"])->name('about');
    Route::get('/career',[PageController::class, "carier"])->name('career');
    Route::get('/contact',[PageController::class, "contact"])->name('contact');
    Route::get('/prices',[PageController::class, "prices"])->name('prices');
    Route::get('/team',[PageController::class, "team"])->name('team');
    Route::get('/stocks',[PageController::class, "stocks"])->name('stocks');
    Route::get('/tasks',[PageController::class, "tasks"])->name('tasks');
    Route::get('/task-inner/{slug}',[PageController::class, "task_inner"])->name('task_inner')->where('locale', '[a-zA-Z]{2}');
    Route::get('/price-inner/{slug}',[PageController::class, "price_inner"])->name('price_inner')->where('locale', '[a-zA-Z]{2}');
    Route::get('/stock-inner/{slug}',[PageController::class, "stock_inner"])->name('stock_inner')->where('locale', '[a-zA-Z]{2}');
    
});

Route::group(['middleware' => 'web'], function () {
    Route::get('/', [PageController::class, 'index'])->name('home.without_locale');
    Route::get('/about', [PageController::class, 'about'])->name('about.without_locale');
    Route::get('/career', [PageController::class, 'carier'])->name('career.without_locale');
    Route::get('/contact', [PageController::class, 'contact'])->name('contact.without_locale');
    Route::get('/prices', [PageController::class, 'about'])->name('prices.without_locale');
    Route::get('/team', [PageController::class, 'about'])->name('team.without_locale');
    Route::get('/stocks', [PageController::class, 'about'])->name('stocks.without_locale');
    Route::get('/tasks', [PageController::class, 'tasks'])->name('tasks.without_locale');
    Route::get('/task-inner/{slug}', [PageController::class, 'task_inner'])->name('task_inner.without_locale');
    Route::get('/price-inner/{slug}', [PageController::class, 'price_inner'])->name('price_inner.without_locale');
    Route::get('/stock-inner/{slug}', [PageController::class, 'stock_inner'])->name('stock_inner.without_locale');
    
    // Другие роуты, которые должны работать без указания локали
});

Route::post('/sendOrder', [OrderController::class, 'send_order'])->name('sendOrder');
Route::post('/sendApplication', [OrderController::class, 'send_appl'])->name('sendApplication');



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
