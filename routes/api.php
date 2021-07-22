<?php

use App\Http\Controllers\Api\Employee\EmployeeController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

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

Route::middleware('auth:api')->get(
    '/user',
    function (Request $request) {
        return $request->user();
    }
);
Route::get(
    'users',
    function () {
        return User::all();
    }
)->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get(
    'me',
    function (Request $request) {
        return $request->user();
    }
);

Route::post(
    'login',
    function (Request $request) {
        $request->validate(
            [
                'email'    => 'required|email',
                'password' => 'required',
            ]
        );

        $user = User::where('email', $request->email)->first();

        if ( !$user || !Hash::check($request->password, $user->password) ) {
            throw ValidationException::withMessages(
                [
                    'email' => ['The provided credentials are incorrect.'],
                ]
            );
        }

        return $user->createToken($request->email)->plainTextToken;
    }
);
Route::resource("employees", EmployeeController::class)->only(["store", "index", "show"]);
