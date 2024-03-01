<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CreateEventController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TicketsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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



Route::get('/', [HomeController::class, 'index'])->name('index');
Route::post('/tickets', [TicketsController::class, 'tickets'])->name('tickets');
Route::get('addevent', [CreateEventController::class, 'addevent'])->name('addevent');
Route::post('/postevent', [HomeController::class, 'postevent'])->name('postevent');
Route::get('mpesatransaction', [AdminController::class, 'mpesatransaction'])->name('mpesatransaction');
Route::get('/checkout', [PaymentController::class, 'checkout'])->name('checkout');
Route::get('/initiatepush',[PaymentController::class,'initiateStkPush'])->name('initiatepush');
Route::post('/stkcallback',[PaymentController::class,'stkCallback'])->name('stkcallback');
Route::get('/stkquery',[PaymentController::class, 'stkQuery'])->name('stkquery');
Route::get('/b2c',[PaymentController::class, 'b2c'])->name('b2c');
Route::post('/b2cresult',[PaymentController::class, 'b2cResult'])->name('b2cresult');
Route::post('/b2ctimeout',[PaymentController::class, 'b2cTimeout'])->name('b2ctimeout');


Route::controller(PaymentController::class)
    ->prefix('payments')
    ->as('payments')
    ->group(function(){
        Route::get('token', 'token') ->name('token');
        Route::get('/initiatepush','initiateStkPush')->name('initiatepush');
        Route::post('/stkcallback','stkCallback')->name('stkcallback');
        Route::get('/stkquery','stkQuery')->name('stkquery');
        Route::get('/registerurl','registerUrl')->name('registerurl');
        Route::post('/validation','Validation')->name('validation');
        Route::post('/confirmation','Confirmation')->name('confirmation');
        Route::get('/simulate','Simulate')->name('simulate');
        Route::get('/qrcode','qrcode')->name('qrcode');
        Route::get('/b2c','b2c')->name('b2c');
        Route::post('/b2cresult','b2cResult')->name('b2cresult');
        Route::post('/b2ctimeout','b2cTimeout')->name('b2ctimeout');
        Route::get('/reversal','Reversal')->name('reversal');
        Route::post('/reversalresult','reversalResult')->name('reversalresult');
        Route::post('/reversaltimeout','reversalTimeout')->name('reversaltimeout');
    });
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
