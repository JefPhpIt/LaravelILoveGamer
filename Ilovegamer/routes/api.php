<?php

use App\Controller\RawgController;
use App\Models\VideoGame;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|

    rawg_api_url: 'https://api.rawg.io/api/games'
    rawg_api_key: '605c25dce78c4f15bd61aaa71b769cca'

*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
