<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\ComissionTableController;
use App\Http\Controllers\ProductFamilyController;
use App\Http\Controllers\ProvidersController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomerNotificationController;
use App\Http\Controllers\DiscountsController;
use App\Http\Controllers\DistributorMemberController;
use App\Http\Controllers\DistributorOrganizationController;
use App\Http\Controllers\DistributorPromotionController;
use App\Http\Controllers\DistributorSettingController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\PaymentInfoController;
use App\Http\Controllers\PricesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductOption;
use App\Http\Controllers\ProductOptionController;
use App\Http\Controllers\ProductPropertyController;
use App\Http\Controllers\SendZaloController;
use App\Http\Controllers\TpaController;
use App\Models\DistributorSetting;
use App\Models\Group;
use App\Models\ProductProperty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', [AuthController::class, 'login'])->name('login');

    Route::post('register', [AuthController::class, 'register']);

    Route::post('delete/{id}', [AuthController::class, 'delete']);

    Route::post('deletelele/{id}', [AuthController::class, 'deletelele']);


    Route::post('dduser/{id}', [AuthController::class, 'dduser']);

    Route::get('/getAllProductFamily', [ProductFamilyController::class, 'getAllProductFamily']); 

});

Route::group([
    'middleware' => 'auth:api', 
    'prefix' => 'auth'
], function () {
    Route::post('logout', [AuthController::class,'logout']);
    Route::post('/change-pass', [AuthController::class, 'changePassWord']);   
    Route::post('/delete/{id}', [AuthController::class, 'delete']);   
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
    Route::get('/profile', [AuthController::class, 'userProfile']);

});

