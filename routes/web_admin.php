<?php

use App\Http\Controllers\Admin\AreaController;
use App\Http\Controllers\Admin\PaymentGateway\ProcessPaymentController;
use App\Http\Controllers\Admin\Places\CityController;
use App\Http\Controllers\Admin\Places\CountryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleLoginController;
use App\Http\Controllers\TwitterController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
//        Route::get('admin/login', function () {
//            return view('admin.auth.login');
//        });



        Route::middleware('auth:web')->prefix('admin')->group(function () {

            Route::get('/', function () {
                return redirect(route('countries.index'));
            })->name('admin.index');

            Route::controller(CountryController::class)->prefix('countries')->name('countries.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/store', 'store')->name('store');
                Route::post('/update', 'update')->name('update');
                Route::delete('/{uuid}', 'destroy')->name('delete');
                Route::get('/indexTable', 'indexTable')->name('indexTable');
                Route::put('/updateStatus/{status}/{uuid}', 'updateStatus')->name('updateStatus');
            });
            Route::controller(\App\Http\Controllers\Admin\Delivery\DeliveryController::class)->prefix('deliveries')->name('deliveries.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/store', 'store')->name('store');
                Route::post('/update', 'update')->name('update');
                Route::delete('/{uuid}', 'destroy')->name('delete');
                Route::get('/indexTable', 'indexTable')->name('indexTable');
                Route::put('/updateStatus/{status}/{uuid}', 'updateStatus')->name('updateStatus');

            });
            Route::controller(CityController::class)->prefix('cities')->name('cities.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/store', 'store')->name('store');
                Route::post('/update', 'update')->name('update');
                Route::delete('/{uuid}', 'destroy')->name('delete');
                Route::get('/indexTable', 'indexTable')->name('indexTable');
                Route::put('/updateStatus/{status}/{uuid}', 'updateStatus')->name('updateStatus');
            });

            Route::controller(AreaController::class)->prefix('areas')->name('areas.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/store', 'store')->name('store');
                Route::post('/update', 'update')->name('update');
                Route::delete('/{uuid}', 'destroy')->name('delete');
                Route::get('/indexTable', 'indexTable')->name('indexTable');
                Route::put('/updateStatus/{status}/{uuid}', 'updateStatus')->name('updateStatus');
            });
            Route::controller(\App\Http\Controllers\Admin\Money\MoneyController::class)->prefix('money')->name('money.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/store', 'store')->name('store');
                Route::post('/update', 'update')->name('update');
                Route::delete('/{uuid}', 'destroy')->name('delete');
                Route::get('/indexTable', 'indexTable')->name('indexTable');
                Route::put('/updateStatus/{status}/{uuid}', 'updateStatus')->name('updateStatus');
            });
            Route::controller(\App\Http\Controllers\Admin\AlhayController::class)->prefix('alhaies')->name('alhaies.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/store', 'store')->name('store');
                Route::post('/update', 'update')->name('update');
                Route::delete('/{uuid}', 'destroy')->name('delete');
                Route::get('/indexTable', 'indexTable')->name('indexTable');
                Route::put('/updateStatus/{status}/{uuid}', 'updateStatus')->name('updateStatus');
            });
//            Route::controller(\App\Http\Controllers\Admin\MainController::class)->prefix('main')->name('main.')->group(function () {
                Route::get('/main', [\App\Http\Controllers\Admin\MainController::class,'index'])->name('main.index');

