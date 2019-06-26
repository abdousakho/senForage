<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get(' /clients/selectVillage',function() {
      return view ("clients.selectVillage");
})->name('clients.village');
Route::get(' /compteurs/selectcompteurs',function() {
    return view ("compteurs.selectcompteurs");
})->name('compteurs.village');


Route::get('/', function () {
    return view('index');
});
Route::get('/test', function () {
    return view('layout.form');
});
Route::get('/test1', function () {
    return "HELLO";
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('villages', 'VillageController');
Route::get('/clients/list', 'ClientController@list')->name('clients.list');
Route::resource('villages', 'VillageController');
Route::resource('clients', 'ClientController');
Route::resource('compteurs', 'CompteurController');
Route::get('/agents/list', 'AgentController@list')->name('agents.list');
Route::resource('agents', 'AgentController');

Route::get('/comptables/list', 'ComptableController@list')->name('comptables.list');
Route::resource('comptables', 'ComptableController');
Route::get('/adminitrateurs/list', 'AdministrateurController@list')->name('administrateurs.list');
Route::resource('administrateurs', 'AdministrateurController');
Route::get('gestionnaires/list', 'GestionnaireController@list')->name('gestionnaires.list');
Route::resource('gestionnaires', 'GestionnaireController');


//route carbon

/* use Carbon\Carbon;

Route::get('carbon', function () {
   $date = Carbon::now();
   dump($date);
    $date->addDays(3);
   dump($date);
}); */

use Illuminate\Support\Facades\Date;

Route::get('carbon', function () {
   $date = Date::now();
   dump($date);
   $newDate = $date->copy()->addDays(7);
   dump($newDate);
});
Route::get('loginfor/{rolename?}',function($rolename=null){
    if(!isset($rolename)){
        return view('auth.loginfor');
    }else{
        $role=App\Role::where('name',$rolename)->first();
        if($role){
            $user=$role->users()->first();
            Auth::login($user,true);
            return redirect()->route('home');
        }
    }
 return redirect()->route('login');
 })->name('loginfor');
 
 