Route::group([
    'middleware' => 'auth:api', 
    'prefix' => 'auth'
], function () {
    //product_family
    Route::get('/inforProductFamily/{id}', [ProductFamilyController::class, 'inforProductFamily']); 

    // Route::get('/getAllProductFamily', [ProductFamilyController::class, 'getAllProductFamily']); 

    Route::post('/createProductFamily', [ProductFamilyController::class, 'createProductFamily']); 

     Route::post('/updateProductFamily/{id}', [ProductFamilyController::class, 'updateProductFamily']); 

     Route::post('/deleteProductFamily/{id}', [ProductFamilyController::class, 'deleteProductFamily']); 

     Route::post('/searchProductFamily', [ProductFamilyController::class, 'searchProductFamily']); 



     //provider

    Route::get('/getAllProviders', [ProvidersController::class, 'getAllProviders']);

    Route::post('/createProviders', [ProvidersController::class, 'createProviders']); 

    Route::post('/updateProviders/{id}', [ProvidersController::class, 'updateProviders']); 

    Route::post('/deleteProviders/{id}', [ProvidersController::class, 'deleteProviders']); 

    Route::post('/searchProviders', [ProvidersController::class, 'searchProviders']); 


    //contact
    Route::post('/createContact', [ContactController::class, 'createContact']); 

    Route::post('/updateContact/{id}', [ContactController::class, 'updateContact']); 

    Route::post('/deleteContact/{id}', [ContactController::class, 'deleteContact']); 

    Route::post('/searchContact', [ContactController::class, 'searchContact']); 


//products
Route::post('/createProductInfo', [ProductController::class, 'createProductInfo']); 

Route::post('/updateProductInfo/{id}', [ProductController::class, 'updateProductInfo']); 

Route::post('/deleteProductInfo/{id}', [ProductController::class, 'deleteProductInfo']); 

Route::post('/searchProductInfo', [ProductController::class, 'searchProductInfo']); 

//prices
Route::post('/createPrices', [PricesController::class, 'createPrices']); 

Route::post('/updatePrices/{id}', [PricesController::class, 'updatePrices']); 

Route::post('/deletePrices/{id}', [PricesController::class, 'deletePrices']); 

//discounts
Route::post('/createDiscounts', [DiscountsController::class, 'createDiscounts']); 

Route::post('/updateDiscounts/{id}', [DiscountsController::class, 'updateDiscounts']); 

Route::post('/deleteDiscounts/{id}', [DiscountsController::class, 'deleteDiscounts']); 

// product opption

Route::post('/createProductOption', [ProductOptionController::class, 'createProductOption']); 

Route::post('/updateProductOption/{id}', [ProductOptionController::class, 'updateProductOption']); 

Route::post('/deleteProductOption/{id}', [ProductOptionController::class, 'deleteProductOption']); 

// //property
// Route::post('/createProductProperty', [ProductPropertyController::class, 'createProductProperty']); 

// Route::post('/updateProductProperty/{id}', [ProductPropertyController::class, 'updateProductProperty']); 

// Route::post('/deleteProductProperty/{id}', [ProductPropertyController::class, 'deleteProductProperty']); 



//distributor
Route::post('/createDistributor', [DistributorOrganizationController::class, 'createDistributor']); 

Route::post('/updateDistributor/{id}', [DistributorOrganizationController::class, 'updateDistributor']); 

Route::post('/deleteDistributor/{id}', [DistributorOrganizationController::class, 'deleteDistributor']); 

Route::post('/sreachDistributor', [DistributorOrganizationController::class, 'sreachDistributor']); 

//customer notification
Route::post('/createCustomer', [CustomerNotificationController::class, 'createCustomer']); 

Route::post('/updateCustomer/{id}', [CustomerNotificationController::class, 'updateCustomer']); 

Route::post('/deleteCustomer/{id}', [CustomerNotificationController::class, 'deleteCustomer']); 

//send_zalo
Route::post('/createSendZalo', [SendZaloController::class, 'createSendZalo']); 

Route::post('/updateSendZalo/{id}', [SendZaloController::class, 'updateSendZalo']); 

Route::post('/deleteSendZalo/{id}', [SendZaloController::class, 'deleteSendZalo']); 

//payment_info

Route::post('/createPayment', [PaymentInfoController::class, 'createPayment']); 

Route::post('/updatePayment/{id}', [PaymentInfoController::class, 'updatePayment']); 

Route::post('/deletePayment/{id}', [PaymentInfoController::class, 'deletePayment']); 


//bank

Route::post('/createBank', [BankController::class, 'createBank']); 

Route::post('/updateBank/{id}', [BankController::class, 'updateBank']); 

Route::post('/deleteBank/{id}', [BankController::class, 'deleteBank']); 


//distributor setting

Route::post('/createDisSetting', [DistributorSettingController::class, 'createDisSetting']); 

Route::post('/updateDisSetting/{id}', [DistributorSettingController::class, 'updateDisSetting']); 

Route::post('/deleteDisSetting/{id}', [DistributorSettingController::class, 'deleteDisSetting']); 



//distributor promotion

Route::post('/createDisPromotion', [DistributorPromotionController::class, 'createDisPromotion']); 

Route::post('/updateDisPromotion/{id}', [DistributorPromotionController::class, 'updateDisPromotion']); 

Route::post('/deleteDisPromotion/{id}', [DistributorPromotionController::class, 'deleteDisPromotion']); 



//distributor member

Route::post('/createDisMember', [DistributorMemberController::class, 'createDisMember']); 

Route::post('/updateDisMember/{id}', [DistributorMemberController::class, 'updateDisMember']); 

Route::post('/deleteDisMember/{id}', [DistributorMemberController::class, 'deleteDisMember']); 

Route::post('/searchDisMember', [DistributorMemberController::class, 'searchDisMember']); 


//comission table 

Route::post('/createDisComission', [ComissionTableController::class, 'createDisComission']); 

Route::post('/updateDisComission/{id}', [ComissionTableController::class, 'updateDisComission']); 

Route::post('/deleteDisComission/{id}', [ComissionTableController::class, 'deleteDisComission']); 


//group
Route::post('/createGroup', [GroupController::class, 'createGroup']); 

Route::post('/updateGroup/{id}', [GroupController::class, 'updateGroup']); 

Route::post('/deleteGroup/{id}', [GroupController::class, 'deleteGroup']); 

Route::post('/searchGroup', [GroupController::class, 'searchGroup']); 

//TPA
Route::post('/createTPA', [TpaController::class, 'createTPA']); 

Route::post('/updateTPA/{id}', [TpaController::class, 'updateTPA']); 

Route::post('/deleteTPA/{id}', [TpaController::class, 'deleteTPA']); 

Route::post('/searchTPA', [TpaController::class, 'searchTPA']); 
});