//            });
            // Route::controller(\App\Http\Controllers\Admin\Service\ServiceController::class)->name('services.')->prefix('services')->group(function () {
            //     Route::get('/', 'index')->name('index');
            //     Route::post('/store', 'store')->name('store');
            //     Route::post('/update', 'update')->name('update');
            //     Route::delete('/{id}', 'destroy')->name('delete');
            //     Route::get('/indexTable', 'indexTable')->name('indexTable');
            //     Route::put('/updateStatus/{status}/{uuid}', 'updateStatus')->name('updateStatus');

            // });
            // Route::controller(\App\Http\Controllers\Admin\Notifications\NotificationController::class)->name('notifications.')->prefix('notifications')->group(function () {
            //     Route::get('/', 'index')->name('index');
            //     Route::post('/store', 'store')->name('store');
            //     Route::delete('/{id}', 'destroy')->name('delete');
            //     Route::get('/indexTable', 'indexTable')->name('indexTable');
            //     Route::get('notifications','seeAll')->name('seeAll');

            // });
            Route::controller(\App\Http\Controllers\Admin\Market\MarketController::class)->name('market.')->prefix('market')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/store', 'store')->name('store');
                Route::post('/update', 'update')->name('update');
                Route::delete('/{id}', 'destroy')->name('delete');
                Route::get('/indexTable', 'indexTable')->name('indexTable');
                Route::put('/updateStatus/{status}/{uuid}', 'updateStatus')->name('updateStatus');

            });

            Route::controller(\App\Http\Controllers\Admin\PlaceProduct\PlaceProductController::class)->name('place.')->prefix('place')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/store', 'store')->name('store');
                Route::post('/update', 'update')->name('update');
                Route::delete('/{id}', 'destroy')->name('delete');
                Route::get('/indexTable', 'indexTable')->name('indexTable');
                Route::put('/updateStatus/{status}/{uuid}', 'updateStatus')->name('updateStatus');

            });
            Route::controller(\App\Http\Controllers\Admin\TypeProduct\TypeProductController::class)->name('type.')->prefix('type')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/store', 'store')->name('store');
                Route::post('/update', 'update')->name('update');
                Route::delete('/{id}', 'destroy')->name('delete');
                Route::get('/indexTable', 'indexTable')->name('indexTable');
                Route::put('/updateStatus/{status}/{uuid}', 'updateStatus')->name('updateStatus');

            });

            // Route::controller(\App\Http\Controllers\Admin\Specialization\SpecializationController::class)->name('specializations.')->prefix('specializations')->group(function () {
            //     Route::get('/', 'index')->name('index');
            //     Route::post('/store', 'store')->name('store');
            //     Route::post('/update', 'update')->name('update');
            //     Route::delete('/{id}', 'destroy')->name('delete');
            //     Route::get('/indexTable', 'indexTable')->name('indexTable');
            //     Route::put('/updateStatus/{status}/{uuid}', 'updateStatus')->name('updateStatus');

            // });

            Route::controller(\App\Http\Controllers\Admin\Product\ProductController::class)->name('products.')->prefix('products')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/store', 'store')->name('store');
                Route::post('/update', 'update')->name('update');
                Route::delete('/{id}', 'destroy')->name('delete');
                Route::get('/indexTable', 'indexTable')->name('indexTable');
                Route::put('/updateStatus/{status}/{uuid}', 'updateStatus')->name('updateStatus');
                Route::delete('/{uuid}', 'destroy')->name('delete');
                Route::get('/category/{uuid}', 'category')->name('category');

            });
            Route::controller(\App\Http\Controllers\Admin\Storehouse\StorehouseController::class)->name('stores.')->prefix('stores')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/store', 'store')->name('store');
                Route::post('/update', 'update')->name('update');
                Route::delete('/{id}', 'destroy')->name('delete');
                Route::get('/indexTable', 'indexTable')->name('indexTable');
                Route::put('/updateStatus/{status}/{uuid}', 'updateStatus')->name('updateStatus');
                Route::delete('/{uuid}', 'destroy')->name('delete');
                Route::get('/area/{uuid}', 'area')->name('area');
                Route::get('/alhayi/{uuid}', 'alhayi')->name('alhayi');


            });
            Route::controller(\App\Http\Controllers\Admin\Setting\SettingController::class)->prefix('settings')->name('settings.')->group(function () {
                Route::get('/policies_privacy', [\App\Http\Controllers\Admin\Setting\SettingController::class, 'policies_privacy'])->name('policies_privacy');
                Route::post('/policies_privacy', [\App\Http\Controllers\Admin\Setting\SettingController::class, 'policies_privacy_post'])->name('policies_privacy');
                Route::get('/about_application', [\App\Http\Controllers\Admin\Setting\SettingController::class, 'about_application'])->name('about_application');
                Route::post('/about_application', [\App\Http\Controllers\Admin\Setting\SettingController::class, 'about_application_post'])->name('about_application');
                Route::get('/terms_conditions', [\App\Http\Controllers\Admin\Setting\SettingController::class, 'terms_conditions'])->name('terms_conditions');
                Route::post('/terms_conditions', [\App\Http\Controllers\Admin\Setting\SettingController::class, 'terms_conditions_post'])->name('terms_conditions');
                Route::get('/delete_my_account', [\App\Http\Controllers\Admin\Setting\SettingController::class, 'delete_my_account'])->name('delete_my_account');
                Route::post('/delete_my_account', [\App\Http\Controllers\Admin\Setting\SettingController::class, 'delete_my_account_post'])->name('delete_my_account');

                Route::get('/pledge', [\App\Http\Controllers\Admin\Setting\SettingController::class, 'pledge'])->name('pledge');
                Route::post('/pledge', [\App\Http\Controllers\Admin\Setting\SettingController::class, 'pledge_post'])->name('pledge_post');
                Route::post('/', [\App\Http\Controllers\Admin\Setting\SettingController::class, 'post'])->name('index');
                Route::get('/', [\App\Http\Controllers\Admin\Setting\SettingController::class, 'index'])->name('index');

            });
