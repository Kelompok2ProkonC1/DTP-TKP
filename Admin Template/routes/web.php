<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Auth\ForgotPassword;
use App\Http\Livewire\Auth\ResetPassword;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\QRInfo;
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
use App\Http\Livewire\PengajuanPelatihan\PengajuanPelatihan;
use App\Http\Livewire\PengajuanPelatihan\SuratPelatihan;
use App\Http\Livewire\PengajuanPelatihan\EditPengajuan;
use App\Http\Livewire\PengajuanPelatihan\TolakPengajuan;
use App\Http\Livewire\VirtualReality;
use Illuminate\Http\Request;

use App\Http\Controllers\UserController;
use App\Http\Controllers\QRCodeController;

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

// Page untuk user karyawan, admin, dan super admin
Route::middleware(['auth'])->group(function () {
    // Route::get('/qr-info-r', QRInfo::class)->name('qr-info-r');
    // Route::get('/qr-info/{id}', [QRInfo::class, 'render'])->name('qr-info');
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/user-profile', UserProfile::class)->name('user-profile');
    Route::post('/updating-profile', [UserProfile::class, 'update_profile'])->name('updating-profile');

    // Log Pengajuan Pelatihan
    Route::get('/history', History::class)->name('history');
    Route::post('/info-pengajuan', InfoPengajuan::class)->name('info-pengajuan');
    // Surat
    Route::post('/surat', SuratPelatihan::class)->name('surat');
    Route::post('/download-surat', [SuratPelatihan::class, 'downloadPDF'])->name('download-pdf');
});

// Page untuk user karyawan dan super admin
Route::middleware(['auth', 'karyawan'])->group(function () {
    // Pengajuan pelatihan
    Route::get('/pengajuan-pelatihan', PengajuanPelatihan::class)->name('pengajuan-pelatihan');
    Route::post('/add-pengajuan', [PengajuanPelatihan::class, 'add_pengajuan_pelatihan'])->name('add-pengajuan');
    Route::post('/edit-pengajuan', EditPengajuan::class)->name('edit-pengajuan');
    Route::post('/edit-pengajuan-save', [EditPelatihan::class, 'edit_pengajuan_pelatihan'])->name('edit-pengajuan-save');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/profile', Profile::class)->name('profile');
    Route::get('/billing', Billing::class)->name('billing');
    Route::get('/tables', Tables::class)->name('tables');
    Route::get('/static-sign-in', StaticSignIn::class)->name('sign-in');
    Route::get('/static-sign-up', StaticSignUp::class)->name('static-sign-up');
    Route::get('/rtl', Rtl::class)->name('rtl');
    Route::get('/virtual-reality', VirtualReality::class)->name('virtual-reality');

    // Manage user
    Route::get('/user-management', UserManagement::class)->name('user-management');
    Route::get('/add-user', AddUser::class)->name('add-user');
    Route::post('/user-management/delete-user', [UserManagement::class, 'delete_user'])->name('delete-user');
    Route::post('/update-user', UpdateUser::class)->name('update-user');
    Route::post('/updating-user', [UpdateUser::class, 'update_user'])->name('updating-user');

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
    Route::post('/approve-pengajuan', [Verifikasi::class, 'aprrove_pengajuan'])->name('approve-pengajuan');
    Route::post('/tolak-pengajuan', TolakPengajuan::class)->name('tolak-pengajuan');
});
Route::controller(QRCodeController::class)->group(function () {
    Route::get('qrcode', 'index');
    Route::get('qrcode/download', 'download')->name('qrcode.download');
});

Route::get('/qr-info/{id}', [QRInfo::class, 'render'])->name('qr-info');
