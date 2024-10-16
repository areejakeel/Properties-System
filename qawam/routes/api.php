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

//register==login==logout
Route::post('register',[\App\Http\Controllers\RegisterController::class,'register']);
Route::post('login',[\App\Http\Controllers\RegisterController::class,'login']);
Route:: post('logout',[\App\Http\Controllers\RegisterController::class,'logout']);
//===========================================================================
// routes for admin to crud exercises
Route::prefix("exercises")->group(function(){
    Route::get('/',[\App\Http\Controllers\ExerciseAController::class,'indexall']);
    Route::get('/',[\App\Http\Controllers\ExerciseAController::class,'index']);
    Route::post('/',[\App\Http\Controllers\ExerciseAController::class,'store'])->middleware('CheckRole');
    Route::get('/{id}',[\App\Http\Controllers\ExerciseAController::class,'show']);
    Route::put('/{exercise}',[\App\Http\Controllers\ExerciseAController::class,'update'])->middleware('CheckRole');
    Route::delete('/{exercise}',[\App\Http\Controllers\ExerciseAController::class,'destroy'])->middleware('CheckRole');
});
//routes to create and show the goals
Route::prefix("goals")->group(function(){
    Route::get('/',[\App\Http\Controllers\GoalController::class,'index']);
    Route::post('/',[\App\Http\Controllers\GoalController::class,'store'])->middleware('CheckRole');
});
//routes to create and show the levels
Route::prefix("levels")->group(function (){
    Route::get('/',[\App\Http\Controllers\LevelAdController::class,'index']);
    Route::post('/',[\App\Http\Controllers\LevelAdController::class,'store'])->middleware('CheckRole');
});
//routes to CRUD sport programs
Route::prefix("sport_programs")->group(function (){
    Route::get('/',[\App\Http\Controllers\ProgramAController::class,'index']);
    Route::post('/',[\App\Http\Controllers\ProgramAController::class,'store'])->middleware('CheckRole');
    Route::get('/{id}',[\App\Http\Controllers\ProgramAController::class,'show']);
    Route::put('/{program}',[\App\Http\Controllers\ProgramAController::class,'update'])->middleware('CheckRole');
    Route::delete('/{program}',[\App\Http\Controllers\ProgramAController::class,'destroy'])->middleware('CheckRole');
});
//to show and create days
Route::prefix("days")->group(function (){
    Route::get('/index',[\App\Http\Controllers\DayAController::class,'index']);
    Route::post('/create',[\App\Http\Controllers\DayAController::class,'store'])->middleware('CheckRole');
});
//====================================================================================
//route to CRUD organic program
Route::prefix("organics")->group(function (){
    Route::get('/',[\App\Http\Controllers\OrganicAController::class,'index']);
    Route::post('/',[\App\Http\Controllers\OrganicAController::class,'store'])->middleware('CheckRole');
    Route::get('/{id}',[\App\Http\Controllers\OrganicAController::class,'show']);
    Route::put('/{program}',[\App\Http\Controllers\OrganicAController::class,'update'])->middleware('CheckRole');
    Route::delete('/{program}',[\App\Http\Controllers\OrganicAController::class,'destroy'])->middleware('CheckRole');
});
//==========================================================================
//Route to CRUD categories
Route::prefix("categories")->group(function(){
    Route::get('/',[\App\Http\Controllers\CategoryController::class,'index']);
    Route::post('/',[\App\Http\Controllers\CategoryController::class,'store'])->middleware('CheckRole');
    Route::get('/{id}',[\App\Http\Controllers\CategoryController::class,'show']);
    Route::put('/{category}',[\App\Http\Controllers\CategoryController::class,'update'])->middleware('CheckRole');
    Route::delete('/{category}',[\App\Http\Controllers\CategoryController::class,'destroy'])->middleware('CheckRole');
});
//=================================================================================
//parts routes
Route::prefix("parts")->group(function(){
    
    Route::get('/',[\App\Http\Controllers\PartAController::class,'index']);
    Route::post('/',[\App\Http\Controllers\PartAController::class,'store'])->middleware('CheckRole');
    Route::get('/{id}',[\App\Http\Controllers\PartAController::class,'show']);
    Route::put('/{part}',[\App\Http\Controllers\PartAController::class,'update'])->middleware('CheckRole');
    Route::delete('/{part}',[\App\Http\Controllers\PartAController::class,'destroy'])->middleware('CheckRole');
});