//             Route::controller(\App\Http\Controllers\Admin\Discount\DiscountController::class)->name('discount.')->prefix('discount')->group(function () {
//                 Route::get('/', 'index')->name('index');
//                 Route::post('/store', 'store')->name('store');
//                 Route::post('/update', 'update')->name('update');
//                 Route::delete('/{id}', 'destroy')->name('delete');
//                 Route::get('/indexTable', 'indexTable')->name('indexTable');
//                 Route::put('/updateStatus/{status}/{uuid}', 'updateStatus')->name('updateStatus');
//                 Route::get('/indexTable', 'indexTable')->name('indexTable');

//             });
//             Route::controller(\App\Http\Controllers\Admin\Package\PackageController::class)->name('packages.')->prefix('packages')->group(function () {
//                 Route::get('/', 'index')->name('index');
// //                Route::post('/store', 'store')->name('store');
//                 Route::post('/update', 'update')->name('update');
//                 Route::get('/indexTable', 'indexTable')->name('indexTable');
//                 Route::put('/updateStatus/{status}/{uuid}', 'updateStatus')->name('updateStatus');
//                 Route::get('/indexTable', 'indexTable')->name('indexTable');
//             });
//             Route::controller(\App\Http\Controllers\Admin\Discount\MultiDayDiscountController::class)->name('multidaydiscount.')->prefix('multidaydiscount')->group(function () {
//                 Route::get('/', 'index')->name('index');
//                 Route::post('/store', 'store')->name('store');
//                 Route::delete('/{id}', 'destroy')->name('delete');

//                 Route::post('/update', 'update')->name('update');
//                 Route::put('/updateStatus/{status}/{uuid}', 'updateStatus')->name('updateStatus');
//                 Route::get('/indexTable', 'indexTable')->name('indexTable');

