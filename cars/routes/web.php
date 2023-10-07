<?php

use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CarsController as AdminCarsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\CategoriesController as AdminCategoriesController;
use App\Http\Controllers\Admin\UsersController as AdminUsersController;
use App\Http\Controllers\Admin\OrdersController as AdminOrdersController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\BrandsController as AdminBrandsController;
use App\Http\Controllers\Admin\InquiriesController;
use App\Http\Controllers\Admin\ReviewsController as AdminReviewsController;
use App\Http\Controllers\Admin\ProvincesController as AdminProvincesController;
use App\Http\Controllers\Admin\DiscountController;


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


    // Dont Change any sequence of the routes

//home
//cars-list
Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
Route::get('/cars/search', [CarController::class, 'search'])->name('cars.search');
Route::get('/cars/filter', [CarController::class, 'filterByCategory'])->name('cars.filter');
Route::get('/cars/{id}', [CarController::class, 'show'])->name('cars.show');
Route::post('/cars/{id}', [CarController::class, 'review']);

//car-view
//contact
Route::get('/', function () {
    $title="Home Page";
    return view('welcome',compact('title'));
});


// Routes for Cart

// Route to show the cart
Route::get('/cart', [CartController::class, 'show'])->name('cart.show');

// Route to add a car to the cart
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');

// Route to remove a car from the cart
Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');

// End of Routes for Cart

Route::get('/about', function () {
    return view('about.index');
})->name('about');

// Routes for contact us
Route::get('/contact/create',[ContactController::class,'create']);
Route::post('/contact',[ContactController::class,'store']);
//End of routes for contact us
Auth::routes();

Route::get('/home',function(){
    $title="Home Page";
    return view('welcome',compact('title'));
})->name('home');


//Routes for User
Route::get('/user/profile',[UserController::class,'show']);
Route::get('/user/edit',[UserController::class,'edit']);
Route::put('/user/update',[UserController::class,'update']);
Route::get('/user/security',[UserController::class,'edit_password']);
Route::put('/user/security',[UserController::class,'update_password']);
//End of routes for user

//Start of Admin Routes

