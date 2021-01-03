<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

   
 
Route::group(['middleware'=>['web'],
    'prefix'=>'admin','namespace'=>'Admin'],function (){
    Route::any('login','LoginController@login');
    Route::get('code','LoginController@code');
    
    
    Route::get('excel','ExcelController@excel');
    Route::any('import','ExcelController@import');
    
    });
Route::group(['middleware'=>['web','admin.login'],
    'prefix'=>'admin','namespace'=>'Admin'],function (){ 
        
       //学生
    Route::any('sperson','StudentController@person');
    Route::get('logout','LoginController@logout');
    Route::resource('sevaluate','SEvaluateController');
    Route::any('sclass','StudentController@index');
    Route::resource('stable','StableController');
    Route::resource('sresult','SeresultController');
    Route::any('snews','StudentController@news');
    Route::resource('shistory','ShistoryController');
    Route::any('spass','StudentController@pass');
    Route::any('supImg','StudentController@upImg');
    Route::any('sinfo','StudentController@info');
    
    
    //教师
    Route::any('tperson','TeacherController@person');
    Route::any('tclass','TeacherController@index');
    Route::any('tlisten','TeacherController@listen'); 
    Route::resource('nplan','TaddokController');
    Route::resource('yplan','TlistenokController');
    Route::any('tsee','TseeController@index');
    Route::any('treport','TreportController@index');
    Route::any('tnews','TeacherController@news');
    Route::any('tselects','TselectsController@index');
    Route::any('delete/{id}','TselectsController@delete');
    Route::resource('teval','TnoevalController');
    Route::resource('tsign','TsignController');
    Route::resource('ttable','TtableController');
    Route::resource('tresult','TeresultController');
    Route::any('tpass','TeacherController@pass');
    Route::any('tinfo','TeacherController@info');
    Route::any('tdesc/{term}','TeacherController@desc');
    Route::any('tmdesc/{term}','TeacherController@majordesc');
    Route::any('tupImg','TeacherController@upImg');
    
    //督导
    Route::any('dindex','DsupervisorController@index');
    Route::any('dperson','DsupervisorController@person');
    Route::any('dnews','DsupervisorController@news');
    Route::any('dlisten','DsupervisorController@listen');
    Route::any('ddelete/{id}','DsupervisorController@delete');
    Route::any('dno','DsupervisorController@nocom');
    Route::resource('deval','DnoevalController');
    Route::resource('dyes','DlistenokController');
    Route::resource('dsign','DsignController');
    Route::resource('dtable','DtableController');
    Route::any('dpass','DsupervisorController@pass');
    Route::any('dupImg','DsupervisorController@upImg');
    Route::any('dinfo','DsupervisorController@info');
    
    
      
  });




/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
