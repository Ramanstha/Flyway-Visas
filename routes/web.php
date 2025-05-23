<?php

use Illuminate\Support\Facades\Route;


Route::get('/flyway-admin-login',[App\Http\Controllers\Auth\LoginController::class,'showLoginForm'])->name('login');
Route::post('/flyway-admin-post-login',[App\Http\Controllers\Auth\LoginController::class,'login'])->name('login.perform');

Route::group(['middleware' => ['auth']],function () {
    
Route::get('/admin',[App\Http\Controllers\Backend\DashboardController::class,'index'])->name('dashboard');
Route::get('/logout',[App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');

//////////Site Setting//////////
Route::get('/sitesetting',[App\Http\Controllers\Backend\SitesettingController::class,'Sitesetting'])->name('create.sitesetting');
Route::post('/sitesetting-store',[App\Http\Controllers\Backend\SitesettingController::class,'Store'])->name('store.sitesetting');
Route::get('/sitesetting-view',[App\Http\Controllers\Backend\SitesettingController::class,'View'])->name('view.sitesetting');
Route::get('/sitesetting-edit/{id}',[App\Http\Controllers\Backend\SitesettingController::class,'Edit'])->name('edit.sitesetting');
Route::post('/sitesetting-update/{id}',[App\Http\Controllers\Backend\SitesettingController::class,'Update'])->name('update.sitesetting');
Route::get('/sitesetting-delete/{id}',[App\Http\Controllers\Backend\SitesettingController::class,'Delete'])->name('delete.sitesetting');
Route::get('/sitesetting-status',[App\Http\Controllers\backend\SitesettingController::class,'Status'])->name('status.sitesetting');

//////////Banner//////////
Route::get('/banner',[App\Http\Controllers\Backend\BannerController::class,'banner'])->name('create.banner');
Route::post('/banner-store',[App\Http\Controllers\Backend\BannerController::class,'Store'])->name('store.banner');
Route::get('/banner-view',[App\Http\Controllers\Backend\BannerController::class,'View'])->name('view.banner');
Route::get('/banner-edit/{id}',[App\Http\Controllers\Backend\BannerController::class,'Edit'])->name('edit.banner');
Route::post('/banner-update/{id}',[App\Http\Controllers\Backend\BannerController::class,'Update'])->name('update.banner');
Route::get('/banner-delete/{id}',[App\Http\Controllers\Backend\BannerController::class,'Delete'])->name('delete.banner');
Route::get('/banner-status',[App\Http\Controllers\backend\BannerController::class,'Status'])->name('status.banner');

//////////Contact//////////
Route::get('/contact',[App\Http\Controllers\Backend\ContactusController::class,'contact'])->name('create.contact');
Route::post('/contact-store',[App\Http\Controllers\Backend\ContactusController::class,'Store'])->name('store.contact');
Route::get('/contact-view',[App\Http\Controllers\Backend\ContactusController::class,'View'])->name('view.contact');
Route::get('/contact-edit/{id}',[App\Http\Controllers\Backend\ContactusController::class,'Edit'])->name('edit.contact');
Route::post('/contact-update/{id}',[App\Http\Controllers\Backend\ContactusController::class,'Update'])->name('update.contact');
Route::get('/contact-delete/{id}',[App\Http\Controllers\Backend\ContactusController::class,'Delete'])->name('delete.contact');

//////////Medialink//////////
Route::get('/medialink',[App\Http\Controllers\Backend\MedialinksController::class,'medialink'])->name('create.medialink');
Route::post('/medialink-store',[App\Http\Controllers\Backend\MedialinksController::class,'Store'])->name('store.medialink');
Route::get('/medialink-view',[App\Http\Controllers\Backend\MedialinksController::class,'View'])->name('view.medialink');
Route::get('/medialink-edit/{id}',[App\Http\Controllers\Backend\MedialinksController::class,'Edit'])->name('edit.medialink');
Route::post('/medialink-update/{id}',[App\Http\Controllers\Backend\MedialinksController::class,'Update'])->name('update.medialink');
Route::get('/medialink-delete/{id}',[App\Http\Controllers\Backend\MedialinksController::class,'Delete'])->name('delete.medialink');

//////////Service//////////
Route::get('/service',[App\Http\Controllers\Backend\ServiceController::class,'service'])->name('create.service');
Route::post('/service-store',[App\Http\Controllers\Backend\ServiceController::class,'Store'])->name('store.service');
Route::get('/service-view',[App\Http\Controllers\Backend\ServiceController::class,'View'])->name('view.service');
Route::get('/service-edit/{id}',[App\Http\Controllers\Backend\ServiceController::class,'Edit'])->name('edit.service');
Route::post('/service-update/{id}',[App\Http\Controllers\Backend\ServiceController::class,'Update'])->name('update.service');
Route::get('/service-delete/{id}',[App\Http\Controllers\Backend\ServiceController::class,'Delete'])->name('delete.service');
Route::get('/service-status',[App\Http\Controllers\Backend\ServiceController::class,'Status'])->name('status.service');

//////////Gallery//////////
Route::get('/gallery',[App\Http\Controllers\Backend\GalleryController::class,'gallery'])->name('create.gallery');
Route::post('/gallery-store',[App\Http\Controllers\Backend\GalleryController::class,'Store'])->name('store.gallery');
Route::get('/gallery-view',[App\Http\Controllers\Backend\GalleryController::class,'View'])->name('view.gallery');
Route::get('/gallery-edit/{id}',[App\Http\Controllers\Backend\GalleryController::class,'Edit'])->name('edit.gallery');
Route::post('/gallery-update/{id}',[App\Http\Controllers\Backend\GalleryController::class,'Update'])->name('update.gallery');
Route::get('/gallery-delete/{id}',[App\Http\Controllers\Backend\GalleryController::class,'Delete'])->name('delete.gallery');

//////////Testimonial//////////
Route::get('/testimonial',[App\Http\Controllers\Backend\TestimonialController::class,'testimonial'])->name('create.testimonial');
Route::post('/testimonial-store',[App\Http\Controllers\Backend\TestimonialController::class,'Store'])->name('store.testimonial');
Route::get('/testimonial-view',[App\Http\Controllers\Backend\TestimonialController::class,'View'])->name('view.testimonial');
Route::get('/testimonial-edit/{id}',[App\Http\Controllers\Backend\TestimonialController::class,'Edit'])->name('edit.testimonial');
Route::post('/testimonial-update/{id}',[App\Http\Controllers\Backend\TestimonialController::class,'Update'])->name('update.testimonial');
Route::get('/testimonial-delete/{id}',[App\Http\Controllers\Backend\TestimonialController::class,'Delete'])->name('delete.testimonial');
Route::get('/testimonial-status',[App\Http\Controllers\Backend\TestimonialController::class,'Status'])->name('status.testimonial');
});  


// Frontend Routes

Route::get('/',[App\Http\Controllers\Frontend\HomepageController::class,'Home'])->name('Home');