<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::get('/',[CustomAuthController::class,'index']);
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

Route::get('404',[CustomAuthController::class,'error'])->name('error');
// Applying middleware
Route::group(['middleware'=>['checkAge']],function(){
    Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');
    
});