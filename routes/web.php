<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::controller(PageController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/services', 'services')->name('services');
    Route::get('/clients', 'clients')->name('clients');
    Route::get('/contact', 'contact')->name('contact');

    // Company Profile PDF (opens in the browser)
    Route::get('/company-profile', 'companyProfile')->name('company-profile');

    // SEO
    Route::get('/sitemap.xml', 'sitemap')->name('sitemap');
    Route::get('/robots.txt', 'robots')->name('robots');
});
