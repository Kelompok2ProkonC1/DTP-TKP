<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Auth\ForgotPassword;
use App\Http\Livewire\Auth\ResetPassword;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Billing;
use App\Http\Livewire\Profile;
use App\Http\Livewire\Tables;
use App\Http\Livewire\StaticSignIn;
use App\Http\Livewire\StaticSignUp;
use App\Http\Livewire\Rtl;

use App\Http\Livewire\LaravelExamples\UserProfile;
use App\Http\Livewire\User\UserManagement;
use App\Http\Livewire\User\AddUser;
use App\Http\Livewire\User\UpdateUser;
use App\Http\Livewire\Category\CategoryManagement;
use App\Http\Livewire\Category\AddCategory;
use App\Http\Livewire\Category\UpdateCategory;
use App\Http\Livewire\Division\DivisionManagement;
use App\Http\Livewire\Division\AddDivision;
use App\Http\Livewire\Division\UpdateDivision;
use App\Http\Livewire\PengajuanPelatihan\Verifikasi;
use App\Http\Livewire\PengajuanPelatihan\InfoPengajuan;
use App\Http\Livewire\PengajuanPelatihan\History;
use App\Http\Livewire\VirtualReality;
use Illuminate\Http\Request;

use App\Http\Controllers\UserController;

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
    return redirect('/login');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', Register::class)->name('register');
    Route::get('/login', Login::class)->name('login');

    Route::get('/login/forgot-password', ForgotPassword::class)->name('forgot-password');
    Route::get('/reset-password/{id}', ResetPassword::class)->name('reset-password')->middleware('signed');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/billing', Billing::class)->name('billing');
    Route::get('/profile', Profile::class)->name('profile');
    Route::get('/tables', Tables::class)->name('tables');
    Route::get('/static-sign-in', StaticSignIn::class)->name('sign-in');
    Route::get('/static-sign-up', StaticSignUp::class)->name('static-sign-up');
    Route::get('/rtl', Rtl::class)->name('rtl');
    Route::get('/virtual-reality', VirtualReality::class)->name('virtual-reality');
    Route::get('/user-profile', UserProfile::class)->name('user-profile');

    // Manage user
    Route::get('/user-management', UserManagement::class)->name('user-management');
    Route::get('/add-user', AddUser::class)->name('add-user');
    // Route::get('/user-management/delete-user/{id}', [UserController::class, 'deleteUser'])->name('delete-user');
    Route::post('/user-management/delete-user', [UserManagement::class, 'delete_user'])->name('delete-user');
    Route::post('/update-user', UpdateUser::class)->name('update-user');
    Route::post('/updating-user', [UpdateUser::class, 'update_user'])->name('updating-user');
    // Route::get('/user-management/update-user/{id}', [UserController::class, 'showUpdateUser'])->name('show-update-user');
    // Route::post('/user-management/updating-user', [UserController::class, 'updateUser'])->name('update-user');

    // Manage category
    Route::get('/category-management', CategoryManagement::class)->name('category-management');
    Route::get('/add-category', AddCategory::class)->name('add-category');
    Route::post('/category-management/delete-category', [CategoryManagement::class, 'delete_category'])->name('delete-category');
    Route::post('/update-category', UpdateCategory::class)->name('update-category');
    Route::post('/updating-category', [UpdateCategory::class, 'update_category'])->name('updating-category');

    // Manage division
    Route::get('/division-management', DivisionManagement::class)->name('division-management');
    Route::get('/add-division', AddDivision::class)->name('add-division');
    Route::post('/category-management/delete-division', [DivisionManagement::class, 'delete_division'])->name('delete-division');
    Route::post('/update-division', UpdateDivision::class)->name('update-division');
    Route::post('/updating-division', [UpdateDivision::class, 'update_division'])->name('updating-division');

    // Submission
    Route::get('/verifikasi', Verifikasi::class)->name('verifikasi');
    Route::post('/info-pengajuan', InfoPengajuan::class)->name('info-pengajuan');
    Route::post('/approve-pengajuan', [Verifikasi::class, 'aprrove_pengajuan'])->name('approve-pengajuan');
    Route::post('/disapprove-pengajuan', [Verifikasi::class, 'disaprrove_pengajuan'])->name('disapprove-pengajuan');

    // History
    Route::get('/history', History::class)->name('history');
});
