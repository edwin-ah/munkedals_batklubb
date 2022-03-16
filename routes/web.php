<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\AlbumImageController;
use App\Http\Controllers\AlbumYearController;
use App\Http\Controllers\BoardMemberController;
use App\Http\Controllers\CurrentInformationController;
use App\Http\Controllers\HolidayClosedDateController;
use App\Http\Controllers\InformationSheetController;
use App\Http\Controllers\MeetingsProtocolController;
use App\Models\MeetingsProtocol;
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

Route::get('/testRoute', function() {
    dd('BYT');
})->name('testRoute');

Route::get('/', [HolidayClosedDateController::class, 'index'])->name('index');
Route::post('/', [HolidayClosedDateController::class, 'update'])->name('date.update');

Route::get('/hamnomraden', function() {
    return view('pages.portAreas');
})->name('portAreas');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/information', [InformationSheetController::class, 'index'])->name('information.index');
Route::get('/information/add', function() {
    return view('pages.information.add-information');
})->middleware(['auth'])->name('information.add');
Route::post('information/add', [InformationSheetController::class, 'store'])->middleware(['auth']);
Route::get('/information/edit/{informationId}', [InformationSheetController::class, 'edit'])->middleware(['auth'])->name('information.edit');
Route::post('information/edit', [InformationSheetController::class, 'update'])->middleware(['auth'])->name('information.update');
Route::get('/information/delete/{informationId}', [InformationSheetController::class, 'delete'])->middleware(['auth'])->name('information.delete.confirm');
Route::post('/information/delete', [InformationSheetController::class, 'destroy'])->middleware(['auth'])->name('information.delete');

Route::get('/protokoll', [MeetingsProtocolController::class, 'index'])->name('protocol.index');
Route::get('/protokoll/add', function() {
    return view('pages.protocol.add-protocol');
})->middleware(['auth'])->name('protocol.add');
Route::post('protokoll/add', [MeetingsProtocolController::class, 'store'])->middleware(['auth']);
Route::get('/protokoll/edit/{protocolId}', [MeetingsProtocolController::class, 'edit'])->middleware(['auth'])->name('protocol.edit');
Route::post('/protokoll/edit', [MeetingsProtocolController::class, 'update'])->middleware(['auth'])->name('protocol.update');
Route::get('/protokoll/delete/{protocolId}', [MeetingsProtocolController::class, 'delete'])->middleware(['auth'])->name('protocol.delete.confirm');
Route::post('/protokoll/delete', [MeetingsProtocolController::class, 'destroy'])->middleware(['auth'])->name('protocol.delete');

Route::get('/aktuell-information', [CurrentInformationController::class, 'index'])->middleware(['auth'])->name('current-information.index');
Route::get('/aktuell-information/add', function(){
    return view('pages.current-information.add-current-information');
})->middleware(['auth'])->name('current-information.add');
Route::post('/aktuell-information/add', [CurrentInformationController::class, 'store'])->middleware(['auth'])->name('current-information.add');
Route::get('/aktuell-information/edit/{currentInformationId}', [CurrentInformationController::class, 'edit'])->middleware(['auth'])->name('current-information.edit');
Route::post('/aktuell-information/edit', [CurrentInformationController::class, 'update'])->middleware(['auth'])->name('current-information.update');
Route::get('/aktuell-information/delete/{currentInformationId}', [CurrentInformationController::class, 'delete'])->middleware(['auth'])->name('current-information.delete.confirm');
Route::post('/aktuell-information/delete', [CurrentInformationController::class, 'destroy'])->middleware(['auth'])->name('current-information.delete');

Route::get('/om-oss', [BoardMemberController::class, 'index'])->name('board-member.index');
Route::get('/styrelse/add', function() {
    return view('pages.board-member.add-board-member');
})->middleware(['auth'])->name('board-member.add');
Route::post('/styrelse/add', [BoardMemberController::class, 'store'])->middleware(['auth']);
Route::get('/styrelse/edit/{boardMemberId}', [BoardMemberController::class, 'edit'])->middleware(['auth'])->name('board-member.edit');
Route::post('/styrelse/edit', [BoardMemberController::class, 'update'])->middleware(['auth'])->name('board-member.update');
Route::get('/styrelse/delete/{boardMemberId}', [BoardMemberController::class, 'delete'])->middleware(['auth'])->name('board-member.delete.confirm');
Route::post('/styrelse/delete', [BoardMemberController::class, 'destroy'])->middleware(['auth'])->name('board-member.delete');
Route::post('styrelse/delete-image', [BoardMemberController::class, 'destroyImage'])->middleware(['auth'])->name('board-member.delete-image');

Route::get('/bildarkivet', [AlbumController::class, 'index'])->name('album.index');
Route::get('/bildarkivet/{albumYear}', [AlbumController::class, 'albumsYear'])->name('album-year');
Route::get('/bildarkivet/album/add', function() {
    return view('pages.album.add-album');
})->middleware(['auth'])->name('album.add');
Route::post('bildarkivet/album/add', [AlbumController::class, 'store'])->middleware(['auth']);
Route::get('/bildarkivet/album/edit/{albumId}', [AlbumController::class, 'edit'])->middleware(['auth'])->name('album.edit');
Route::post('/bildarkivet/album/edit', [AlbumController::class, 'update'])->middleware(['auth'])->name('album.update');
Route::get('/bildarkivet/album/delete/{albumId}', [AlbumController::class, 'delete'])->middleware(['auth'])->name('album.delete.confirm');
Route::post('/bildarkivet/album/edit/{albumId}', [AlbumController::class, 'destroy'])->middleware(['auth'])->name('album.delete');

Route::get('album/add/image/{albumId}', [AlbumImageController::class, 'add'])->middleware(['auth'])->name('album-image.add');
Route::post('album/add/image', [AlbumImageController::class, 'store'])->middleware(['auth'])->name('album-image.store');
Route::get('album/delete/image/{albumId}', [AlbumImageController::class, 'delete'])->middleware(['auth'])->name('album-image.delete');
Route::post('album/delete/image', [AlbumImageController::class, 'destroy'])->middleware(['auth'])->name('album-image.destroy');


require __DIR__.'/auth.php';
