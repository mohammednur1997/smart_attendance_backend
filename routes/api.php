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
Route::post("/attendance/checkIn", "Api\AttendanceController@checkIn");
Route::post("/attendance/checkOut", "Api\AttendanceController@checkOut");

Route::post("/login", "Api\AttendanceController@CheckLogin");
Route::get("/employee/{id}", "Api\AttendanceController@getById");
Route::get("/GetAttendanceById/{id}", "Api\AttendanceController@GetAttendanceById");

Route::get("/getDataByDate/{id}", "Api\AttendanceController@getDataByDate");

Route::get("/vacation/{id}", "Api\VacationController@vacation");
Route::get("/vacationByID/{id}", "Api\VacationController@vacationByID");
Route::post("/vacation/store", "Api\VacationController@store");
Route::get("/vacation/delete/{id}", "Api\VacationController@delete");

Route::post("/search/front", "Api\AttendanceController@frontSearch");

Route::post("/changePass", "Api\ResetPasswordController@ChangePass");

//Get All Message
Route::get("/AllMessage/{id}", "Api\VacationController@AllMessage");
Route::get("/AllMessageByID/{id}", "Api\VacationController@AllMessageByID");

//Get gross salary
Route::get("/grossSalary/{id}", "Api\AttendanceController@calculateSalary");
Route::post("/calculate", "Api\AttendanceController@monthlyCalculation");
Route::post("/calculatePerMonth", "Api\AttendanceController@monthlyCalculationFront");




/*Route::post("/attendance/search", "Api\AttendanceController@search")->name("search");*/




























