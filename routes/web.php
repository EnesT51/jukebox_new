<?php


use App\Http\Controllers\SongController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('layouts/master');
});

Route::get('/dashboard', function () { 
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'disable-back-btn'])->group(function() {

    Route::get('/genre/all', [GenreController::class, 'index'])->name('genre.index');
    Route::get('/genre/create', [GenreController::class, 'create'])->name('genre.create');
    Route::post('/genre/store', [GenreController::class, 'store'])->name('genre.store');
    Route::get('/genre/destroy/{genre}', [GenreController::class, 'destroy'])->name('genre.destroy');
    
    Route::get('/song/{song}/edit', [SongController::class, 'edit'])->name('song.edit');
    Route::get('/song/{song}/update', [SongController::class, 'update'])->name('song.update');
    Route::get('/song/all', [SongController::class, 'index'])->name('song.index');
    Route::post('add-songs-to-playlist', [SongController::class, 'addSongsToPlaylist'])->name('add-song-to-playlist');
    Route::post('remove-song-from-playlist', [SongController::class, 'RemoveSongFromPlaylist'])->name('remove-song-from-playlist');
    Route::get('/song/detail/{id}', [SongController::class, 'SongDetail'])->name('song.detail');
    Route::get('/song/create', [SongController::class, 'create'])->name('song.create');
    Route::post('/song/store', [SongController::class, 'store'])->name('song.store');
    Route::get('/song/destroy/{song}', [SongController::class, 'destroy'])->name('song.destroy');

    Route::get('/playlist/all', [PlaylistController::class, 'index'])->name('playlist.index');
    Route::get('/playlist/create', [PlaylistController::class, 'create'])->name('playlist.create');
    Route::get('/playlist/{playlist}/update', [PlaylistController::class, 'update'])->name('playlist.update');
    Route::get('/playlist/{playlist}/edit', [PlaylistController::class, 'edit'])->name('playlist.edit');

    Route::post('/playlist/store', [PlaylistController::class, 'store'])->name('playlist.store');
    Route::get('/playlist/destroy/{playlist}', [PlaylistController::class, 'destroy'])->name('playlist.destroy');
    Route::get('/playlist/show/{id}', [PlaylistController::class, 'show'])->name('playlist.show');

});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');










