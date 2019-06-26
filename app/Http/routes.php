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

Route::get('/', function () {
    return view('welcome');
});

//Basic Route Test
Route::get('foo', function () {
    return 'Hello World';
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/plans', 'PlanController@index')->name('plans.index');
    Route::get('/plan/{plan}', 'PlanController@show')->name('plans.show');
    Route::post('/subscription', 'SubscriptionController@create')->name('subscription.create');
    //Route::get('/plans', 'PlanController@index')->name('plans.index');
});


Route::get('user-subscription-test1', function () {
    $plan = \App\Plan::where("stripe_plan","PlanA")->first();
    $user = \App\User::find(1);
    $user->newSubscription('main', $plan->stripe_plan)->trialDays(10)->create();
});