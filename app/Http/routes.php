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


Route::get('/students/seed', function () {
    $faker = Faker\Factory::create();
    DB::table('students')->truncate();
    for($i=1;$i<25;$i++){
        $student = new \App\Student();
        $student->name  = $faker->name;
        $student->address  = $faker->address;
        $student->save();
    }
});

Route::get('/students', function () {
    return \App\Student::all();
});


Route::post('/device', function () {
    $all = Request::json()->all();
    var_dump($all);
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
