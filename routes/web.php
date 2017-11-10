<?php

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

/*Front part route*/
Route::get('/','WelcomeController@index');
Route::get('/product-category/{id}','WelcomeController@productCategory');
Route::get('/product-details/{id}','WelcomeController@productDetails');

/*cart*/

Route::post('/add-to-cart','CartController@addToCart');
Route::get('/show-cart','CartController@showCart');
Route::post('/update-cart-product','CartController@updateCart');
Route::get('/remove-cart-item/{id}','CartController@removeCartItem');

//checkout

Route::get('/checkout','CheckoutController@index');
Route::post('/customer-registration','CheckoutController@saveCustomerInfo');
Route::get('/shipping-info','CheckoutController@shippingInfo');
Route::get('/customer-logout','CheckoutController@customerLogout');
Route::post('/customer-login','CheckoutController@customerLogin');
Route::post('/new-shipping','CheckoutController@saveShippingInfo');
Route::get('/payment-info','CheckoutController@showPaymentForm');
Route::post('/new-order','CheckoutController@saveOrderInfo');




/*Admin part route*/
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
/* Category Route part*/
Route::get('/category/add-category','CategoryController@showCategoryForm');
Route::post('/category/new-category','CategoryController@saveCategoryInfo');
Route::get('/category/manage-category','CategoryController@showCategoryManageTable');
Route::get('/category/unpublished-category/{id}','CategoryController@unpublishedCategoryInfo');
Route::get('/category/published-category/{id}','CategoryController@publishedCategoryInfo');
Route::get('/category/delete-category/{id}','CategoryController@deleteCategoryInfo');
Route::get('/category/edit-category/{id}','CategoryController@showEditForm');
Route::post('/category/update-category','CategoryController@updateCategoryInfo');
/* End Category Route part*/

/* start Brand route part*/
Route::get('/brand/add-brand','BrandController@showBrandForm');
Route::post('/brand/new-brand','BrandController@saveBrandInfo');
Route::get('/brand/manage-brand','BrandController@showBrandManageTable');
Route::get('/brand/unpublished-brand/{id}','BrandController@unpublishedBrandInfo');
Route::get('/brand/published-brand/{id}','BrandController@publishedBrandInfo');
Route::get('/brand/delete-brand/{id}','BrandController@deleteBrandInfo');
Route::get('/brand/edit-brand/{id}','BrandController@editBrandInfo');
Route::post('/brand/update-brand','BrandController@updateBrandInfo');
/* end Brand route part*/

/* start Product route part*/
Route::get('/product/add-product','ProductController@showProductForm');
Route::post('/product/new-product','ProductController@saveProductInfo');
Route::get('/product/manage-product','ProductController@showProductManageTable');
Route::get('/product/unpublished-product/{id}','ProductController@unpublishedProductInfo');
Route::get('/product/published-product/{id}','ProductController@publishedProductInfo');
Route::get('/product/delete-product/{id}','ProductController@deleteProductInfo');
Route::get('/product/edit-product/{id}','ProductController@editProductInfo');
Route::post('/product/update-product','ProductController@updateProductInfo');

/* end Product route part*/

/* start Order route part*/
Route::get('/order/manage-order','OrderController@showOrderManageTable');
Route::get('/order/view-order/{id}','OrderController@viewOrderDetails');
Route::get('/order/edit-order/{id}','OrderController@editOrder');

/* end Order route part*/



