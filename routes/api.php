<?php

use App\Http\Controllers\api\ProjectController;
use App\Models\Project;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('projects', [ProjectController::class, 'index']);
//CONVERT my Table's Values ON JSON
//Using POSTMAN : you can call values from this URL : http://(URL SERVER)/api/projects

//REMEMBER TO USE A CONTROLLER

Route::get('projects/{project}', [ProjectController::class, 'show']);

Route::post('lead', [LeadController::class, 'latest']);
