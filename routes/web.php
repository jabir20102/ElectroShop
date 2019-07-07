<?php



Auth::routes();
// welcome route
Route::get('/', 'MyController@index')->name('welcome');
//  view individual product
Route::get('/view/{id}', 'MyController@view')->name('view');
Route::get('/remove/{id}','MyController@removeProduct')->name('removeProduct');
Route::post('/view/review','MyController@review')->name('store.review');
Route::post('/shopping_cart/add','MyController@addToCart')->name('shopping_cart.add');
Route::get('/shopping_cart/load','MyController@load')->name('shopping_cart.load');
Route::get('/shopping_cart/remove/{id}', 'MyController@remove')->name('shopping_cart.remove');
Route::post('/shopping_cart/setOffer', 'MyController@setOffer')->name('shopping_cart.setOffer');
Route::post('/shopping_cart/removeOffer', 'MyController@removeOffer')->name('shopping_cart.removeOffer');
Route::get('/store/{category}', 'MyController@mystore')->name('mystore');

Route::get('/home', 'HomeController@index')->name('home.index');
Route::get('/home/addProduct','HomeController@create')->name('home.addProduct');
// //  upload image
Route::post('/home/uploadfile','HomeController@upload');

Route::post('/home/store','HomeController@store')->name('home.store');
Route::resource('/home', 'HomeController');
// Route::resource('/', 'MyController');

//  routes for wishlist
Route::get('/show/viewWishlist','MyController@viewWishlist')->name('show.viewWishlist');
Route::get('/view/addToWishlist/{id}','MyController@addToWishlist')->name('view.addToWishlist');
Route::get('/view/removeFromWishlist/{id}','MyController@removeFromWishlist')->name('view.removeFromWishlist');

//  search 
Route::post('/store/search', 'MyController@search')->name('store.search');

//  sort products
Route::get('/sorted/products','MyController@sortProducts')->name('sorted.products');
//  checkout route
Route::get('/checkout', 'MyController@checkout')->name('checkout');
Route::post('/placeOrder', 'MyController@placeOrder')->name('placeOrder');
// sbscribe
Route::post('/subscribe', 'MyController@subscribe')->name('subscribe');
// cart
Route::get('/cart', 'MyController@cart')->name('cart');


