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
Route::post('/stats', function () {
    $request = request()->post();
    if (array_key_exists('click_pointer', $request) && array_key_exists('realtime_created_at', $request) && $request['site_url']) {
        $site = \App\Models\Site::where('url', '=', $request['site_url'])->first();
        if ($site !== null) {
            $siteStat = new \App\Models\SiteStat();
            $siteStat->click_pointer = $request['click_pointer'];
            $date = new DateTime();
            $date->setTimestamp($request['realtime_created_at']);
            $siteStat->realtime_created_at = $date->format('Y-m-d H:i:s');
            $siteStat->site_id = $site->id;
            return $siteStat->save();
        } else {
            return 'error';
        }
    }
    return 'No info';
})->name('/');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
