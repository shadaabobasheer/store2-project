<?php
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('admin', function(){
    return view('layouts.admin');
});

Route::get('products', [ProductController::class, 'index']);
Route::get('products/create', [ProductController::class, 'create']);
Route::post('products/store', [ProductController::class, 'store']);
Route::get('products/edit/{id}', [ProductController::class, 'edit']);
Route::get('products/delete/{id}', [ProductController::class, 'destroy']);
Route::patch('products/update/{id}', [ProductController::class, 'update']);

Route::get('categories', [CategoryController::class, 'index']);
Route::get('categories/create', [CategoryController::class, 'create']);
Route::post('categories/store', [CategoryController::class, 'store']);
Route::get('categories/edit/{id}', [CategoryController::class, 'edit']);
Route::get('categories/delete/{id}', [CategoryController::class, 'destroy']);
Route::patch('categories/update/{id}', [CategoryController::class, 'update']);

Route::get('/', [FrontController::class, 'index']);


Route::get('/', function (Request $request) {
    $categories = Category::all();

    $query = Product::query();
    if ($request->has('category') && $request->category != 'all') {
        $query->where('category_id', $request->category);
    }
    $products = $query->get();

    return view('home.index', compact('categories', 'products'));
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
