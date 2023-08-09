<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\frontend\AuthController as UserAuthController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PolicyController;
use App\Http\Controllers\admin\ReportController;
use App\Http\Controllers\Admin\AboutusController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\frontend\OrderController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\frontend\AddToCartController;
use App\Http\Controllers\Admin\TermConditionController;
use App\Http\Controllers\Admin\UpcomingProductController;
use App\Http\Controllers\frontend\ProductDetailController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
Route::get('/', function () {
    return redirect()->route('index');
});

/*
Admin routes
 * */
Route::get('/admin', [AuthController::class, 'getLoginPage']);
Route::post('admin/login', [AuthController::class, 'Login']);
Route::get('/admin-forgot-password', [AdminController::class, 'forgetPassword']);
Route::post('/admin-reset-password-link', [AdminController::class, 'adminResetPasswordLink']);
Route::get('/change_password/{id}', [AdminController::class, 'change_password']);
Route::post('/admin-reset-password', [AdminController::class, 'ResetPassword']);

Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('dashboard', [AdminController::class, 'getdashboard']);
    Route::get('profile', [AdminController::class, 'getProfile']);
    Route::post('update-profile', [AdminController::class, 'update_profile']);
    Route::get('logout', [AdminController::class, 'logout']);

    //home controller


    /** resource controller */
    Route::resource('user', UserController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('subCategory', SubCategoryController::class);
    Route::resource('product', ProductController::class);
    Route::resource('upComingProduct', UpcomingProductController::class);
    Route::get('/get-subcategories/{id}', [ProductController::class, 'getSubCategories']);
    Route::get('getOrder', [AdminOrderController::class, 'index'])->name('getOrder');
    Route::get('orderStatus/{id}', [AdminOrderController::class, 'status'])->name('orderStatus');
    Route::get('orderProduct', [AdminOrderController::class, 'show'])->name('orderProduct');
    Route::get('reports', [ReportController::class, 'getReports'])->name('reports');
    // Route::resource('about', AboutusController::class);
    // Route::resource('policy', PolicyController::class);
    // Route::resource('terms', TermConditionController::class);
    // Route::resource('faq', FaqController::class);

});
Route::get('login',[UserAuthController::class,'index'])->name('login');
Route::get('registerForm',[UserAuthController::class,'registerForm'])->name('registerForm');
Route::post('register',[UserAuthController::class,'register'])->name('register');
Route::post('userLogin',[UserAuthController::class,'login'])->name('userLogin');

Route::get('about', [HomeController::class, 'about']);
Route::get('addToWishlist', [HomeController::class, 'addToWishlist']);
Route::get('checkout', [HomeController::class, 'checkout'])->name('checkout');
Route::get('cart', [HomeController::class, 'cart']);
Route::get('contact', [HomeController::class, 'contact']);
Route::get('index', [HomeController::class, 'index'])->name('index');
Route::get('allProduct', [HomeController::class, 'getallProduct'])->name('allProduct');
Route::get('upComingProduct', [HomeController::class, 'upComingProduct'])->name('upComingProduct');
Route::get('men', [HomeController::class, 'men']);
Route::get('order', [HomeController::class, 'order'])->name('order');
// Route::get('productDetail',[HomeController::class ,'productDetail']);
Route::get('women', [HomeController::class, 'women']);
Route::get('/product/{id}', [HomeController::class, 'showProduct'])->name('product.show');
Route::get('kids', [HomeController::class, 'kids']);
Route::get('Product/{id}', [ProductDetailController::class, 'getproductDetail'])->name('product');
Route::post('varient', [ProductDetailController::class, 'getVarient'])->name('varient');
// Route::post('addToCart/{id}',[AddToCartController::class ,'addToCart'])->name('addToCart');
// Route::get('add-to-cart', [AddToCartController::class, 'addToCart'])->name('add-to-cart');
Route::get('add-to-carts', [AddToCartController::class, 'addToCarts']);
Route::get('add-to-cart-remove', [AddToCartController::class, 'remove']);
Route::post('order', [OrderController::class, 'store'])->name('order');
// Route::get('getOrder', [AdminOrderController::class, 'index'])->name('order');

Route::group(['prefix' => 'user', 'middleware' => 'user', 'as' => 'user.'], function () {
    Route::get('add-to-cart', [AddToCartController::class, 'addToCart'])->name('add-to-cart');
    Route::get('logout',[UserAuthController::class,'logout'])->name('logout');
});