//             });
            Route::controller(\App\Http\Controllers\Admin\Order\OrderController::class)->name('orders.')->prefix('orders')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/indexTable', 'indexTable')->name('indexTable');

            });
            Route::controller(\App\Http\Controllers\Admin\Order\OrderController::class)->name('orders.cancel.')->prefix('orders/cancel')->group(function () {
                Route::get('/', 'indexCancel')->name('index');
                Route::get('/indexTable', 'indexTableCancel')->name('indexTable');

            });
            Route::controller(\App\Http\Controllers\Admin\Conversation\ConversationController::class)->name('conversations.')->prefix('conversations')->group(function () {
                Route::get('/{uuid}', 'index')->name('index');
                Route::get('/chat/{uuid?}', 'chat')->name('chat');
                Route::get('/details/{uuid}', 'details')->name('details');
            });

            Route::controller(\App\Http\Controllers\Admin\Role\RolesController::class)->name('roles.')->prefix('roles')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/store', 'store')->name('store');
                Route::post('/update', 'update')->name('update');
                Route::delete('/{uuid}', 'destroy')->name('delete');
                Route::get('/indexTable', 'indexTable')->name('indexTable');
                Route::put('/updateStatus/{status}/{uuid}', 'updateStatus')->name('updateStatus');

            });

            Route::controller(\App\Http\Controllers\Admin\AdminController::class)->name('managers.')->prefix('managers')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/store', 'store')->name('store');
                Route::post('/update', 'update')->name('update');
                Route::delete('/{id}', 'destroy')->name('delete');
                Route::get('/indexTable', 'indexTable')->name('indexTable');
                Route::put('/updateStatus/{status}/{id}', 'updateStatus')->name('updateStatus');
                Route::get('/edit/{id}', 'edit')->name('edit');
            });
            Route::controller(\App\Http\Controllers\Admin\Social\SocialController::class)->name('social.')->prefix('social')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/store', 'store')->name('store');
                Route::post('/update', 'update')->name('update');
                Route::delete('/{uuid}', 'destroy')->name('delete');
                Route::get('/indexTable', 'indexTable')->name('indexTable');
                Route::put('/updateStatus/{status}/{uuid}', 'updateStatus')->name('updateStatus');

            });

            // Route::controller(\App\Http\Controllers\Admin\Discount\DeliveryController::class)->name('delivery.')->prefix('delivery')->group(function () {
            //     Route::get('/', 'index')->name('index');
            //     Route::post('/update', 'update')->name('update');
            //     Route::get('/indexTable', 'indexTable')->name('indexTable');
            //     Route::put('/updateStatus/{status}/{uuid}', 'updateStatus')->name('updateStatus');
            //     Route::get('/indexTable', 'indexTable')->name('indexTable');

            // });
            Route::get('/support/index/{uuid?}', [\App\Http\Controllers\Admin\Support\SupportController::class,'index'])->name('index');
            Route::post('/support/message/send', [\App\Http\Controllers\Admin\Support\SupportController::class,'message'])->name('send_msg');
            Route::get('/support/readMore/{uuid}', [\App\Http\Controllers\Admin\Support\SupportController::class,'readMore'])->name('admin.support.read_more');


            Route::controller(\App\Http\Controllers\Admin\Category\CategoryController::class)->prefix('categories')->name('categories.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/store', 'store')->name('store');
                Route::post('/update', 'update')->name('update');
                Route::get('/indexTable', 'indexTable')->name('indexTable');
                Route::put('/updateStatus/{status}/{id}', 'updateStatus')->name('updateStatus');
                Route::get('/sub/{uuid}', 'subIndex')->name('sub');
                Route::post('/sub/{uuid}/store', 'subStore')->name('sub.store');
                Route::post('/sub/{uuid}/update', 'subUpdate')->name('sub.update');
                Route::get('/sub/{uuid}/indexTable', 'subIndexTable')->name('sub.indexTable');
                Route::put('/sub/{category}/updateStatus/{status}/{sub}', 'subUpdateStatus')->name('sub.updateStatus');
                Route::delete('/sub/{uuid}/{delete}', 'subDestroy')->name('sub.delete');
                Route::delete('/{id}', 'destroy')->name('delete');
            });
            Route::controller(\App\Http\Controllers\Admin\User\UserController::class)->prefix('users')->name('users.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/store', 'store')->name('store');
                Route::post('/update', 'update')->name('update');
                Route::delete('/{id}', 'destroy')->name('delete');
                Route::get('/indexTable', 'indexTable')->name('indexTable');
                Route::put('/updateStatus/{status}/{id}', 'updateStatus')->name('updateStatus');
                Route::get('/country/{uuid}', 'country')->name('country');

            });


            Route::controller(ProcessPaymentController::class)->prefix('payments')->name('payments.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/getData', 'getData')->name('getData');
            });


        });


    });
