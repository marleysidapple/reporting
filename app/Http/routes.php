<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
 */

/*
 * render login form
 * GET route
 */
Route::get('/', 'AuthController@login');


Route::get('login', 'AuthController@login');

/*
 * validate login
 * post route
 */
Route::post('login', 'AuthController@validateLogin');

Route::group(['middleware' => 'auth'], function () {

	/*
	* protected home page
	* get route
	*/
    Route::get('home', 'OperatorController@home');

    /*
    * logging out user
    * get route
    */
    Route::get('logout', 'OperatorController@logout');


    /*
    *------------------------------------------------------------------------------------------------
    * PATIENT ROUTES
    *------------------------------------------------------------------------------------------------
    */

    /*
    * list of patient
    * get route
    */
    Route::get('patient/list', 'OperatorController@listPatient');

    /*
    * adding new patient
    * get route
    */
    Route::get('patient/add', 'OperatorController@addPatient');


    /*
    * saving new patient
    * post route
    */
    Route::post('patient/add', 'OperatorController@savePatient');


    /* 
    * editing patient
    * get route
    */
    Route::get('patient/{id}/edit', 'OperatorController@editPatient');


    /*
    * editing patient
    * post route
    */
    Route::post('patient/edit/{id}', 'OperatorController@updatePatient');


    /*
    *-------------------------------------------------------------------------------------------------------
    * report routes
    *-------------------------------------------------------------------------------------------------------
    */

    /*
    * list of all reports
    * get route
    */
    Route::get('report/list', 'ReportController@listAll');


    /*
    * adding report
    * get route
    */
    Route::get('report/add', 'ReportController@addReport');


    /*
    * adding report
    * post route
    */
    Route::post('report/add', 'ReportController@saveReport');


    /*
    * display report detail
    * get route
    */
    Route::get('report/{id}/detail', 'ReportController@viewReport');


    /*
    * editing report
    * get route
    */
    Route::get('report/{id}/edit', 'ReportController@editReport');

    /*
    * updating report
    * post route
    */
    Route::post('report/edit/{id}', 'ReportController@updateReport');

    /*
    * download pdf
    * get route
    */
    Route::get('report/download/{id}', 'ReportController@downloadPdf');



    /*
    *------------------------------------------------------------------------------------------------
    * operator routes
    *------------------------------------------------------------------------------------------------
    */

    /*
    * list of operator
    * get route
    */
    Route::get('operator/list', 'OperatorController@listOperator');


    /*
    * adding operator
    * get route
    */
    Route::get('operator/add', 'OperatorController@addOperator');


    /*
    * save operator
    * post route
    */
    Route::post('operator/add', 'OperatorController@saveOperator');


    /*
    * editing operator
    * get route
    */
    Route::get('operator/{id}/edit', 'OperatorController@editOperator');


    /*
    * updating operator
    * post route
    */
    Route::post('operator/edit/{id}', 'OperatorController@updateOperator');


});
