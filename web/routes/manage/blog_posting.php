<?php

use App\Http\Controllers\BlogPostingController;
use Illuminate\Support\Facades\Route;

Route::name('Index')->get('', [BlogPostingController::class, 'index']);

Route::name('Create')->group(function()
{
    Route::get('add', [BlogPostingController::class, 'create']);
    Route::post('add', [BlogPostingController::class, 'store']);
});

Route::name('Update')->group(function()
{
    Route::get('{object}/edit', [BlogPostingController::class, 'edit']);
    Route::post('{object}/edit', [BlogPostingController::class, 'update']);
});

Route::name('Destroy')->group(function()
{
    Route::get('{object}/delete', [BlogPostingController::class, 'destroy']);
    Route::post('{object}/delete', [BlogPostingController::class, 'destroy']);
});
