<?php

use Inertia\Inertia;
<<<<<<< HEAD
use App\Http\Controllers\ProductController;
=======
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProductController;
>>>>>>> 4cb686b8216c3697aac4817a65ca1f27d8d1f235

Route::get('/', function () {
    return Inertia::render('Home/Home');
});
Route::get('/login', function () {
    return Inertia::render('Auth/Login');
})->name('login');
Route::get('/test', function () {
    return ['message' => 'API Laravel Berjalan dari api.php!'];
});
Route::get('/api/products', function () {
    return response()->json([
        ['id' => 1, 'nama' => 'Es Kopi Susu', 'harga' => 25000],
        ['id' => 2, 'nama' => 'Caramel Latte', 'harga' => 30000],
    ]);
});
<<<<<<< HEAD

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// bebas akses untuk test Postman / development
Route::resource('products', ProductController::class); //->withoutMiddleware(['auth']);
=======
>>>>>>> 4cb686b8216c3697aac4817a65ca1f27d8d1f235