//cars
Route::middleware(['auth','verifyadmin'])->group(function(){
    Route::get('/admin',[AdminController::class,'index']);
    Route::get('/admin/cars',[AdminCarsController::class,'index']);
    Route::get('/admin/cars/create',[AdminCarsController::class,'create']);
    Route::post('/admin/cars/',[AdminCarsController::class,'store']);
    Route::get('/admin/cars/edit/{id}',[AdminCarsController::class,'edit']);
    Route::put('/admin/cars/{id}',[AdminCarsController::class,'update']);
    Route::get('/admin/cars/search',[AdminCarsController::class,'search']);
    Route::delete('/admin/cars/{id}',[AdminCarsController::class,'destroy']);
    Route::get('/admin/cars/{id}',[AdminCarsController::class,'show']);

    // Dashboard Page
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    
    //Routes for Orders
    Route::get('/admin/orders',[AdminOrdersController::class,'index']);
    Route::get('/admin/orders/edit/{id}',[AdminOrdersController::class,'edit']);
    Route::put('/admin/orders/{id}',[AdminOrdersController::class,'update']);
    Route::get('/admin/orders/search',[AdminOrdersController::class,'search']);
    Route::get('/admin/orders/{id}',[AdminOrdersController::class,'show']);
    Route::delete('/admin/orders/{id}',[AdminOrdersController::class,'destroy']);
    //End of orders route

// categories
Route::get('/admin/categories', [AdminCategoriesController::class, 'index'])->name('admin.categories.index');
Route::get('/admin/categories/create', [AdminCategoriesController::class, 'create'])->name('admin.categories.create');
Route::post('/admin/categories', [AdminCategoriesController::class, 'store'])->name('admin.categories.store');
Route::get('/admin/categories/search',[AdminCategoriesController::class,'search']);
Route::get('/admin/categories/{id}', [AdminCategoriesController::class, 'show'])->name('admin.categories.show');
Route::get('/admin/categories/edit/{id}', [AdminCategoriesController::class, 'edit'])->name('admin.categories.edit');
Route::put('/admin/categories/{id}', [AdminCategoriesController::class, 'update'])->name('admin.categories.update');
Route::delete('/admin/categories/{id}', [AdminCategoriesController::class, 'destroy'])->name('admin.categories.destroy');

 // Users
 Route::get('/admin/users', [AdminUsersController::class, 'index'])->name('admin.users.index');
 Route::get('/admin/users/search',[AdminUsersController::class,'search']);
 Route::get('/admin/users/{id}', [AdminUsersController::class, 'show'])->name('admin.users.show');
 Route::get('/admin/users/edit/{id}', [AdminUsersController::class, 'edit'])->name('admin.users.edit');
 Route::put('/admin/users/{id}', [AdminUsersController::class, 'update'])->name('admin.users.update');
 Route::delete('/admin/users/{id}', [AdminUsersController::class, 'destroy'])->name('admin.users.destroy');

Route::get('/admin/categories', [CategoriesController::class, 'index'])->name('admin.categories.index');
Route::get('/admin/categories/create', [CategoriesController::class, 'create'])->name('admin.categories.create');
Route::post('/admin/categories', [CategoriesController::class, 'store'])->name('admin.categories.store');
Route::get('/admin/categories/{id}', [CategoriesController::class, 'show'])->name('admin.categories.show');
Route::get('/admin/categories/edit/{id}', [CategoriesController::class, 'edit'])->name('admin.categories.edit');
Route::put('/admin/categories/{id}', [CategoriesController::class, 'update'])->name('admin.categories.update');
Route::delete('/admin/categories/{id}', [CategoriesController::class, 'destroy'])->name('admin.categories.destroy');

// Brands
Route::get('/admin/brands', [AdminBrandsController::class, 'index'])->name('admin.brands.index');
Route::get('/admin/brands/create', [AdminBrandsController::class, 'create'])->name('admin.brands.create');
Route::post('/admin/brands', [AdminBrandsController::class, 'store'])->name('admin.brands.store');
Route::get('/admin/brands/search',[AdminBrandsController::class,'search']);
Route::get('/admin/brands/{id}', [AdminBrandsController::class, 'show'])->name('admin.brands.show');
Route::get('/admin/brands/edit/{id}', [AdminBrandsController::class, 'edit'])->name('admin.brands.edit');
Route::put('/admin/brands/{id}', [AdminBrandsController::class, 'update'])->name('admin.brands.update');
Route::delete('/admin/brands/{id}', [AdminBrandsController::class, 'destroy'])->name('admin.brands.destroy');

// Inquiries
Route::get('/admin/inquiries',[InquiriesController::class,'index']);
Route::get('/admin/inquiries/create',[InquiriesController::class,'create']);
Route::get('/admin/inquiries/edit/{id}',[InquiriesController::class,'edit']);
Route::get('/admin/inquiries/search',[InquiriesController::class,'search']);
Route::get('/admin/inquiries/{id}',[InquiriesController::class,'show']);
Route::post('/admin/inquiries',[InquiriesController::class,'store']);
Route::put('/admin/inquiries/{id}',[InquiriesController::class,'update']);
Route::delete('/admin/inquiries/{id}',[InquiriesController::class,'destroy']);

// reviews
Route::get('/admin/reviews', [AdminReviewsController::class, 'index'])->name('admin.reviews.index');
Route::get('/admin/reviews/search',[AdminReviewsController::class,'search']);
Route::get('/admin/reviews/{id}', [AdminReviewsController::class, 'show'])->name('admin.reviews.show');
Route::delete('/admin/reviews/{id}', [AdminReviewsController::class, 'destroy'])->name('admin.reviews.destroy');
// provinces
Route::get('/admin/provinces', [AdminProvincesController::class, 'index'])->name('provinces.index');
    Route::get('/admin/provinces/create', [AdminProvincesController::class, 'create'])->name('provinces.create');
    Route::post('/admin/provinces', [AdminProvincesController::class, 'store'])->name('provinces.store');
    Route::get('/admin/provinces/search',[AdminProvincesController::class,'search']);
    Route::get('/admin/provinces/{province}', [AdminProvincesController::class, 'show'])->name('provinces.show');
    Route::get('/admin/provinces/edit/{province}', [AdminProvincesController::class, 'edit'])->name('provinces.edit');
    Route::put('/admin/provinces/{province}', [AdminProvincesController::class, 'update'])->name('provinces.update');
    Route::delete('/admin/provinces/{province}', [AdminProvincesController::class, 'destroy'])->name('provinces.destroy');

// Promo Code / Discounts
Route::get('/admin/discounts', [DiscountController::class, 'index'])->name('admin.discounts.index');
Route::get('/admin/discounts/create', [DiscountController::class, 'create'])->name('admin.discounts.create');
Route::post('/admin/discounts', [DiscountController::class, 'store'])->name('admin.discounts.store');
Route::get('/admin/discounts/search',[DiscountController::class,'search']);
Route::get('/admin/discounts/{discount}', [DiscountController::class, 'show'])->name('admin.discounts.show'); // Add this line
Route::get('/admin/discounts/{discount}/edit', [DiscountController::class, 'edit'])->name('admin.discounts.edit');
Route::put('/admin/discounts/{discount}', [DiscountController::class, 'update'])->name('admin.discounts.update');
Route::delete('/admin/discounts/{discount}', [DiscountController::class, 'destroy'])->name('admin.discounts.destroy');

});
//End of Admin Routes
//Routes for user'orders
Route::get('/orders',[OrderController::class,'indexByUserId']);
Route::get('/checkout',[OrderController::class,'create']);
// Route::post('/checkout',[PageController::class,'precheckout']);
Route::post('/post_checkout',[PageController::class,'postcheckout']);
Route::get('/orders/{id}',[OrderController::class,'show']);
Route::get('/discount',function(){
    return redirect('/cars');
});
Route::post('/discount',[OrderController::class,'discount']);

// Footer Routes
Route::get('/careers', function () {
    return view('careers');
})->name('careers');

Route::get('/faqs', function () {
    return view('faqs');
})->name('faqs');

Route::get('/import', function () {
    return view('import');
})->name('import');

Route::get('transportation', function () {
    return view('transportation');
})->name('transportation');

Route::get('/repair', function () {
    return view('repair');
})->name('repair');

// Policy & Return Links
Route::get('/returns', function () {
    return view('returns');
})->name('returns');

Route::get('/security', function () {
    return view('security');
})->name('security');

Route::get('/terms', function () {
    return view('terms');
})->name('terms');