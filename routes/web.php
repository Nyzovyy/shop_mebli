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


Route::get('/', function () {
    return view('layouts.app');
});
Route::get('language/{locale}', 'LangController@change');

Route::get('/ban', 'BanController@authorizeBan');

Auth::routes();
Route::get('/logout', function () {

    Auth::logout();
    return redirect('/');
});

Route::get('/password/recover/{token}', 'Auth\AjaxauthController@passwordRecover');
Route::post('/password/recover/{token}', 'Auth\AjaxauthController@passwordRecoverPost');

Route::group(['prefix' => 'authajax' ,'middleware' => 'guest'], function()
{
    Route::post('/login', 'Auth\AjaxauthController@showLoginForm');
    Route::post('/login/post', 'Auth\AjaxauthController@LoginFormPost');
    Route::post('/register', 'Auth\AjaxauthController@RegisterForm');
    Route::post('/register/post', 'Auth\AjaxauthController@RegisterFormPost');
    Route::post('/forgetpassword', 'Auth\AjaxauthController@ForgetForm');
    Route::post('/forgetpassword/post', 'Auth\AjaxauthController@ForgetFormPost');
    Route::get('/password/recover/{token}', 'Auth\AjaxauthController@passwordRecover');
});
Route::group(['middleware' => 'banned'], function() {

    Route::get('/', 'AppController@index');
    Route::get('/contact', 'Admin\ContactController@contact');
    //    Корзина
    Route::get('/add-to-cart/{id}/{photo}', 'CartController@getAddToCart');
    Route::get('/reduce/{id}', [
        'uses' => 'CartController@getReduceByOne',
        'as' => 'cart.reduceByOne'
    ]);
    Route::get('/cart', 'CartController@getCart');
    Route::get('/checkout', 'CartController@getCheckout');
    Route::post('/checkout', 'CartController@postCheckout');
    Route::get('/cart-delete/{id}', 'CartController@postDeleteItems');

    Route::post('/cart/set-quantity/{id}', 'CartController@setquantity');

    Route::get('/news', 'NewsController@index');
    Route::get('/news/{name}', 'NewsController@view');
    
    Route::get('/interior', 'InteriorController@index');
    Route::get('/interior/{name}', 'InteriorController@view');
    Route::get('/about_us', 'Admin\AboutusController@view');
    Route::post('/get/colors', 'Admin\Catalog\GoodsCropController@returnArray');
});


//    Account
Route::group(['middleware' => ['auth', 'banned']], function() {
    Route::get('/cart/buy', 'CartController@buy');
    Route::get('/customer', 'AccountController@getCustomer');
    Route::get('/customer/addresses', 'AccountController@getAddresses');
    Route::get('/customer/orders', 'AccountController@getOrders');
    Route::post('/customer/change-password', 'Auth\UpdatePasswordController@change');
    Route::post('/customer/change-email', 'Account\UpdateEmailController@change');
    Route::post('/customer/change-invoice-data', 'Account\UserDataController@changeInvoiceData');
    Route::post('/customer/change-user-account-data', 'Account\UserDataController@changeUserAccountData');
});
//    Catalog
Route::get('/category', 'CatalogController@getCategory');
Route::get('/subcategory/{id}', 'CatalogController@getCollection');

