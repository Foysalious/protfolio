<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\messageController;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProtfolioController;

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

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();




Route::group(['prefix' => 'experience'], function () {
    Route::get('/', [ExperienceController::class, 'index'])->name('expericeShow');
    Route::post('/store', [ExperienceController::class, 'store'])->name('expericeStore');
    Route::post('/update/{experience:id}', [ExperienceController::class, 'update'])->name('expericeUpdate');
    Route::post('/delete/{experience:id}', [ExperienceController::class, 'destroy'])->name('expericeDelete');
});
Route::group(['prefix' => 'protfolio'], function () {
    Route::get('/', [ProtfolioController::class, 'index'])->name('protfolioShow');
    Route::post('/store', [ProtfolioController::class, 'store'])->name('protfolioStore');
    Route::post('/update/{protfolio:id}', [ProtfolioController::class, 'update'])->name('protfolioUpdate');
    Route::post('/delete/{protfolio:id}', [ProtfolioController::class, 'destroy'])->name('protfolioDelete');
});

Route::group(['prefix' => 'testimonial'], function () {
    Route::get('/', [TestimonialController::class, 'index'])->name('testimonialShow');
    Route::post('/store', [TestimonialController::class, 'store'])->name('testimonialStore');
    Route::post('/update/{testimonial:id}', [TestimonialController::class, 'update'])->name('testimonialUpdate');
    Route::post('/delete/{testimonial:id}', [TestimonialController::class, 'destroy'])->name('testimonialDelete');
});

Route::group(['prefix' => 'personal'], function () {
    Route::get('/', [PersonalController::class, 'index'])->name('personalShow');
    Route::post('/store', [PersonalController::class, 'store'])->name('personalStore');
    Route::post('/update/{personal:id}', [PersonalController::class, 'update'])->name('personalUpdate');
    Route::post('/delete/{personal:id}', [PersonalController::class, 'destroy'])->name('personalDelete');
});

Route::group(['prefix' => 'contact'], function () {
    Route::get('/', [ContactController::class, 'index'])->name('contactShow');
    Route::post('/store', [ContactController::class, 'store'])->name('contactStore');
    Route::post('/update/{contact:id}', [ContactController::class, 'update'])->name('contactUpdate');
    Route::post('/delete/{contact:id}', [ContactController::class, 'destroy'])->name('contactDelete');
});

Route::group(['prefix' => 'message'], function () {
    Route::get('/', [messageController::class, 'index'])->name('messageShow');
    Route::post('/store', [messageController::class, 'store'])->name('messageStore');
    Route::post('/update/{message:id}', [messageController::class, 'update'])->name('messageUpdate');
    Route::post('/delete/{message:id}', [messageController::class, 'destroy'])->name('messageDelete');
});
