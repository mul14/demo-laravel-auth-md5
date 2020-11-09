<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return [
        'npp' => auth()->user()->npp,
        'name' => auth()->user()->name,
    ];
});

Route::post('/', function () {
    $npp = request()->npp;
    $password = request()->password;

    $user = App\Models\User::query()
        ->where('npp', $npp)
        ->where('password', md5($password))
        ->first();

    if ($user) {
        auth()->logout();

        auth()->login($user, true); // Bisa

        // auth()->loginUsingId($user->npp, true); // Bisa

        return redirect('/admin');
    }

    return back();
});
