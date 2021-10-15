<?php


// Social Media login route is here
/*Route::get('/', "BackEnd\BackEndSystem\SocialLoginController@loginPage");
Route::get('/callBack', "BackEnd\BackEndSystem\SocialLoginController@getData");
Route::get('/loginSocial', "BackEnd\BackEndSystem\SocialLoginController@loginSocial")->name("loginSocial");*/

// Passport Login System Route is here....
/*Route::get('/loginPage', "BackEnd\PassportAuth\AuthController@loginPage");
Route::post('/login', "BackEnd\PassportAuth\AuthController@login");
Route::get('/registerPage', "BackEnd\PassportAuth\AuthController@registerPage");
Route::post('/register', "BackEnd\PassportAuth\AuthController@register");
Route::get('/forgotPage', 'BackEnd\PassportAuth\ForgotController@forgotPage');
Route::post('/forgot', 'BackEnd\PassportAuth\ForgotController@forgot');
Route::post("/reset", "BackEnd\PassportAuth\ResetController@resetPassword");
Route::get("/users", "BackEnd\PassportAuth\AuthController@users")->middleware("auth:api");*/

// Admin Login System Route is here....
Route::get('/', "BackEnd\AdminAuth\LoginController@loginFormPage")->name("admin.login");
Route::post('/admin/login/store', "BackEnd\AdminAuth\LoginController@LoginCheck")->name("admin.login.check");

Route::get('/admin/register', "BackEnd\AdminAuth\RegisterController@adminRegisterForm")->name("admin.register");
Route::post('/admin/register/store', "BackEnd\AdminAuth\RegisterController@adminRegisterCheck")->name("admin.register.store");

Route::get('/admin/forget', 'BackEnd\AdminAuth\ForgotPasswordController@adminForgetForm')->name("admin.forget");
Route::post('/admin/forget/store', 'BackEnd\AdminAuth\ForgotPasswordController@adminForgetCheck')->name("admin.forget.check");

Route::get('/admin/confirm/{email}', 'BackEnd\AdminAuth\ConfirmPasswordController@adminConfirmForm')->name("admin.confirm");
Route::post('/admin/confirm/store', 'BackEnd\AdminAuth\ConfirmPasswordController@adminConfirmForgetCheck')->name("admin.confirm.check");

Route::get('/admin/logout', 'BackEnd\AdminAuth\LoginController@logout')->name("admin.logout");
Route::post("/admin/reset", "BackEnd\AdminAuth\ResetPasswordController@adminResetPassword")->name("admin.reset");

//Admin panel root route is here
Route::get('/deshboard', "BackEnd\BackEndSystem\HomeController@index")->name("deshboard");

//admin profile ar jonno route
Route::get('/profile', "BackEnd\BackEndSystem\ProfileController@profilePage")->name("profile");
Route::post('/profile/update/{id}', "BackEnd\BackEndSystem\ProfileController@update")->name("profile.update");

//all Role and permission route is here
Route::get('/role', "BackEnd\BackEndSystem\RolePermissionController@allRole")->name("role.all")->middleware("guest");
Route::get('/role/create', "BackEnd\BackEndSystem\RolePermissionController@create")->name("role.create");
Route::post('/role/store', "BackEnd\BackEndSystem\RolePermissionController@store")->name("role.store");
Route::get('/role/edit/{id}', "BackEnd\BackEndSystem\RolePermissionController@edit")->name("role.edit");
Route::post('/role/update/{id}', "BackEnd\BackEndSystem\RolePermissionController@update")->name("role.update");
Route::get('/role/delete/{id}', "BackEnd\BackEndSystem\RolePermissionController@delete")->name("role.delete");

//mail ar jonno route
Route::get('/mail', "BackEnd\BackEndSystem\MailController@inbox")->name("mail");
Route::get('/mail/compose', "BackEnd\BackEndSystem\MailController@compose")->name("mail.compose");
Route::post('/mail/compose/store', "BackEnd\BackEndSystem\MailController@send")->name("mail.compose.send");
Route::get('/mail/view', "BackEnd\BackEndSystem\MailController@viewMail")->name("mail.viewMail");

