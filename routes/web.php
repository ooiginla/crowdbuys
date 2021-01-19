<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\HomeController@homepage')->name('homepage');
Route::get('/campaigns', 'App\Http\Controllers\CampaignController@listings')->name('campaigns');
Route::get('/campaigns/view/{slug}', 'App\Http\Controllers\CampaignController@view')->name('campaign.view');
Route::get('/campaigns/new', 'App\Http\Controllers\CampaignController@create')->middleware(['auth'])->name('campaign.new');
Route::post('/campaigns/new', 'App\Http\Controllers\CampaignController@store')->middleware(['auth'])->name('campaign.store');
Route::get('/my/campaigns', 'App\Http\Controllers\CampaignController@mycampaigns')->middleware(['auth'])->name('my.campaigns');
Route::get('/getposts', 'App\Http\Controllers\CampaignController@getposts')->name('getposts');
Route::post('/post/comments', 'App\Http\Controllers\CampaignController@postcomments')->name('post.comments');
Route::post('/post/resources', 'App\Http\Controllers\CampaignController@postresources')->name('post.resources');
Route::post('/post/announcement', 'App\Http\Controllers\CampaignController@postannouncement')->name('post.announcement');
Route::get('/download/resource/{id}', 'App\Http\Controllers\CampaignController@download')->middleware(['auth'])->name('download.resource');
Route::get('/delete/resource/{id}', 'App\Http\Controllers\CampaignController@deleteResource')->middleware(['auth'])->name('delete.resource');
Route::get('/generate/ref/{campaign}', 'App\Http\Controllers\CampaignController@generateRef')->middleware(['auth'])->name('generate.ref');
Route::get('/verify/ref/{reference}', 'App\Http\Controllers\CampaignController@verifyRef')->middleware(['auth'])->name('verify.ref');
Route::get('/dashboard', 'App\Http\Controllers\CampaignController@dashboard')->middleware(['auth'])->name('dashboard');

Route::get('/about-us','App\Http\Controllers\ContentController@aboutus')->name('aboutus');
Route::get('/contact-us','App\Http\Controllers\ContentController@contactus')->name('contactus');
Route::get('/how-it-works','App\Http\Controllers\ContentController@howitworks')->name('howitworks');
Route::get('/pricing','App\Http\Controllers\ContentController@pricing')->name('pricing');
Route::get('/privacy-policy','App\Http\Controllers\ContentController@privacypolicy')->name('privacypolicy');
Route::get('/support','App\Http\Controllers\ContentController@support')->name('support');
Route::get('/terms-of-use','App\Http\Controllers\ContentController@support')->name('termsofuse');
Route::get('/trust-and-safety','App\Http\Controllers\ContentController@trustsafety')->name('trustsafety');
Route::get('/what-is-a-campaign','App\Http\Controllers\ContentController@whatiscampaign')->name('whatiscampaign');


Route::get('/tayo', function () {
    return view('camp');
});






require __DIR__.'/auth.php';
