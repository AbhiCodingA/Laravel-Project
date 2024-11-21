<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminPostsController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\MakeAdminController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SocialShareButtonsController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\PageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/blog/{blog:slug}', [HomeController::class, 'post'])->name('post.single');
Route::get('/category/{category:slug}', [HomeController::class, 'category'])->name('home.category');

Route::get('/page/{slug}', [HomeController::class, 'page'])->name('home.page');

Route::GET('/search', [HomeController::class, 'search'])->name('search.post');


//------------Admin Dashboard Routes------------


Route::prefix('admin')->name('admin.')->middleware('auth', 'isadmin')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::resource('/posts', AdminPostsController::class);

    Route::get('/category/show', [AdminCategoryController::class, 'index'])->name('category.show');
    Route::get('/category/create', [AdminCategoryController::class, 'create'])->name('category.create');
    Route::get('/category/edit/{id}', [AdminCategoryController::class, 'edit'])->name('category.edit');
    Route::get('/category/delete/{id}', [AdminCategoryController::class, 'delete'])->name('category.delete');
    Route::post('/category/store', [AdminCategoryController::class, 'store'])->name('category.store');
    Route::post('/category/update', [AdminCategoryController::class, 'update'])->name('category.update');

    Route::get('/admin/post/show', [AdminPostsController::class, 'index'])->name('post.show');

    Route::get('/user/show', [AdminUserController::class, 'index'])->name('user.show');
    Route::post('/user/update', [AdminUserController::class, 'update'])->name('user.update');
    Route::post('/user/admin/update', [AdminUserController::class, 'adminUpdate'])->name('user.admin');

    Route::get('/user/show/list', [AdminSettingController::class, 'index'])->name('user.showlist');
    Route::get('/user/show/delete/{id}', [AdminSettingController::class, 'delete'])->name('user.delete');

    Route::post('/user/show/update/{id}', [AdminSettingController::class, 'update'])->name('user.editupdate');

    Route::get('/admin/show', [MakeAdminController::class, 'index'])->name('admin.show');

    Route::get('/admin/show/edit/{id}', [MakeAdminController::class, 'edit'])->name('admin.edit');
    Route::post('/admin/show/update/{id}', [MakeAdminController::class, 'update'])->name('admin.update');

    Route::get('/admin/show/create', [MakeAdminController::class, 'create'])->name('admin.create');
    Route::get('/admin/show/delete/{id}', [MakeAdminController::class, 'delete'])->name('admin.delete');
    Route::post('/admin/show/store', [MakeAdminController::class, 'store'])->name('admin.store');

    Route::get('admin/website/settings/', [SettingController::class, 'index'])->name('admin.setting');
    Route::post('admin/website/settings/update', [SettingController::class, 'updateSetting'])->name('update.setting');

    Route::get('/social-media-share', [SocialShareButtonsController::class, 'ShareWidget']);


    Route::get('/social/show', [SocialController::class, 'index'])->name('social.show');
    Route::get('/social/create', [SocialController::class, 'create'])->name('social.create');
    Route::get('/social/edit/{id}', [SocialController::class, 'edit'])->name('social.edit');
    Route::get('/social/delete/{id}', [SocialController::class, 'delete'])->name('social.delete');
    Route::post('/social/store', [SocialController::class, 'store'])->name('social.store');
    Route::post('/social/update', [SocialController::class, 'update'])->name('social.update');

    Route::get('/page/show', [PageController::class, 'show'])->name('page.show');
    Route::get('/page/create', [PageController::class, 'index'])->name('page.create');
    Route::get('/page/edit/{id}', [PageController::class, 'edit'])->name('page.edit');
    Route::get('/page/delete/{id}', [PageController::class, 'delete'])->name('page.delete');
    Route::post('/page/store', [PageController::class, 'store'])->name('page.store');
    Route::post('/page/update', [PageController::class, 'update'])->name('page.update');

});


Route::get('/dashboard', function () {
    return view('dashboard'); })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
