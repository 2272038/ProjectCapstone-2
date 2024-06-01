<?php

use App\Http\Controllers\PollingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KurikulumController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [Controller::class, "indexLogin"]);

Route::post('/', [Controller::class, "userLogin"]);


Route::middleware(['CheckAdmin'])->group(function() {
//    Admin
    Route::get('/admin', [Controller::class, 'indexAdmin']);
    Route::get('/admin/user', [UserController::class, 'getUsers'])->name('admin-users');
    Route::post('/admin/user', [UserController::class, 'addUsers'])->name('add-user');
    Route::get('/admin/{id}/edit', [UserController::class, 'edit'])->name('admin.edit');
    Route::post('/admin/{id}/edit', [UserController::class, 'editUser'])->name('admin.edit-user');
    Route::get('/admin/{id}/delete', [UserController::class, 'deleteUser'])->name('admin-delete');
    Route::get('/admin/profile', [ProfileController::class, 'profileAdmin'])->name('admin-profile');

//    Program Studi

    Route::get('/prodi', [Controller::class, 'indexProdi']);
    Route::get('/prodi/{id}/edit', [MataKuliahController::class, 'edit'])->name('prodi.edit');
//      Polling
    Route::get('/prodi/create-polling', [PollingController::class, 'getPollings'])->name('prodi-polling');
    Route::post('/prodi/create-polling', [PollingController::class, 'addPolling'])->name('add-polling');
    Route::get('/prodi/{polling_id}/editPoll', [PollingController::class, 'editPoll'])->name('prodi.editPoll');
    Route::post('/prodi/{polling_id}/editPoll', [PollingController::class, 'editPolling'])->name('prodi.edit-polling');
    Route::get('/prodi/{polling_id}/delete', [PollingController::class, 'deletePolling'])->name('polling-delete');

//    Mata Kuliah
    Route::get('/prodi/mata-kuliah', [MataKuliahController::class, 'getMataKuliah'])->name('prodi-mata-kuliah');
    Route::post('/prodi/mata-kuliah', [MataKuliahController::class, 'addMataKuliah'])->name('add-mata-kuliah');
    Route::post('/prodi/{id}/edit', [MataKuliahController::class, 'editMatkul'])->name('prodi.edit-mata-kuliah');
    Route::get('/prodi/{id}/delete', [MataKuliahController::class, 'deleteMatkul'])->name('matkul-delete');
    Route::get('/prodi/profile', [ProfileController::class, 'profileProdi'])->name('prodi-profile');
//    Kurikulum
    Route::get('/prodi/kurikulum', [KurikulumController::class, 'getKurikulum'])->name('prodi-kurikulum');
    Route::post('/prodi/kurikulum', [KurikulumController::class, 'addKurikulum'])->name('add-kurikulum');
    Route::get('/prodi/kurikulum/{id}/edit', [KurikulumController::class, 'edit'])->name('prodi.edit-kurikulum');
    Route::post('/prodi/kurikulum/{id}/edit', [KurikulumController::class, 'editKurikulum'])->name('prodi.edit-kurikulum');
    Route::get('/prodi/kurikulum/{id}/delete', [KurikulumController::class, 'deleteKurikulum'])->name('kurikulum-delete');
});

//    User
    Route::get('/user', [Controller::class, "indexUser"]);
    Route::get('/user/mata-kuliah', [MataKuliahController::class, "getMataKuliahUser"])->name('user-mata-kuliah');
    Route::get('/user/polling', [PollingController::class, "getPollingsusers"])->name('user-polling');
    Route::get('user/kurikulum',[KurikulumController::class,'getKurikulumUser'])->name('user.kurikulum');
    Route::get('/user/profile', [ProfileController::class, 'profileUser'])->name('user-profile');
    Route::get('/logout', [Controller::class, "logout"]);


