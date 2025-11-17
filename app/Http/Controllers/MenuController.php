<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use Inertia\Inertia;

class MenuController extends Controller
{
    public function index()
    {
        $categories = Category::with(['menus' => function($query) {
            $query->where('is_available', true);
        }])->orderBy('order')->get();

        return Inertia::render('Menu/Menu', [
            'categories' => $categories
        ]);
    }
}