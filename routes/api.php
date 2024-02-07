<?php

use App\Http\Controllers\Api\ApiController;
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
*/
Route::get("test",function(){
    return "test";
});

//Route::get("forfaits",[ApiController::class,'forfaits']);
Route::prefix("forfaits/")->name("forfaits.")->controller(ApiController::class)->group( function (){
    Route::get("/","forfaits");
    Route::get("/{option}-{value}","sortName")
    ->where("option","nom");
    Route::get("/{option}-{valueone}-{valuetwo}","sortGoPrix")
    ->whereIn("option",["nb_go","prix"]);
    
    //Route::get("/{option}-{valueone}-{valuetwo}","sortPrix")->where("option","prix");
});
Route::post("createcommande",[ApiController::class,"storeCommandeForfait"]);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
