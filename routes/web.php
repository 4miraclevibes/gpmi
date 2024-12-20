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
use App\Http\Controllers\AkreditasiController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\LeaderController;
use Illuminate\Support\Facades\Artisan;

//migrate
Route::get('/migrate', function () {
    Artisan::call('migrate:refresh --path=/database/migrations/2024_10_02_201652_create_page_contents_table.php');
    return back()->with('success', 'Migrasi berhasil dilakukan');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/pages/{id}', [LandingController::class, 'pageShow'])->name('pages.show');
Route::get('/nesting-pages/{id}', [LandingController::class, 'nestingPageShow'])->name('nesting-pages.show');
Route::get('/nesting-pages/{nestingPage}/page-contents/{id}', [LandingController::class, 'nestingPageContentShow'])->name('nesting-pages.page-contents.show');
Route::get('/child-pages/{id}', [LandingController::class, 'childPageShow'])->name('child-pages.show');
Route::get('/akreditasi', [LandingController::class, 'akreditasi'])->name('akreditasi');
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
    Route::get('/page', [PageController::class, 'index'])->name('page.index');
    Route::get('/page/create', [PageController::class, 'create'])->name('page.create');
    Route::post('/page/store', [PageController::class, 'store'])->name('page.store');
    Route::get('/page/{page}/edit', [PageController::class, 'edit'])->name('page.edit');
    Route::put('/page/{page}/update', [PageController::class, 'update'])->name('page.update');
    Route::delete('/page/{page}/destroy', [PageController::class, 'destroy'])->name('page.destroy');
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
    Route::get('/nesting-page', [NestingPageController::class, 'index'])->name('nesting-page.index');
    Route::post('/nesting-page/store', [NestingPageController::class, 'store'])->name('nesting-page.store');
    Route::patch('/nesting-page/{nestingPage}/update', [NestingPageController::class, 'update'])->name('nesting-page.update');
    Route::delete('/nesting-page/{nestingPage}/destroy', [NestingPageController::class, 'destroy'])->name('nesting-page.destroy');
    Route::get('/nesting-page/create', [NestingPageController::class, 'create'])->name('nesting-page.create');
    Route::get('/nesting-page/{nestingPage}/edit', [NestingPageController::class, 'edit'])->name('nesting-page.edit');
    //page content
    Route::get('/nesting-page/{nestingPage}/page-contents', [PageContentController::class, 'index'])->name('nesting-page.page-contents.index');
    Route::get('/nesting-page/{nestingPage}/page-contents/create', [PageContentController::class, 'create'])->name('nesting-page.page-contents.create');
    Route::post('/nesting-page/{nestingPage}/page-contents/store', [PageContentController::class, 'store'])->name('nesting-page.page-contents.store');
    Route::get('/nesting-page/page-contents/{pageContent}/edit', [PageContentController::class, 'edit'])->name('nesting-page.page-contents.edit');
    Route::patch('/nesting-page/page-contents/{pageContent}/update', [PageContentController::class, 'update'])->name('nesting-page.page-contents.update');
    Route::delete('/nesting-page/page-contents/{pageContent}/destroy', [PageContentController::class, 'destroy'])->name('nesting-page.page-contents.destroy');
    //akreditasi
    Route::get('/akreditasi-departments', [AkreditasiController::class, 'index'])->name('akreditasi-departments.index');
    Route::post('/akreditasi-departments', [AkreditasiController::class, 'store'])->name('akreditasi-departments.store');
    Route::patch('/akreditasi-departments/{department}', [AkreditasiController::class, 'update'])->name('akreditasi-departments.update');
    Route::delete('/akreditasi-departments/{department}', [AkreditasiController::class, 'destroy'])->name('akreditasi-departments.destroy');
    Route::get('/akreditasi-departments/{akreditasiStudyProgram}/documents', [AkreditasiController::class, 'showDocuments'])->name('akreditasi-departments.study-programs.documents.index');
    Route::post('/akreditasi-departments/{akreditasiStudyProgram}/documents', [AkreditasiController::class, 'storeDocument'])->name('akreditasi-departments.study-programs.documents.store');
    Route::put('/akreditasi-departments/documents/{document}', [AkreditasiController::class, 'updateDocument'])->name('akreditasi-departments.study-programs.documents.update');
    Route::delete('/akreditasi-departments/documents/{document}', [AkreditasiController::class, 'destroyDocument'])->name('akreditasi-departments.study-programs.documents.destroy');
    Route::post('/akreditasi-departments/{department}/study-programs', [AkreditasiController::class, 'storeStudyProgram'])->name('akreditasi-departments.study-programs.store');
    Route::delete('/akreditasi-departments/study-programs/{studyProgram}', [AkreditasiController::class, 'destroyStudyProgram'])->name('akreditasi-departments.study-programs.destroy');
    Route::put('/akreditasi-departments/study-programs/{studyProgram}', [AkreditasiController::class, 'updateStudyProgram'])->name('akreditasi-departments.study-programs.update');
    //content
    Route::get('/content', [ContentController::class, 'index'])->name('content.index');
    Route::put('/content/{content}', [ContentController::class, 'update'])->name('content.update');
    // Leader routes
    Route::get('/leaders', [LeaderController::class, 'index'])->name('leaders.index');
    Route::post('/leaders', [LeaderController::class, 'store'])->name('leaders.store');
    Route::patch('/leaders/{leader}', [LeaderController::class, 'update'])->name('leaders.update');
    Route::delete('/leaders/{leader}', [LeaderController::class, 'destroy'])->name('leaders.destroy');
});
require __DIR__.'/auth.php';
