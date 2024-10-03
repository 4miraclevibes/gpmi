<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ParentPageController;
use App\Http\Controllers\ChildPageController;
use App\Http\Controllers\NestingPageController;
use App\Http\Controllers\PageContentController;
use App\Http\Controllers\LandingController;

Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/pages/{id}', [LandingController::class, 'pageShow'])->name('pages.show');
Route::get('/nesting-pages/{id}', [LandingController::class, 'nestingPageShow'])->name('nesting-pages.show');
Route::get('/nesting-pages/{nestingPage}/page-contents/{id}', [LandingController::class, 'nestingPageContentShow'])->name('nesting-pages.page-contents.show');
Route::get('/child-pages/{id}', [LandingController::class, 'childPageShow'])->name('child-pages.show');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //user
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}/update', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}/destroy', [UserController::class, 'destroy'])->name('users.destroy');
    //document
    Route::get('/documents', [DocumentController::class, 'index'])->name('documents.index');
    Route::post('/documents/store', [DocumentController::class, 'store'])->name('documents.store');
    Route::delete('/documents/{document}/destroy', [DocumentController::class, 'destroy'])->name('documents.destroy');
    //page
    Route::get('/pages', [PageController::class, 'index'])->name('pages.index');
    Route::get('/pages/create', [PageController::class, 'create'])->name('pages.create');
    Route::post('/pages/store', [PageController::class, 'store'])->name('pages.store');
    Route::get('/pages/{page}/edit', [PageController::class, 'edit'])->name('pages.edit');
    Route::put('/pages/{page}/update', [PageController::class, 'update'])->name('pages.update');
    Route::delete('/pages/{page}/destroy', [PageController::class, 'destroy'])->name('pages.destroy');
    //parent page
    Route::get('/parent-pages', [ParentPageController::class, 'index'])->name('parent-pages.index');
    Route::post('/parent-pages/store', [ParentPageController::class, 'store'])->name('parent-pages.store');
    Route::patch('/parent-pages/{parentPage}/update', [ParentPageController::class, 'update'])->name('parent-pages.update');
    Route::delete('/parent-pages/{parentPage}/destroy', [ParentPageController::class, 'destroy'])->name('parent-pages.destroy');
    //child page
    Route::get('/parent-pages/{parentPage}/child-pages', [ChildPageController::class, 'index'])->name('parent-pages.child-pages.index');
    Route::get('/parent-pages/{parentPage}/child-pages/create', [ChildPageController::class, 'create'])->name('parent-pages.child-pages.create');
    Route::post('/parent-pages/{parentPage}/child-pages/store', [ChildPageController::class, 'store'])->name('parent-pages.child-pages.store');
    Route::get('/parent-pages/child-pages/{childPage}/edit', [ChildPageController::class, 'edit'])->name('parent-pages.child-pages.edit');
    Route::patch('/parent-pages/child-pages/{childPage}/update', [ChildPageController::class, 'update'])->name('parent-pages.child-pages.update');
    Route::delete('/parent-pages/child-pages/{childPage}/destroy', [ChildPageController::class, 'destroy'])->name('parent-pages.child-pages.destroy');
    //nesting page
    Route::get('/nesting-pages', [NestingPageController::class, 'index'])->name('nesting-pages.index');
    Route::post('/nesting-pages/store', [NestingPageController::class, 'store'])->name('nesting-pages.store');
    Route::patch('/nesting-pages/{nestingPage}/update', [NestingPageController::class, 'update'])->name('nesting-pages.update');
    Route::delete('/nesting-pages/{nestingPage}/destroy', [NestingPageController::class, 'destroy'])->name('nesting-pages.destroy');
    Route::get('/nesting-pages/create', [NestingPageController::class, 'create'])->name('nesting-pages.create');
    Route::get('/nesting-pages/{nestingPage}/edit', [NestingPageController::class, 'edit'])->name('nesting-pages.edit');
    //page content
    Route::get('/nesting-pages/{nestingPage}/page-contents', [PageContentController::class, 'index'])->name('nesting-pages.page-contents.index');
    Route::get('/nesting-pages/{nestingPage}/page-contents/create', [PageContentController::class, 'create'])->name('nesting-pages.page-contents.create');
    Route::post('/nesting-pages/{nestingPage}/page-contents/store', [PageContentController::class, 'store'])->name('nesting-pages.page-contents.store');
    Route::get('/nesting-pages/page-contents/{pageContent}/edit', [PageContentController::class, 'edit'])->name('nesting-pages.page-contents.edit');
    Route::patch('/nesting-pages/page-contents/{pageContent}/update', [PageContentController::class, 'update'])->name('nesting-pages.page-contents.update');
    Route::delete('/nesting-pages/page-contents/{pageContent}/destroy', [PageContentController::class, 'destroy'])->name('nesting-pages.page-contents.destroy');
});

require __DIR__.'/auth.php';