Route::group(['prefix' => 'admin_panel',  'middleware' => 'auth'], function()
{
    Route::get('/', 'Admin\AdminController@index');
    Route::get('/catalog', 'Admin\Catalog\CategoryController@category');
    Route::get('/category/create/{id}', 'Admin\Catalog\CategoryController@create');
    Route::post('/category/create/{id}', 'Admin\Catalog\CategoryController@createPost');
    
    Route::get('/catalog/{id}', 'Admin\Catalog\CategoryController@subcategory');
    Route::get('/catalog/{id}/goods/create', 'Admin\Catalog\GoodsController@create');
    Route::post('/catalog/{id}/goods/create', 'Admin\Catalog\GoodsController@createPost');
    Route::get('/catalog/{id}/status', 'Admin\Catalog\CategoryController@status');
    Route::get('/catalog/goods/{id}/update', 'Admin\Catalog\GoodsController@update');
    Route::post('/catalog/goods/{id}/update', 'Admin\Catalog\GoodsController@updatePost');
    Route::post('/catalog/modal/remove/{id}', 'Admin\Catalog\CategoryController@modalRemove');
    Route::get('/catalog/goods/{id}/delete', 'Admin\Catalog\GoodsController@delete');
    Route::get('/catalog/category/create/{id}', 'Admin\Catalog\CategoryController@create');
    Route::post('/catalog/category/create/{id}', 'Admin\Catalog\CategoryController@createPost');
    Route::get('/catalog/{id}/update', 'Admin\Catalog\CategoryController@update');
    Route::post('/catalog/{id}/update', 'Admin\Catalog\CategoryController@updatePost');
    Route::get('/catalog/{id}/delete', 'Admin\Catalog\CategoryController@delete');
    Route::get('/catalog/goods/remove/img/{id}/{file}', 'Admin\Catalog\GoodsController@deleteImg');
    Route::get('/catalog/goods/img/{id}/{photo}/setup', 'Admin\Catalog\GoodsController@setupImg');
    Route::get('/catalog/goods/img/{id}/{photo}/setupalbumcover', 'Admin\Catalog\GoodsController@setupImgAlbumCover');

    Route::get('/catalog/goods/crop/{id}/img/{file}', 'Admin\Catalog\GoodsCropController@index');
    Route::post('/catalog/goods/crop/{id}', 'Admin\Catalog\GoodsCropController@Save');
    Route::get('/catalog/goods/crop/{id}/edit', 'Admin\Catalog\GoodsCropController@edit');
    Route::post('/catalog/goods/crop/edit/save', 'Admin\Catalog\GoodsCropController@editPost');
    Route::get('/catalog/goods/crop/{id}/delete', 'Admin\Catalog\GoodsCropController@delete');

    /////colors
    Route::get('/catalog/goods/color/{id}/upload', 'Admin\Catalog\GoodsCropController@modalColor');
    Route::post('/catalog/goods/color/{id}/upload', 'Admin\Catalog\GoodsCropController@modalColorPost');
    Route::get('/catalog/goods/color/photo/{id}/upload', 'Admin\Catalog\GoodsCropController@modalColorPhoto');
    Route::post('/catalog/goods/color/photo/{id}/upload', 'Admin\Catalog\GoodsCropController@modalColorPostPhoto');
    Route::get('/catalog/goods/color/{id}/create/category', 'Admin\Catalog\GoodsCropController@modalColorNewCategory');
    Route::post('/catalog/goods/color/{id}/create/category', 'Admin\Catalog\GoodsCropController@modalColorNewCategoryPost');
    Route::get('/catalog/goods/color/{id}/category/delete', 'Admin\Catalog\GoodsCropController@deleteCategory');
    Route::get('/catalog/goods/color/{id}/category/edit', 'Admin\Catalog\GoodsCropController@modalCategoryEdit');
    Route::post('/catalog/goods/color/{id}/category/edit', 'Admin\Catalog\GoodsCropController@modalCategoryEditPost');
    Route::get('/catalog/goods/{id}/color/photos', 'Admin\Catalog\GoodsColorPhotoController@index');
    Route::get('/catalog/goods/{id}/color/photos/edit', 'Admin\Catalog\GoodsColorPhotoController@edit');
    Route::post('/catalog/goods/{id}/color/photos', 'Admin\Catalog\GoodsColorPhotoController@update');
    Route::get('/catalog/colors/photo/{id}', 'Admin\Catalog\GoodsColorPhotoController@delete');
    //////contact
    Route::get('/contact-update', 'Admin\ContactController@updateGet');
    Route::post('/contact-update', 'Admin\ContactController@updatePost');
    //User
    Route::get('/users', 'Admin\AdminController@users');
    Route::get('/user-delete', 'Admin\AdminController@delete');
    Route::get('/{id}/user-status', 'Admin\AdminController@status');
    Route::get('/user-profile/{id}', 'Admin\AdminController@profile');

    Route::group(['prefix' => 'parser'], function()
    {
        Route::get('/index', 'Admin\Parser\ParserController@index');
        Route::get('/category', 'Admin\Parser\ParserController@category');
        Route::get('/category/test/{get}', 'Admin\Parser\ParserController@testcategory');
        Route::get('/category/product/{get}', 'Admin\Parser\ParserController@product');
        //Route::get('/category/product/view/{get}', 'Admin\Parser\ParserController@productView');
        //  Route::post('/ajax/get/product/{product}', 'Admin\Parser\ParserController@productView');
        Route::post('/ajax/get/product/ru/{product}', 'Admin\Parser\ProductController@index');
        Route::post('/product/create', 'Admin\Parser\ParserController@savePost');
    });

    Route::group(['prefix' => 'news'], function()
    {
        Route::get('', 'Admin\NewsController@index');
        Route::get('/create', 'Admin\NewsController@create');
        Route::post('/create', 'Admin\NewsController@createPost');
        Route::get('/edit/{id}', 'Admin\NewsController@edit');
        Route::post('/edit/{id}', 'Admin\NewsController@updatePost');
        Route::get('/remove/img/{id}/{file}', 'Admin\NewsController@deleteImg');
        Route::get('/delete/{id}', 'Admin\NewsController@delete');
    });

    Route::group(['prefix' => 'interior'], function()
    {
        Route::get('', 'Admin\InteriorsController@index');
        Route::get('/create', 'Admin\InteriorsController@create');
        Route::post('/create', 'Admin\InteriorsController@createPost');
        Route::get('/edit/{id}', 'Admin\InteriorsController@edit');
        Route::post('/edit/{id}', 'Admin\InteriorsController@updatePost');
        Route::get('/remove/img/{id}/{file}', 'Admin\InteriorsController@deleteImg');
        Route::get('/delete/{id}', 'Admin\InteriorsController@delete');
    });

    Route::group(['prefix' => 'collection'], function()
    {
        Route::get('', 'Admin\CollectionsCategoryController@index');
        Route::get('/category/create', 'Admin\CollectionsCategoryController@create');
        Route::post('/category/create', 'Admin\CollectionsCategoryController@createPost');
        Route::get('/category/{id}/update', 'Admin\CollectionsCategoryController@edit');
        Route::post('/category/{id}/update', 'Admin\CollectionsCategoryController@editPost');
        Route::get('/category/{id}/delete', 'Admin\CollectionsCategoryController@delete');
        
        Route::get('/category/{id}', 'Admin\CollectionsController@index');

        Route::get('/create/{id}', 'Admin\CollectionsController@create');
        Route::post('/create/{id}', 'Admin\CollectionsController@createPost');
        
        Route::get('/edit/{id}', 'Admin\CollectionsController@edit');
        Route::post('/edit/{id}', 'Admin\CollectionsController@updatePost');
        Route::post('/addslider', 'Admin\CollectionsController@addslider');
        Route::get('/remove/{id}', 'Admin\CollectionsController@remove');
        //Route::post('/slider/photo/add', 'Admin\CollectionsController@addslider');

        Route::get('/slider/{id}', 'Admin\CollectionSliderController@index');
        Route::post('/slider/{id}/upload', 'Admin\CollectionSliderController@uploadPhotos');
        Route::post('/slider/section/{id}/update', 'Admin\CollectionSliderController@update');
        Route::get('/slider/{id}/delete/{delete}', 'Admin\CollectionSliderController@delete');
        Route::post('/slider/deleteall/{id}', 'Admin\CollectionSliderController@deleteall');

        Route::get('/slider/{id}/add', 'Admin\CollectionSliderController@add');
        Route::get('/slider/{id}/edit', 'Admin\CollectionSliderController@edit');
        Route::post('/slider/{id}/edit', 'Admin\CollectionSliderController@editSave');

    });
    Route::group(['prefix' => 'order'], function()
    {
        Route::get('', 'Admin\OrderController@index');
        Route::get('/view/{id}', 'Admin\OrderController@view');
        Route::get('/change/status/{id}/{status}', 'Admin\OrderController@status');
    });
    Route::group(['prefix' => 'about_us'], function()
    {
        Route::get('', 'Admin\AboutusController@index');
        Route::post('', 'Admin\AboutusController@post');
        

    });
});

Route::match(['get' , 'post'] , '/{name}', 'UrlController@index');

