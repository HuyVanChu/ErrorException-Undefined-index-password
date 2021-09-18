<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::get('login', function () {
    return view('login');
})->name('login');
Route::post('login', function (Request $request) {
    $email = $request->email;
    $password = $request->password;
    $remember = $request->has('remember') ? true : false;
    if (Auth::attempt(['user_email' => $email, 'password' => $password], $remember)) {
        return redirect()->route('admin.index');
    } else {
        return redirect()->back()->with('error', 'Tài khoản không tồn tại')->withInput();
    }
});
Route::get('admin', function () {
    return view('index');
})->name('admin.index');
