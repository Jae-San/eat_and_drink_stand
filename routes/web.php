<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Admin\CommandeController;


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

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});



Route::middleware(['auth', 'check.role:entrepreneur'])->group(function () {
    Route::resource('products', ProductController::class);
});

Route::get('/admin/approuver/{id}', [AdminController::class, 'approuver'])->name('admin.approuver');


// Page vitrine : liste des exposants
Route::get('/stands', [StandController::class, 'index'])->name('stands.index');

// Page vitrine : détail d’un exposant avec ses produits
Route::get('/stands/{id}', [StandController::class, 'show'])->name('stands.show');


Route::get('/panier', [CartController::class, 'panier'])->name('panier');
Route::get('/ajouter-au-panier/{id}', [CartController::class, 'ajouter'])->name('panier.ajouter');
Route::get('/supprimer-du-panier/{id}', [CartController::class, 'supprimer'])->name('panier.supprimer');
Route::post('/valider-commande', [CartController::class, 'validerCommande'])->name('commande.valider');

Route::get('/panier', [CartController::class, 'index'])->name('cart.index');
Route::delete('/panier/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/panier/valider', [CartController::class, 'validateOrder'])->name('cart.validate');
Route::get('/recherche', [SearchController::class, 'search'])->name('search');

Route::middleware(['auth', 'admin'])->group(function () {
Route::get('/admin/commandes', [AdminController::class, 'commandes'])->name('admin.commandes');
});

require __DIR__.'/auth.php';
