<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProductController;

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