/*// Web guard User ar jonno route
Route::get('/user', "BackEnd\BackEndSystem\UserController@user")->name("user.all");
Route::get('/user/create', "BackEnd\BackEndSystem\UserController@create")->name("user.create");
Route::post('/user/store', "BackEnd\BackEndSystem\UserController@store")->name("user.store");
Route::get('/user/edit/{id}', "BackEnd\BackEndSystem\UserController@edit")->name("user.edit");
Route::post('/user/update/{id}', "BackEnd\BackEndSystem\UserController@update")->name("user.update");
Route::get('/user/delete/{id}', "BackEnd\BackEndSystem\UserController@destroy")->name("user.delete");*/

//Admin guard User ar jonno route
Route::get('/adminUser', "BackEnd\BackEndSystem\AdminController@index")->name("admin.all");
Route::get('/adminUser/create', "BackEnd\BackEndSystem\AdminController@create")->name("admin.create");
Route::post('/adminUser/store', "BackEnd\BackEndSystem\AdminController@store")->name("admin.store");
Route::get('/adminUser/edit/{id}', "BackEnd\BackEndSystem\AdminController@edit")->name("admin.edit");
Route::post('/adminUser/update/{id}', "BackEnd\BackEndSystem\AdminController@update")->name("admin.update");
Route::get('/adminUser/delete/{id}', "BackEnd\BackEndSystem\AdminController@destroy")->name("admin.delete");

//Setting ar jonno route
Route::get('/general', "BackEnd\BackEndSystem\AppconfigController@index")->name("general");
Route::post('/logo', "BackEnd\BackEndSystem\AppconfigController@postLogoSetting")->name("logo");
Route::post('/system', "BackEnd\BackEndSystem\AppconfigController@postGeneralSetting")->name("system");
Route::post('/localization', "BackEnd\BackEndSystem\AppconfigController@localizationPost")->name("localization");

//Language ar jonno route
Route::get('/language', "BackEnd\BackEndSystem\LanguageController@index")->name("language");
Route::get('/language/edit/{field}', "BackEnd\BackEndSystem\LanguageController@edit")->name("language.edit");
Route::get('/language/delete/{field}', "BackEnd\BackEndSystem\LanguageController@delete")->name("language.delete");
Route::post('/language/update/{field}', "BackEnd\BackEndSystem\LanguageController@update")->name("language.update");
Route::post('/add/phrase', "BackEnd\BackEndSystem\LanguageController@addPhrase")->name("add.phrase");

//employee ar jonno route
Route::get('/employee', "BackEnd\EmployeeController@all")->name("employees");
Route::get('/employee/add', "BackEnd\EmployeeController@create")->name("employee.create");
Route::post('/employee/store', "BackEnd\EmployeeController@store")->name("employee.store");
Route::get('/employee/edit/{id}', "BackEnd\EmployeeController@edit")->name("employee.edit");
Route::post('/employee/update/{id}', "BackEnd\EmployeeController@update")->name("employee.update");
Route::get('/employee/delete/{id}', "BackEnd\EmployeeController@delete")->name("employee.delete");

//employee ar jonno route
Route::get('/salary', "BackEnd\SalarisController@all")->name("salary");
Route::get('/salary/edit/{id}', "BackEnd\SalarisController@edit")->name("salary.edit");
Route::post('/salary/update/{id}', "BackEnd\SalarisController@update")->name("salary.update");
Route::get('/salary/delete/{id}', "BackEnd\SalarisController@delete")->name("salary.delete");

//Salary Deduction ar jonno route
Route::get('/salary/deduction/{id}', "BackEnd\DeductionController@index")->name("salary.deduction");
Route::post('/salary/deduction/store', "BackEnd\DeductionController@store")->name("salary.deduction.store");
Route::get('/salary/deduction/edit/{id}', "BackEnd\DeductionController@edit")->name("salary.deduction.edit");
Route::post('/salary/deduction/update/{id}', "BackEnd\DeductionController@update")->name("salary.deduction.update");
Route::get('/salary/deduction/delete/{id}', "BackEnd\DeductionController@delete")->name("salary.deduction.delete");

