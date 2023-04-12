<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\MailController;
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

$controller_path = 'App\Http\Controllers';

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// gforce
// my routes
Route::post('/submitBranch', $controller_path . '\gforce\BranchCon@submitBranch')->name('submitBranch');
Route::post('/deletePackage', $controller_path . '\gforce\PackageCon@deletePackage')->name('deletePackage');
Route::post('/signup', $controller_path . '\gforce\UserCon@signup')->name('signup');

//Jitendra Routes
Route::post('/changeProjectClassStatus', $controller_path . '\Api\ProjectClass@changeProjectClassStatus')->name('changeProjectClassStatus');
Route::post('/changeOpenClassStatus', $controller_path . '\Api\ProjectClass@changeOpenClassStatus')->name('changeOpenClassStatus');
Route::post('/changeWorkshopStatus', $controller_path . '\Api\ProjectClass@changeWorkshopStatus')->name('changeWorkshopStatus');
Route::post('/changeWorkshopStatus', $controller_path . '\Api\ProjectClass@changeWorkshopStatus')->name('changeWorkshopStatus');
Route::post('/changeblogstatus', $controller_path . '\Api\User@changeblogstatus')->name('changeblogstatus');
Route::post('/sendcontactmail', $controller_path . '\Api\User@sendcontactmail')->name('sendcontactmail');
Route::post('/sendcareermail', $controller_path . '\Api\User@sendcareermail')->name('sendcareermail');
Route::post('/changeuserstatus', $controller_path . '\Api\User@Index')->name('changeuserstatus');
Route::post('/changeTrainerStatus', $controller_path . '\Api\ProjectClass@changeTrainerStatus')->name('changeTrainerStatus');

