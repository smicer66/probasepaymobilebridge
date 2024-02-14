<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return response()->json(['error' => 'Unauthorized'], 401);
});


$router->group([
	'prefix' => '/mb/api/v1',
	'namespace' => ''
], function() use ($router){
	$router->post('/validate-username', '\App\Http\Controllers\ApiController@validateUsername');
	$router->post('/authenticate-username', '\App\Http\Controllers\ApiController@postLoginToPayJSONResponse');
	$router->post('/validate-otp', '\App\Http\Controllers\ApiController@postValidateOtp');
	$router->post('/register-customer', '\App\Http\Controllers\ApiController@postRegisterCustomer');
	$router->post('/wallet-balance', '\App\Http\Controllers\ApiController@postGetWalletBalance');
	$router->post('/validate-utility', '\App\Http\Controllers\ApiController@postValidateUtility');
	$router->post('/purchase-airtime', '\App\Http\Controllers\ApiController@postPurchaseAirtime');
	$router->post('/purchase-electricity', '\App\Http\Controllers\ApiController@postPurchaseElectricity');
	$router->post('/purchase-cable-tv', '\App\Http\Controllers\ApiController@postPurchaseCableTv');
	$router->post('/get-student-fees', '\App\Http\Controllers\ApiController@postGetStudentSchoolFees');
	
	
	$router->get('/get-schools', '\App\Http\Controllers\ApiController@postGetSchools');
	$router->post('/validate-merchant', '\App\Http\Controllers\ApiController@validateMerchant');
	$router->post('/pay-merchant', '\App\Http\Controllers\ApiController@postPayMerchant');
	
	$router->post('/validate-wallet', '\App\Http\Controllers\ApiController@postValidateWallet');
	$router->post('/ft', '\App\Http\Controllers\ApiController@postFundsTransfer');
	
	$router->post('/create-wallet', '\App\Http\Controllers\ApiController@postCreateNewWallet');
	$router->post('/create-virtual-card', '\App\Http\Controllers\ApiController@postCreateNewVirtualCard');
	
	$router->get('/get-councils', '\App\Http\Controllers\ApiController@postGetCouncils');
	$router->post('/pay-other-bills', '\App\Http\Controllers\ApiController@postPayOtherBills');
	
});