//Salary Reward ar jonno route
Route::get('/salary/reward/{id}', "BackEnd\RewardController@index")->name("salary.reward");
Route::post('/salary/reward/store', "BackEnd\RewardController@store")->name("salary.reward.store");
Route::get('/salary/reward/edit/{id}', "BackEnd\RewardController@edit")->name("salary.reward.edit");
Route::post('/salary/reward/update/{id}', "BackEnd\RewardController@update")->name("salary.reward.update");
Route::get('/salary/reward/delete/{id}', "BackEnd\RewardController@delete")->name("salary.reward.delete");

//Vacation Request ar jonno route
Route::get('/vacation', "BackEnd\VacationController@index")->name("vacation");
Route::get('/vacation/confirm/{id}', "BackEnd\VacationController@confirm")->name("vacation.confirm");
Route::get('/vacation/reject/{id}', "BackEnd\VacationController@reject")->name("vacation.reject");

//Vacation Request ar jonno route
Route::get('/notification', "BackEnd\NotificationController@index")->name("notification");
Route::post('/notification/store', "BackEnd\NotificationController@store")->name("notification.store");
Route::get('/notification/edit/{id}', "BackEnd\NotificationController@edit")->name("notification.edit");
Route::post('/notification/update/{id}', "BackEnd\NotificationController@update")->name("notification.update");
Route::get('/notification/delete/{id}', "BackEnd\NotificationController@delete")->name("notification.delete");

//Employee Record ar jonno route
Route::get('/employee/record', "BackEnd\RecordController@index")->name("employee.record");

//Employee Reports ar jonno route
Route::get('/employee/report', "BackEnd\ReportController@index")->name("employee.report");
Route::post("/attendance/search", "BackEnd\ReportController@search")->name("search");



//FontSite Setting ar jonno route
Route::get('/slider', "FontEnd\FontSiteController@slider")->name("slider");
Route::post('/slider/add', "FontEnd\FontSiteController@storeSlider")->name("add.slider");
Route::post('/slider/update/{id}', "FontEnd\FontSiteController@updateSlider")->name("update.slider");
Route::get('/slider/delete/{id}', "FontEnd\FontSiteController@deleteSlider")->name("delete.slider");

Route::get('/allUseFullPage', "FontEnd\FontSiteController@allUseFullPage")->name("allUseFullPage");
Route::post('/useFullPage/update', "FontEnd\FontSiteController@useFullPage")->name("update.useFullPage");

Route::get('/social', "FontEnd\FontSiteController@socialPage")->name("social");
Route::post('/social/add', "FontEnd\FontSiteController@storeSocialIcon")->name("add.social");
Route::get('/social/delete/{id}', "FontEnd\FontSiteController@deleteSocial")->name("delete.social");

// All Footer route write here
Route::get("/footer", "BackEnd\FooterController@index")->name("footer.all");
Route::get("/footer/edit/{id}", "BackEnd\FooterController@edit")->name("footer.edit");
Route::post("/footer/update/{id}", "BackEnd\FooterController@update")->name("footer.update");

// All Contact Route Is here ...
Route::get("/contact", "BackEnd\ContactController@index")->name("contact.all");
Route::post("send", "BackEnd\ContactController@sendMsg")->name("contact.send");
Route::post("/contact/edit/{id}", "BackEnd\ContactController@edit")->name("contact.edit");
Route::post("/contact/update/{id}", "BackEnd\ContactController@update")->name("contact.update");
Route::post("/contact/reply/{id}", "BackEnd\ContactController@ReplyMsg")->name("contact.reply");

// single page ar jonno route
Route::get("/servicePage/{id}", "FontEnd\HomeController@singleService")->name("service.single");

// single portfolio page ar jonno route
Route::get("/portfolioPage/{id}/{title}", "FontEnd\HomeController@singlePortfolio")->name("portfolio.single");
Route::post("/comment", "FontEnd\HomeController@comment")->name("portfolio.comment");









