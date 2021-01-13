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


Route::get('/tayo', function () {
    return view('camp');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



require __DIR__.'/auth.php';
