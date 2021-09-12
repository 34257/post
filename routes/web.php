<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostControllers;
use App\Models\Posts;

Route::middleware('auth')->group(function () {
    
    Route::get('/', function () {
        $data['posts'] = Posts::all();
        return view('home',$data);
    });

    Route::post('/posting',[PostControllers::class,'insert'])->name('post');

     Route::get('/update/{id}', [PostControllers::class,'edit'])->name('edit');
    Route::put('/set/{id}', [PostControllers::class,'update'])->name('update');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
