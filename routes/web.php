<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ADDController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KeamananController;
use App\Http\Controllers\LiterasiController;
use App\Http\Controllers\SecurityController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\EvaluasiController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\KeamananDashboardController;
use App\Http\Controllers\LiteracyController;
use App\Http\Controllers\LiterasiDashboardController;
use App\Http\Controllers\PermainanController;
use App\Http\Controllers\ProfileDashboardController;
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

Route::get('/', [LoginController::class, 'indexLogin'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/master', [LoginController::class, 'indexAdmin'])->name('login')->middleware('guest');
Route::post('/master', [LoginController::class, 'authenticateAdmin']);
Route::post('/logout-master', [LoginController::class, 'logoutAdmin']);

Route::get('/register', [RegistrationController::class, 'index'])->middleware('guest');
Route::post('/register', [RegistrationController::class, 'store']);

Route::get('/ganti-password', [ChangePasswordController::class, 'index'])->name('login')->middleware('guest');
Route::post('/ganti-password', [ChangePasswordController::class, 'update']);

// Route::get('/literasi', function () {
//     return view('menu utama.literasi', [
//         "title" => "Literasi",
//         "active" => "Literasi"
//     ]);
// })->middleware('auth');
// Route::get('/keamanan', function () {
//     return view('menu utama.keamanan', [
//         "title" => "Keamanan",
//         "active" => "Keamanan"
//     ]);
// })->middleware('auth');
// Route::get('/evaluasi', function () {
//     return view('menu utama.evaluasi', [
//         "title" => "Evaluasi",
//         "active" => "Evaluasi"
//     ]);
// })->middleware('auth');
// Route::get('/permainan', function () {
//     return view('menu utama.permainan', [
//         "title" => "Permainan",
//         "active" => "Permainan"
//     ]);
// })->middleware('auth');
Route::get('/info-pengguna', function () {
    return view('menu utama.info pengguna', [
        "title" => "Info Pengguna",
        "active" => "Info Pengguna"
    ]);
})->middleware('auth');

Route::get('/info-pengguna', [ProfileController::class, 'edit'])->name('profil')->middleware('auth');
Route::put('/info-pengguna/update', [ProfileController::class, 'update'])->name('profil.update')->middleware('auth');

// Route::get('/literasi-dashboard', function () {
//     return view('menu utama admin.literasi', [
//         "title" => "Literasi Dashboard",
//         "active" => "Literasi Dashboard"
//     ]);
// })->middleware('auth');
// Route::get('/keamanan-dashboard', function () {
//     return view('menu utama admin.keamanan', [
//         "title" => "Keamanan Dashboard",
//         "active" => "Keamanan Dashboard"
//     ]);
// })->middleware('auth');
// Route::get('/evaluasi-dashboard', function () {
//     return view('menu utama admin.evaluasi', [
//         "title" => "Evaluasi Dashboard",
//         "active" => "Evaluasi Dashboard"
//     ]);
// })->middleware('auth');
// Route::get('/permainan-dashboard', function () {
//     return view('menu utama admin.permainan', [
//         "title" => "Permainan Dashboard",
//         "active" => "Permainan Dashboard"
//     ]);
// })->middleware('auth');
// Route::get('/info-pengguna-dashboard', function () {
//     return view('menu utama admin.info pengguna', [
//         "title" => "Info Pengguna",
//         "active" => "Info Pengguna"
//     ]);
// })->middleware('auth');

// Route::get('/digital-mindset-dashboard', [LiterasiDashboardController::class, 'indexDM'])->name('DMAdmin')->middleware('auth');
// Route::get('/literasi-digital-dashboard', [LiterasiDashboardController::class, 'indexLD'])->name('LDAdmin')->middleware('auth');
// Route::get('/kecakapan-digital-dashboard', [LiterasiDashboardController::class, 'indexKD'])->name('KDAdmin')->middleware('auth');
// Route::get('/lanskap-digital-dashboard', [LiterasiDashboardController::class, 'indexLaD'])->name('LaDAdmin')->middleware('auth');
// Route::get('/mesin-pencari-informasi-dashboard', [LiterasiDashboardController::class, 'indexMPI'])->name('MPIAdmin')->middleware('auth');
// Route::get('/cakap-bermedia-digital-dashboard', [LiterasiDashboardController::class, 'indexCBD'])->name('CBDAdmin')->middleware('auth');

// Route::get('/amankan-diri-digital-dashboard', [KeamananDashboardController::class, 'indexADD'])->name('ADDAdmin')->middleware('auth');
// Route::get('/proteksi-perangkat-digital-dashboard', [KeamananDashboardController::class, 'indexPPD'])->name('PPDAdmin')->middleware('auth');
// Route::get('/identitas-digital-dashboard', [KeamananDashboardController::class, 'indexID'])->name('IDAdmin')->middleware('auth');
// Route::get('/data-digital-dashboard', [KeamananDashboardController::class, 'indexDD'])->name('DDAdmin')->middleware('auth');
// Route::get('/penipuan-digital-dashboard', [KeamananDashboardController::class, 'indexPD'])->name('PDAdmin')->middleware('auth');
// Route::get('/rekam-jejak-digital-dashboard', [KeamananDashboardController::class, 'indexRJD'])->name('RJDAdmin')->middleware('auth');

// Route::resource('/amankan-diri-digital-dashboard', ADDController::class)->middleware('auth');
// Route::get('/amankan-diri-digital-dashboard/create', [ADDController::class, 'create'])->name('ADDAdminCreate')->middleware('auth');
// Route::post('/amankan-diri-digital-dashboard', [ADDController::class, 'store'])->name('ADDAdminStore')->middleware('auth');

Route::get('/keamanan-dashboard', [SecurityController::class, 'index'])->name('indexSecurity')->middleware('auth');
Route::get('/keamanan-dashboard/create', [SecurityController::class, 'create'])->name('createSecurity')->middleware('auth');
Route::post('/keamanan-dashboard', [SecurityController::class, 'store'])->name('storeSecurity')->middleware('auth');
Route::delete('/keamanan-dashboard/{security}', [SecurityController::class, 'destroy'])->name('deleteSecurity')->middleware('auth');
Route::get('/keamanan-dashboard/{security}', [SecurityController::class, 'show'])->name('showSecurity')->middleware('auth');
Route::get('/keamanan-dashboard/{security}/edit', [SecurityController::class, 'edit'])->name('editSecurity')->middleware('auth');
Route::put('/keamanan-dashboard/{security}', [SecurityController::class, 'update'])->name('updateSecurity')->middleware('auth');

Route::get('/literasi-dashboard', [LiteracyController::class, 'index'])->name('indexLiteracy')->middleware('auth');
Route::get('/literasi-dashboard/create', [LiteracyController::class, 'create'])->name('createLiteracy')->middleware('auth');
Route::post('/literasi-dashboard', [LiteracyController::class, 'store'])->name('storeLiteracy')->middleware('auth');
Route::delete('/literasi-dashboard/{literacy}', [LiteracyController::class, 'destroy'])->name('deleteLiteracy')->middleware('auth');
Route::get('/literasi-dashboard/{literacy}', [LiteracyController::class, 'show'])->name('showLiteracy')->middleware('auth');
Route::get('/literasi-dashboard/{literacy}/edit', [LiteracyController::class, 'edit'])->name('editLiteracy')->middleware('auth');
Route::put('/literasi-dashboard/{literacy}', [LiteracyController::class, 'update'])->name('updateLiteracy')->middleware('auth');

Route::get('/evaluasi-dashboard', [EvaluationController::class, 'index'])->name('indexEvaluation')->middleware('auth');
Route::get('/evaluasi-dashboard/create', [EvaluationController::class, 'create'])->name('createEvaluation')->middleware('auth');
Route::post('/evaluasi-dashboard', [EvaluationController::class, 'store'])->name('storeEvaluation')->middleware('auth');
Route::delete('/evaluasi-dashboard/{evaluation}', [EvaluationController::class, 'destroy'])->name('deleteEvaluation')->middleware('auth');
Route::get('/evaluasi-dashboard/{evaluation}', [EvaluationController::class, 'show'])->name('showEvaluation')->middleware('auth');
Route::get('/evaluasi-dashboard/{evaluation}/edit', [EvaluationController::class, 'edit'])->name('editEvaluation')->middleware('auth');
Route::put('/evaluasi-dashboard/{evaluation}', [EvaluationController::class, 'update'])->name('updateEvaluation')->middleware('auth');

Route::get('/permainan-dashboard', [GameController::class, 'index'])->name('indexGame')->middleware('auth');
Route::get('/permainan-dashboard/create', [GameController::class, 'create'])->name('createGame')->middleware('auth');
Route::post('/permainan-dashboard', [GameController::class, 'store'])->name('storeGame')->middleware('auth');
Route::delete('/permainan-dashboard/{game}', [GameController::class, 'destroy'])->name('deleteGame')->middleware('auth');
Route::get('/permainan-dashboard/{game}', [GameController::class, 'show'])->name('showGame')->middleware('auth');
Route::get('/permainan-dashboard/{game}/edit', [GameController::class, 'edit'])->name('editGame')->middleware('auth');
Route::put('/permainan-dashboard/{game}', [GameController::class, 'update'])->name('updateGame')->middleware('auth');
Route::get('/download/{id}', [GameController::class, 'downloadFile'])->name('downloadFile');

Route::get('/daftar-akun-pengguna', [UserController::class, 'index'])->name('indexUser')->middleware('auth');
Route::get('/daftar-akun-pengguna/create', [UserController::class, 'create'])->name('createUser')->middleware('auth');
Route::post('/daftar-akun-pengguna', [UserController::class, 'store'])->name('storeUser')->middleware('auth');
Route::delete('/daftar-akun-pengguna/{user}', [UserController::class, 'destroy'])->name('deleteUser')->middleware('auth');
Route::get('/daftar-akun-pengguna/{user}', [UserController::class, 'show'])->name('showUser')->middleware('auth');
Route::get('/daftar-akun-pengguna/{user}/edit', [UserController::class, 'edit'])->name('editUser')->middleware('auth');
Route::put('/daftar-akun-pengguna/{user}', [UserController::class, 'update'])->name('updateUser')->middleware('auth');

Route::get('/info-pengguna-dashboard', [ProfileDashboardController::class, 'edit'])->name('indexProfilDashboard')->middleware('auth');
Route::put('/info-pengguna-dashboard/update', [ProfileDashboardController::class, 'update'])->name('updateProfilDashboard')->middleware('auth');

Route::get('/keamanan', [KeamananController::class, 'index'])->name('indexKeamanan')->middleware('auth');
Route::get('/keamanan/{security}', [KeamananController::class, 'show'])->name('showKeamanan')->middleware('auth');

Route::get('/literasi', [LiterasiController::class, 'index'])->name('indexLiterasi')->middleware('auth');
Route::get('/liteasi/{literacy}', [LiterasiController::class, 'show'])->name('showLiterasi')->middleware('auth');

Route::get('/evaluasi', [EvaluasiController::class, 'index'])->name('indexEvaluasi')->middleware('auth');
Route::get('/evaluasi/{evaluation}', [EvaluasiController::class, 'show'])->name('showEvaluasi')->middleware('auth');

Route::get('/permainan', [PermainanController::class, 'index'])->name('indexLiterasi')->middleware('auth');
Route::get('/permainan/{game}', [PermainanController::class, 'show'])->name('showLiterasi')->middleware('auth');