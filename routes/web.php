<?php

use App\Http\Controllers\PollingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KurikulumController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\PollingDetailController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\JeBecontroller;


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
    Route::prefix('admin')->group(function () {
        Route::get('/prodi', [ProdiController::class, 'index'])->name('admin.prodi');
        Route::post('/prodi', [ProdiController::class, 'store'])->name('admin.prodi.add');
        Route::get('/prodi/{id}/edit', [ProdiController::class, 'edit'])->name('admin.prodi.edit');
        Route::post('/prodi/{id}/edit', [ProdiController::class, 'update'])->name('admin.prodi.update');
        Route::delete('/prodi/{id}/delete', [ProdiController::class, 'destroy'])->name('admin.prodi.delete');
    });
    Route::prefix('admin')->group(function () {
        Route::get('/periode', [PeriodeController::class, 'getPeriode'])->name('admin-periode');
        Route::post('/periode', [PeriodeController::class, 'addPeriode'])->name('admin.periode.add');
        Route::get('/periode/{id}/edit', [PeriodeController::class, 'editPeriode'])->name('admin.periode.edit');
        Route::post('/periode/{id}/edit', [PeriodeController::class, 'updatePeriode'])->name('admin.periode.update');
        Route::delete('/periode/{id}/delete', [PeriodeController::class, 'deletePeriode'])->name('admin.periode.delete');
    });
    Route::prefix('admin')->group(function () {
        Route::get('/jenis_beasiswa', [JeBecontroller::class, 'getJenisBeasiswa'])->name('admin-jenis_beasiswa');
        Route::post('/jenis_beasiswa', [JeBecontroller::class, 'addJenisBeasiswa'])->name('admin.jenis_beasiswa.add');
        Route::get('/jenis_beasiswa/{id}/edit', [JeBecontroller::class, 'editJenisBeasiswa'])->name('admin.jenis_beasiswa.edit');
        Route::post('/jenis_beasiswa/{id}/edit', [JeBecontroller::class, 'updateJenisBeasiswa'])->name('admin.jenis_beasiswa.update');
        Route::delete('/jenis_beasiswa/{id}/delete', [JeBecontroller::class, 'deleteJenisBeasiswa'])->name('admin.jenis_beasiswa.delete');
    });

    Route::get('/admin/prodi/{id}/edit', [ProdiController::class, 'edit'])->name('admin.prodi.edit');
    Route::post('/admin/prodi/{id}/edit', [ProdiController::class, 'update'])->name('admin.prodi.update');
    Route::get('/admin', [Controller::class, 'indexAdmin']);
    Route::get('/admin/user', [UserController::class, 'getUsers'])->name('admin-users');
    Route::post('/admin/user', [UserController::class, 'addUsers'])->name('add-user');
    Route::get('/admin/{nrp}/edit', [UserController::class, 'edit'])->name('admin.edit');
    Route::post('/admin/{nrp}/edit', [UserController::class, 'editUser'])->name('admin.edit-user');
    Route::delete('/admin/{nrp}/delete', [UserController::class, 'deleteUser'])->name('delete-user');
    Route::get('/admin/profile', [ProfileController::class, 'profileAdmin'])->name('admin-profile');


//    Fakultas
    Route::get('/fakultas', [Controller::class, 'indexFakultas']);
    Route::get('/fakultas/profile', [ProfileController::class, 'profileFakultas'])->name('fakultas-profile');


//    Program Studi

    Route::get('/prodi', [Controller::class, 'indexProdi']);
    Route::get('/prodi/{id}/edit', [MataKuliahController::class, 'edit'])->name('prodi.edit');

    // Polling Detail
    Route::get('prodi/{polling_id}/create-polling-view',[PollingDetailController::class, 'getPolDetail'])->name('prodi-polling-detail');

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
    Route::get('/user/polling', [PollingController::class, 'getPollingUser'])->name('polling');
    Route::get('user/kurikulum',[KurikulumController::class,'getKurikulumUser'])->name('user-kurikulum');
    Route::get('/user/profile', [ProfileController::class, 'profileUser'])->name('user-profile');
    Route::get('/logout', [Controller::class, "logout"]);
    Route::get('user/polling-view',[PollingDetailController::class, 'getPolDetailUser'])->name('user-polling-detail');
    Route::get('user/{polling_id}/user-vote-polling',[PollingDetailController::class, 'getVoteUser'])->name('user-voting-detail');
    Route::post('user/{polling_id}/user-vote-polling',[PollingDetailController::class, 'SubmitVoteUser'])->name('user-voting-submit');


