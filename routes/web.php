<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CounterUpController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Herosection;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Order;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\PasswordResetController;

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

Route::get('/off', function () {
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
Route::post('/profiles/image/update',[HomeController::class,'profile_image_update'])->name('image.update');
// hero section route start
Route::get('/herosection',[Herosection::class,'herosection'])->name('herosection');
Route::post('/heropost',[Herosection::class,'herosection_post'])->name('herosection.post');
Route::get('/hero/edit/{id}',[Herosection::class,'heroedit'])->name('heroedit.edit');
Route::post('/hero/edit/store/{id}',[Herosection::class,'heroedit_store'])->name('heroedit.edit.store');
Route::get('/hero/edit/remove/{id}',[Herosection::class,'heroedit_remove'])->name('heroedit.remove');
Route::get('/counter/up',[CounterUpController::class,'counterup'])->name('counterup');
Route::post('/counter/up/store',[CounterUpController::class,'counterup_store'])->name('counterup.store');
Route::get('/counter/edit/{id}',[CounterUpController::class,'counterup_edit'])->name('counter.edit');
Route::get('/counter/remove/{id}',[CounterUpController::class,'counterup_remove'])->name('counter.remove');
Route::post('/counter/up/edit/{id}',[CounterUpController::class,'counterup_edit_store'])->name('counterup.edit.store');
Route::get('/user/list',[UserController::class,'user_list'])->name('user.list');
Route::get('/user/remove/{id}',[UserController::class,'user_remove'])->name('user.remove');
Route::get('/category',[CategoryController::class,'category'])->name('category');
Route::post('/category',[CategoryController::class,'category_store'])->name('category.store');
Route::get('/category/update/{id}',[CategoryController::class,'category_update'])->name('category.update');
Route::post('/category/category_update',[CategoryController::class,'category_update_store'])->name('category_update.store');

Route::get('/subcategory',[SubcategoryController::class,'subcategory'])->name('subcategory');
Route::post('/subcategory/store',[SubcategoryController::class,'subcategory_store'])->name('subcategory.store');
Route::get('/subcategory/remove/{id}',[SubcategoryController::class,'sub_remove'])->name('sub.remove');
Route::get('/subcategory/edite/{id}',[SubcategoryController::class,'sub_edit'])->name('sub.edit');
Route::post('/subcategorry/edit/so',[SubcategoryController::class,'sub_edit_store'])->name('subcategory_edit.store');
Route::get('brand',[BrandController::class,'brand'])->name('brand');
Route::post('brand/store',[BrandController::class,'brand_store'])->name('brand.store');
Route::get('product',[ProductController::class,'product'])->name('product');
Route::post('/getsubcategory',[ProductController::class,'getsubcategory']);
Route::post('/product/store',[ProductController::class,'product_store'])->name('product.store');
Route::get('/product/list',[ProductController::class,'product_list'])->name('product.list');
Route::get('/product/show/{id}',[ProductController::class,'product_show'])->name('product.show');
Route::get('/valiation',[InventoryController::class,'variation'])->name('variation');
Route::post('/valiation/post',[InventoryController::class,'variation_post'])->name('variation.post');
Route::get('/valiation/remove/{id}',[InventoryController::class,'variation_remove'])->name('variation.remove');
Route::post('/valiation',[InventoryController::class,'size_post'])->name('size.post');
Route::get('/inventory/{id}',[InventoryController::class,'inventory_view'])->name('inventory');
Route::post('/inventory/{id}',[InventoryController::class,'inventory_store'])->name('inventory.store');
Route::get('/',[FrontendController::class,'index'])->name('index');
// Route::post('/changeStatus',[ProductController::class,'changestatus']);
Route::post('/onOff',[ProductController::class,'onOff']);
Route::get('/category_product/product/{id}',[FrontendController::class,'category_product'])->name('category.product');
Route::get('/category_products/product/{id}',[FrontendController::class,'category_products'])->name('categorys.product');
Route::get('/product/details/{slug}',[FrontendController::class,'product_details'])->name('product_details');
Route::get('/customer/auth',[CustomerAuthController::class,'customer_register'])->name('customer.register');
Route::get('/customer/auth/login',[CustomerAuthController::class,'customer_login'])->name('customer.login');
Route::post('/customer/auth/store',[CustomerAuthController::class,'customer_store'])->name('customer.store');
Route::post('/customer/login/store',[CustomerAuthController::class,'customer_login_store'])->name('customer_login.store');
Route::get('/customer/profile',[CustomerAuthController::class,'customer_profile'])->name('customer.profile');
Route::get('/customer/logout',[CustomerAuthController::class,'customer_logout'])->name('customer.logout');
Route::post('/customer/profile/update',[CustomerAuthController::class,'customer_update'])->name('customer.update');
Route::post('/card/store',[CartController::class,'cart_store'])->name('cart.store');
Route::get('/cart',[CartController::class,'cart'])->name('cart');
Route::post('/cart_update',[CartController::class,'cart_update'])->name('cart.update');
Route::get('/coupon',[CouponController::class,'coupon'])->name('coupon');
Route::post('/coupon/store',[CouponController::class,'coupon_store'])->name('coupon.store');
Route::post('/ChangeCoupon',[CouponController::class,'ChangeCoupon']);
Route::get('/checkout',[CheckoutController::class,'checkout'])->name('checkout');
Route::post('/getsCity',[CheckoutController::class,'getsCity']);
Route::post('/order/store',[CheckoutController::class,'order_store'])->name('order.store');
Route::get('/order/success',[CheckoutController::class,'order_success'])->name('order.success');
Route::get('/order',[CustomerController::class,'Customer_order'])->name('customer.order');
Route::get('/invoice/download/{id}',[CustomerController::class,'invoice_download'])->name('invoice.download');
Route::get('/orders',[OrderController::class,'orders'])->name('orders');
Route::post('/orders',[OrderController::class,'order_status'])->name('order.active');
// SSLCOMMERZ Start


Route::get('/pay', [SslCommerzPaymentController::class, 'index'])->name('pay');
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END

Route::controller(StripePaymentController::class)->group(function(){
    Route::get('stripe', 'stripe')->name('stripe');
    Route::post('stripe', 'stripePost')->name('stripe.post');
});
Route::post('/review/store',[FrontendController::class,'review_store'])->name('review.store');
Route::get('/password_reset',[PasswordResetController::class,'password_reset_controller'])->name('password.resets');
Route::post('/password_reset/post',[PasswordResetController::class,'password_reset_controller_post'])->name('password.resets.post');
Route::get('/password_reset/form/{token}',[PasswordResetController::class,'password_reset_form'])->name('password.resets.form');
Route::post('/password_reset_confirm/form/{token}',[PasswordResetController::class,'password_reset_confirm'])->name('password.resets.confirm');
Route::get('/shop',[FrontendController::class,'shop'])->name('shop');




require __DIR__.'/auth.php';
