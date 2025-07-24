<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StandController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});



Route::middleware(['auth', 'check.role:entrepreneur'])->group(function () {
    Route::resource('products', ProductController::class);
    Route::get('/entrepreneur/dashboard', [App\Http\Controllers\EntrepreneurController::class, 'index'])->name('entrepreneur.dashboard');
});

Route::get('/admin/approuver/{id}',[app\Http\Controllers\AdminController::class,'approuver'])->name('admin.approuver');
Route::post('/admin/rejeter/{id}', [app\Http\Controllers\AdminController::class,'rejeter'])->name('admin.rejeter');

Route::get('/attente', function() {
    return view('auth.attente');
})->name('attente');
Route::get('/rejet', function() {
    $motif = auth()->user()->motif_rejet ?? null;
    return view('auth.rejet', compact('motif'));
})->name('rejet');

Route::get('/stands', [StandController::class, 'index'])->name('stands.index');

require __DIR__.'/auth.php';
