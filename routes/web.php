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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['admin']], function () {
    //admin=> home
Route::get('/admin/home', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
//admin=> contact
Route::get('/admin/upload_contact', [App\Http\Controllers\AdminController::class, 'uploadContact'])->name('admin.upload_contact');
Route::get('/admin/add_contact', [App\Http\Controllers\AdminController::class, 'addContact'])->name('admin.add_contact');
Route::post('/admin/upload_contact', [App\Http\Controllers\AdminController::class, 'importContact'])->name('admin.import_contact');
Route::post('/admin/store_contact', [App\Http\Controllers\AdminController::class, 'storeContact'])->name('admin.store_contact');
Route::get('/admin/view_contact', [App\Http\Controllers\AdminController::class, 'viewContact'])->name('admin.view_contact');
Route::post('/admin/assign_contact', [App\Http\Controllers\AdminController::class, 'assignContact'])->name('admin.assign_contact');
//admin=>group
Route::get('/admin/create_group', [App\Http\Controllers\AdminController::class, 'createGroup'])->name('admin.create_group');
Route::get('/admin/view_group', [App\Http\Controllers\AdminController::class, 'viewGroupContact'])->name('admin.view_group');
Route::get('/admin/view_one_group/{id}', [App\Http\Controllers\AdminController::class, 'viewOneGroup'])->name('admin.view_one_group');
Route::post('/admin/store_group', [App\Http\Controllers\AdminController::class, 'storeGroup'])->name('admin.store_group');
Route::patch('/admin/update_group/{id}', [App\Http\Controllers\AdminController::class, 'updateGroup'])->name('admin.edit_group');
Route::delete('/admin/delete_group', [App\Http\Controllers\AdminController::class, 'deleteGroup'])->name('admin.delete_group');
// admin=> Send sms
Route::get('/admin/send_sms', [App\Http\Controllers\AdminController::class, 'sendSms'])->name('admin.send_sms');
Route::get('/admin/send_group_sms', [App\Http\Controllers\AdminController::class, 'sendGroupSms'])->name('admin.send_group_sms');
Route::get('/admin/view_sms/{id}', [App\Http\Controllers\AdminController::class, 'viewSms'])->name('admin.view_sms');
Route::post('/admin/store_sms', [App\Http\Controllers\AdminController::class, 'storeSms'])->name('admin.store_sms');
});


//sample routes
    // Route::get('/admin/add_vistor_book', [App\Http\Controllers\AdminController::class, 'addVisitor']);
    // Route::post('/admin/store_visitor', [App\Http\Controllers\AdminController::class, 'storeVisitor'])->name('store.visitor');
    // Route::get('/admin/view_visitor_book', [App\Http\Controllers\AdminController::class, 'viewVisitor']);
    // Route::patch('/admin/update_visitor_book', [App\Http\Controllers\AdminController::class, 'updateVisitor']);
    // Route::delete('/admin/delete_visitor_book', [App\Http\Controllers\AdminController::class, 'deleteVisitor']);


