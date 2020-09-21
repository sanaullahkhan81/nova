<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// GET List of channels
Route::get('channels', 'ChannelsController@index')->name('channels');;


//	GET Programme timetable for a selected channel, for a selected date and timezone.
Route::get('/channels/{channel}/{date}/timezone/{timezone}', 'ProgrammeTimetableController@index');


// GET Programme information for a selected programme.
Route::get('/channels/{channel}/programmes/{programme}', 'ProgrammeInforamtionController@show');


//TDD urls
Route::post('channel/store'."ChannelsController@store")->name('channel.store');


//Postman URLs

//List of Programm_timeTable
Route::get('programmeTimetable',"ProgrammeTimetableController@list")->name('programme.List');
Route::get('programmeInformation',"ProgrammeInforamtionController@index")->name('programme.index');