Route::prefix('/')->group(function () {

    Route::get('order/address/{product?}', [\App\Http\Controllers\web\MainController::class,'getaddAddress'])->name('get.order.address');
    Route::get('order/deliver', [\App\Http\Controllers\web\MainController::class,'orderDelivery'])->name('get.order.delivery');
    Route::get('my/products', [\App\Http\Controllers\web\MainController::class,'myProducts'])->name('my.products');


    Route::post('order/address', [\App\Http\Controllers\web\MainController::class,'addAddress'])->name('order.address');
    Route::get('order/my', [\App\Http\Controllers\web\MainController::class,'myOrder'])->name('order.my');
    Route::get('order/details/{uuid}', [\App\Http\Controllers\web\MainController::class,'OrderDetails'])->name('order.details');
    Route::get('order/details/pending/{uuid}', [\App\Http\Controllers\web\MainController::class,'OrderDetailsPending'])->name('order.details.pending');
    Route::post('order/cancel/{uuid}', [\App\Http\Controllers\web\MainController::class,'cancelOrder'])->name('order.cancel');

    Route::post('cart/update', [\App\Http\Controllers\web\MainController::class,'updateCart'])->name('cart.update');
    Route::post('cart/delete', [\App\Http\Controllers\web\MainController::class,'deleteCart'])->name('cart.delete');
    Route::get('profile', [\App\Http\Controllers\web\MainController::class,'profile'])->name('profile');
    Route::get('/profile/country/{uuid}', [\App\Http\Controllers\web\MainController::class,'country'])->name('country');
    Route::post('profile/update', [\App\Http\Controllers\web\MainController::class,'updateProfile'])->name('profile.update');
    Route::post('store/add', [\App\Http\Controllers\web\MainController::class,'addStore'])->name('store.add');
    Route::get('store/', [\App\Http\Controllers\web\MainController::class,'store'])->name('store');
    Route::get('/store/area/{uuid}', [\App\Http\Controllers\web\MainController::class,'area'])->name('area');
    Route::get('/store/alhayi/{uuid}', [\App\Http\Controllers\web\MainController::class,'alhayi'])->name('alhayi');
    Route::get('delivery/', [\App\Http\Controllers\web\MainController::class,'delivery'])->name('delivery');
    Route::post('delivery/add', [\App\Http\Controllers\web\MainController::class,'addDelivery'])->name('delivery.add');
    Route::get('type/{uuid}', [\App\Http\Controllers\web\MainController::class,'type'])->name('type');

    Route::post('cart/add', [\App\Http\Controllers\web\MainController::class,'addCart'])->name('cart.add');
    Route::get('cart', [\App\Http\Controllers\web\MainController::class,'cart'])->name('cart.get');
    Route::get('compare', [\App\Http\Controllers\web\MainController::class,'getCompare'])->name('compare.get');
    Route::post('search/compare', [\App\Http\Controllers\web\MainController::class,'searchCompare'])->name('compare.search');
    Route::get('/country/{uuid}', [\App\Http\Controllers\web\MainController::class,'country'])->name('country');
    Route::get('/city/{uuid}', [\App\Http\Controllers\web\MainController::class,'city'])->name('city');
    Route::get('/area/{uuid}', [\App\Http\Controllers\web\MainController::class,'area'])->name('area');

    Route::post('compare', [\App\Http\Controllers\web\MainController::class,'compare'])->name('compare.run');
    Route::get('favourite', [\App\Http\Controllers\web\MainController::class,'getFavourite'])->name('favourite.get');
    Route::post('favourite', [\App\Http\Controllers\web\MainController::class,'postFavourite'])->name('favourite.add');
    Route::get('category/{uuid}', [\App\Http\Controllers\web\MainController::class,'category'])->name('category');
    Route::get('main/country/{uuid}', [\App\Http\Controllers\web\MainController::class,'main_country']);

    Route::get('product/location', [\App\Http\Controllers\web\MainController::class,'locationProducts'])->name('product.location');
    Route::get('product/category',[\App\Http\Controllers\web\MainController::class,'categoryProducts'])->name('product.category');
    Route::get('product/images',[\App\Http\Controllers\web\MainController::class,'imagesProducts'])->name('product.image');
    Route::get('product/data',[\App\Http\Controllers\web\MainController::class,'dataProducts'])->name('get.product.data');
    Route::get('product/bledge',[\App\Http\Controllers\web\MainController::class,'bledgeProducts'])->name('product.bledge');

    Route::get('edit/product/location/{uuid}', [\App\Http\Controllers\web\MainController::class,'editlocationProducts'])->name('edit.product.location');
    Route::get('edit/product/category/{uuid}',[\App\Http\Controllers\web\MainController::class,'editcategoryProducts'])->name('edit.product.category');
    Route::get('edit/product/images/{uuid}',[\App\Http\Controllers\web\MainController::class,'editimagesProducts'])->name('edit.product.image');
    Route::get('edit/product/data/{uuid}',[\App\Http\Controllers\web\MainController::class,'editdataProducts'])->name('edit.product.data');
    Route::get('edit/product/bledge/{uuid}',[\App\Http\Controllers\web\MainController::class,'editbledgeProducts'])->name('edit.product.bledge');

    Route::post('update/product/category',[\App\Http\Controllers\web\MainController::class,'updateCategoryProducts'])->name('update.category');
    Route::post('update/product/location',[\App\Http\Controllers\web\MainController::class,'updateLocationProducts'])->name('update.location');
    Route::post('update/product/images',[\App\Http\Controllers\web\MainController::class,'updateImagesProducts'])->name('update.product.images');
    Route::post('update/product/data',[\App\Http\Controllers\web\MainController::class,'updateDataProducts'])->name('update.product.data');
    Route::post('update/product/all',[\App\Http\Controllers\web\MainController::class,'updateProducts'])->name('product.update');

    Route::post('add/product/category',[\App\Http\Controllers\web\MainController::class,'postCategoryProducts'])->name('add.category');
    Route::post('add/product/location',[\App\Http\Controllers\web\MainController::class,'postLocationProducts'])->name('add.location');
    Route::post('add/product/images',[\App\Http\Controllers\web\MainController::class,'postImagesProducts'])->name('product.images');
    Route::post('add/product/data',[\App\Http\Controllers\web\MainController::class,'postDataProducts'])->name('product.data');
    Route::post('add/product/all',[\App\Http\Controllers\web\MainController::class,'postProducts'])->name('product.add');
    Route::get('product/{uuid}',[\App\Http\Controllers\web\MainController::class,'Product'])->name('product');
    Route::get('delete/product/{uuid}',[\App\Http\Controllers\web\MainController::class,'deleteproduct'])->name('delete.product');

    Route::post('search/product', [\App\Http\Controllers\web\MainController::class,'searchProduct'])->name('search.product');
    Route::get('chat', [\App\Http\Controllers\web\MainController::class,'chat'])->name('chat');
    Route::get('conversations/{uuid}', [\App\Http\Controllers\web\MainController::class,'conversations'])->name('conversations');
    Route::post('msg', [\App\Http\Controllers\web\MainController::class,'sendMsg'])->name('msg');
    Route::post('callback', [\App\Http\Controllers\web\MainController::class,'callback'])->name('callback');
    Route::post('error', [\App\Http\Controllers\web\MainController::class,'errorrpay'])->name('error');
    Route::post('checkout', [\App\Http\Controllers\web\MainController::class,'checkout'])->name('checkout');
    Route::get('callback', [\App\Http\Controllers\MyFatoorahController::class,'callback'])->name('myfatoorah.callback');
    Route::post('comment', [\App\Http\Controllers\web\MainController::class,'comment'])->name('comment');
    Route::get('money/{code}', [\App\Http\Controllers\web\MainController::class,'money'])->name('money');
    Route::post('details_msg', [\App\Http\Controllers\web\MainController::class,'details_msg'])->name('details_msg');
    Route::get('search/{uuid?}', [\App\Http\Controllers\web\MainController::class,'search'])->name('search');
    Route::get('market', [\App\Http\Controllers\web\MainController::class,'market'])->name('market');
    Route::get('city_main', [\App\Http\Controllers\web\MainController::class,'city_main'])->name('city_main');
    Route::get('logout', [\App\Http\Controllers\web\MainController::class,'logout'])->name('logout');

    Route::get('{uuid?}', [\App\Http\Controllers\web\MainController::class,'main'])->name('web.main');
    
    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified'
    ])->group(function () {
        Route::get('/', function () {
            return view('/');
        })->name('/');
    });
    
    // GoogleLoginController redirect and callback urls
    Route::get('/login/google', [GoogleLoginController::class, 'redirectToGoogle'])->name('auth.google');
    Route::get('/login/google/callback', [GoogleLoginController::class, 'handleGoogleCallback']);

    
    Route::get('/', function () {
        return view('welcome');
    });
    
    Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::controller(TwitterController::class)->group(function(){
        Route::get('auth/twitter', 'redirectToTwitter')->name('auth.twitter');
        Route::get('auth/twitter/callback', 'handleTwitterCallback');
    });

//    Route::get('register',[\App\Http\Controllers\web\MainController::class,'getregister']);
//    Route::post('register',[\App\Http\Controllers\web\MainController::class,'register'])->name('web.register');
//    Route::get('login',[\App\Http\Controllers\web\MainController::class,'getlogin']);
//    Route::post('login',[\App\Http\Controllers\web\MainController::class,'login'])->name('web.login');

});
