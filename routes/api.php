<?php

use Illuminate\Http\Request;


/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/


/*// Login route is here....
Route::post('/login', "AuthController@login");
//Register route is here....
Route::post('/register', "AuthController@register");
//ForGot Password is here..
Route::post('/forgot', 'ForgotController@forgot');
//Reset Password Route is here......
Route::post("/reset", "ResetController@resetPassword");
// User information Route is here....
Route::get("/users", "AuthController@users")->middleware("auth:api");*/


//order Route..
/*Route::get("/myCart", "Api\OrderController@myCart")->middleware("auth:api");*/
Route::post("/attendance", "Api\AttendanceController@attendance");




























