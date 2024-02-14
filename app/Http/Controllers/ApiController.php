<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
	var $getServiceBaseURL = "payments.probasepay.com";
	
    public function __construct()
    {
        //
    }
	
	

    public function validateUsername(Request $request)
	{
		$all = $request->json()->all();
		$username = $request->json()->get('username');
		$acquirerCode = $request->json()->get('acquirerCode');
		$url = 'http://'.$this->getServiceBaseURL.'/mobile-bridge/api/v1/validate-username';
		$data = 'username='.$username;
		//."&acquirerCode=".$acquirerCode;

		$server_output = sendPostRequest($url, $data);
		$authData = json_decode($server_output);
		return response()->json($authData);
	}
	
	
	
	public function postLoginToPayJSONResponse(Request $request)
	{
		$all = $request->json()->all();
		$username = $request->json()->get('username');
		$password = $request->json()->get('password');
		//$username = $request->get('username');
		//$password = $request->get('password');
		$url = 'http://'.$this->getServiceBaseURL.'/mobile-bridge/api/v1/authenticate-username';
		//return response()->json($password);
		$data = 'username='.$username."&password=".$password."&isMobile=1";

		$server_output = sendPostRequest($url, $data);
		$authData = json_decode($server_output);
		return response()->json($authData);
	}

    //
	
	
	
	
	public function postValidateOtp(Request $request)
	{
		$all = $request->json()->all();
		$otp = $request->json()->get('otp');
		$token = $request->json()->get('token');
		//$username = $request->get('username');
		//$password = $request->get('password');
		$url = 'http://'.$this->getServiceBaseURL.'/mobile-bridge/api/v1/validate-otp';
		//return response()->json($password);
		$data = 'otp='.$otp."&token=".$token;

		$server_output = sendPostRequest($url, $data);
		$authData = json_decode($server_output);
		return response()->json($authData);
	}
	
	public function postRegisterCustomer(Request $request)
	{
		$all = $request->json()->all();
		$firstName = $request->json()->get('firstName');
		$lastName = $request->json()->get('lastName');
		$otherName = $request->json()->get('otherName');
		$password = $request->json()->get('password');
		$confirmPassword = $request->json()->get('confirmPassword');
		$mobileNumber = $request->json()->get('mobileNumber');
		$countryCode = $request->json()->get('countryCode');
		//$username = $request->get('username');
		//$password = $request->get('password');
		$url = 'http://'.$this->getServiceBaseURL.'/mobile-bridge/api/v1/register-customer';
		//return response()->json($password);
		$data = 'firstName='.$firstName."&lastName=".$lastName."&otherName=".$otherName."&password=".$password."&confirmPassword=".$confirmPassword."&countrycode=".$countryCode."&mobileNumber=".($mobileNumber);
		//return response()->json($data);
		$server_output = sendPostRequest($url, $data);
		$authData = json_decode($server_output);
		return response()->json($authData);
	}
	
	public function postGetWalletBalance(Request $request)
	{
		$all = $request->all();
		//dd($all);
		//return response()->json($all);
		$accountIdentifier = $request->json()->get('accountIdentifier');
		$token = $request->json()->get('token');
		$url = 'http://'.$this->getServiceBaseURL.'/mobile-bridge/api/v1/get-account-overview-ajax/'.$accountIdentifier.'/'.PROBASEWALLET_MERCHANT_CODE.'/'.PROBASEWALLET_DEVICE_CODE;
		//return response()->json($url);
		$data = 'token='.$token;
		//return response()->json($data);
		$server_output = sendPostRequestWithToken($url, $data, $token);
		return response()->json($server_output);
		//echo ($server_output);
		//dd(1);
		//$authData = json_decode($server_output);
		//return response()->json($authData);
	}
	
	
	public function postValidateUtility(Request $request)
	{
		$all = $request->all();
		//dd($all);
		//return response()->json($all);->json()
		//$accountIdentifier = $request->json()->get('accountIdentifier');
		//return response()->json($all);
		$dataStr = "";
        foreach($all as $d => $v)
        {
			$dataStr = $dataStr."".$d."=".$v."&";
        }
		$dataStr = $dataStr."&deviceCode=".PROBASEWALLET_DEVICE_CODE."&merchantId=".PROBASEWALLET_MERCHANT_CODE;
		$token = $request->json()->get('token');
		$url = 'http://'.$this->getServiceBaseURL.'/mobile-bridge/api/v1/validate-utility-meter/1';
		//return response()->json($url);
		//$data = 'token='.$token;
		//return response()->json($dataStr);
		$server_output = sendPostRequestWithToken($url, $dataStr, $token);
		//return response()->json($server_output);
		//echo ($server_output);
		//dd(1);
		$authData = json_decode($server_output);
		return response()->json($authData);
	}
	
	
	public function postPurchaseAirtime(Request $request)
	{
		$all = $request->all();
		
		//dd($all);
		//return response()->json($all);->json()
		//$accountIdentifier = $request->json()->get('accountIdentifier');
		//return response()->json($all);
		$dataStr = "";
        foreach($all as $d => $v)
        {
			$dataStr = $dataStr."".$d."=".$v."&";
        }
		$dataStr = $dataStr."&deviceCode=".PROBASEWALLET_DEVICE_CODE."&merchantId=".PROBASEWALLET_MERCHANT_CODE."&channel=MOBILE";
		$token = $request->json()->get('token');
		$url = 'http://'.$this->getServiceBaseURL.'/mobile-bridge/api/v1/purchase-airtime/1';
		//return response()->json($url);
		//$data = 'token='.$token;
		//return response()->json($dataStr);
		$server_output = sendPostRequestWithToken($url, $dataStr, $token);
		//return response()->json($server_output);
		//echo ($server_output);
		//dd(1);
		$authData = json_decode($server_output);
		return response()->json($authData);
	}
	
	
	public function postPurchaseElectricity(Request $request)
	{
		$all = $request->all();
		
		//dd($all);
		//return response()->json($all);//->json()
		//$accountIdentifier = $request->json()->get('accountIdentifier');
		//return response()->json($all);
		$dataStr = "";
        foreach($all as $d => $v)
        {
			$dataStr = $dataStr."".$d."=".$v."&";
        }
		$dataStr = $dataStr."&deviceCode=".PROBASEWALLET_DEVICE_CODE."&merchantId=".PROBASEWALLET_MERCHANT_CODE."&channel=MOBILE";
		$token = $request->json()->get('token');
		$url = 'http://'.$this->getServiceBaseURL.'/mobile-bridge/api/v1/purchase-electricity/1';
		//return response()->json($url);
		//$data = 'token='.$token;
		//return response()->json($dataStr);
		$server_output = sendPostRequestWithToken($url, $dataStr, $token);
		//return response()->json($server_output);
		//echo ($server_output);
		//dd(1);
		$authData = json_decode($server_output);
		return response()->json($authData);
	}
	
	
	public function postPurchaseCableTv(Request $request)
	{
		$all = $request->all();
		
		//dd($all);
		//return response()->json($all);//->json()
		//$accountIdentifier = $request->json()->get('accountIdentifier');
		//return response()->json($all);
		$dataStr = "";
        foreach($all as $d => $v)
        {
			$dataStr = $dataStr."".$d."=".$v."&";
        }
		$dataStr = $dataStr."&deviceCode=".PROBASEWALLET_DEVICE_CODE."&merchantId=".PROBASEWALLET_MERCHANT_CODE."&channel=MOBILE";
		$token = $request->json()->get('token');
		
		$url = '';
		if($all['utilityBillType']=="DSTV")
		{
			$url = 'http://'.$this->getServiceBaseURL.'/mobile-bridge/api/v1/purchase-dstv/1';
		}
		else
		{
			
		}
		//return response()->json($url);
		//$data = 'token='.$token;
		//return response()->json($dataStr);
		$server_output = sendPostRequestWithToken($url, $dataStr, $token);
		//return response()->json($server_output);
		//echo ($server_output);
		//dd(1);
		$authData = json_decode($server_output);
		return response()->json($authData);
	}
	
	
	public function postGetSchools(Request $request)
	{
		$url = "https://".SHIKOLA_SUBDOMAIN.".shikola.com/api/api-authenticate/".SHIKOLA_USERNAME."/".SHIKOLA_PASSWORD;
		$server_output = sendGetRequest($url);
		
		$authData = json_decode($server_output);
		$token = $authData->token;
		
		$url = "https://".SHIKOLA_SUBDOMAIN.".shikola.com/api/schools-query?token=".$token;
		$server_output = sendGetRequest($url);
		//dd($server_output);
		$server_output = json_decode($server_output);
		$server_output->token = $token;
		
		return response()->json($server_output);
		
	}
	
	
	public function postGetCouncils(Request $request)
	{
		$councils = [];
		array_push($councils, ['name'=>'Chingola Muncipal Council', 'id'=> 1, 'default_currency'=>'ZMW', 'confirmation_code'=>'001', 'merchant_code'=>'9KMKE3TJVI', 'device_code'=> 'KFJVN1PY']);
		array_push($councils, ['name'=>'Lusaka City Council', 'id'=> 2, 'default_currency'=>'ZMW', 'confirmation_code'=>'002', 'merchant_code'=>'47CFLYPLDT', 'device_code'=> 'WGGC269K']);
		
		
		$schoolCenters = [];
		array_push($schoolCenters, ['name'=>'Kabwata pre-school', 'id'=> 3, 'default_currency'=>'ZMW', 'confirmation_code'=>'004', 'merchant_code'=>'MWCYY2RBNX', 'device_code'=> 'GV4L8WPU', 'amount'=> 'GV4L8WPU']);
		array_push($schoolCenters, ['name'=>'Chilenje pre-school', 'id'=> 4, 'default_currency'=>'ZMW', 'confirmation_code'=>'005', 'merchant_code'=>'MWCYY2RBNX', 'device_code'=> 'GV4L8WPU', 'amount'=> 'GV4L8WPU']);
		array_push($schoolCenters, ['name'=>'Mtendere pre-school', 'id'=> 5, 'default_currency'=>'ZMW', 'confirmation_code'=>'006', 'merchant_code'=>'MWCYY2RBNX', 'device_code'=> 'GV4L8WPU', 'amount'=> 'GV4L8WPU']);
		array_push($schoolCenters, ['name'=>'Matero Pre-school', 'id'=> 6, 'default_currency'=>'ZMW', 'confirmation_code'=>'007', 'merchant_code'=>'MWCYY2RBNX', 'device_code'=> 'GV4L8WPU', 'amount'=> 'GV4L8WPU']);
		array_push($schoolCenters, ['name'=>'Mandevu Community School', 'id'=> 7, 'default_currency'=>'ZMW', 'confirmation_code'=>'008', 'merchant_code'=>'MWCYY2RBNX', 'device_code'=> 'GV4L8WPU', 'amount'=> 'GV4L8WPU']);
		array_push($schoolCenters, ['name'=>'George Community School', 'id'=> 8, 'default_currency'=>'ZMW', 'confirmation_code'=>'008', 'merchant_code'=>'MWCYY2RBNX', 'device_code'=> 'GV4L8WPU', 'amount'=> 'GV4L8WPU']);
		
		
		$libraryCenters = [];
		array_push($libraryCenters, ['name'=>'Central Business District (CBD)', 'id'=> 3, 'default_currency'=>'ZMW', 'confirmation_code'=>'004', 'merchant_code'=>'MWCYY2RBNX', 'device_code'=> 'GV4L8WPU', 'amount'=> 'GV4L8WPU']);
		array_push($libraryCenters, ['name'=>'Chilenje', 'id'=> 4, 'default_currency'=>'ZMW', 'confirmation_code'=>'005', 'merchant_code'=>'MWCYY2RBNX', 'device_code'=> 'GV4L8WPU', 'amount'=> 'GV4L8WPU']);
		array_push($libraryCenters, ['name'=>'Matero', 'id'=> 5, 'default_currency'=>'ZMW', 'confirmation_code'=>'006', 'merchant_code'=>'MWCYY2RBNX', 'device_code'=> 'GV4L8WPU', 'amount'=> 'GV4L8WPU']);
		array_push($libraryCenters, ['name'=>'Mtendere', 'id'=> 8, 'default_currency'=>'ZMW', 'confirmation_code'=>'008', 'merchant_code'=>'MWCYY2RBNX', 'device_code'=> 'GV4L8WPU', 'amount'=> 'GV4L8WPU']);
		
		
		
		$venueCenters = [];
		array_push($venueCenters, ['name'=>'Central Business District (CBD)', 'id'=> 3, 'default_currency'=>'ZMW', 'confirmation_code'=>'004', 'merchant_code'=>'MWCYY2RBNX', 'device_code'=> 'GV4L8WPU', 'amount'=> 'GV4L8WPU']);
		array_push($venueCenters, ['name'=>'Chilenje', 'id'=> 4, 'default_currency'=>'ZMW', 'confirmation_code'=>'005', 'merchant_code'=>'MWCYY2RBNX', 'device_code'=> 'GV4L8WPU', 'amount'=> 'GV4L8WPU']);
		array_push($venueCenters, ['name'=>'Matero', 'id'=> 5, 'default_currency'=>'ZMW', 'confirmation_code'=>'006', 'merchant_code'=>'MWCYY2RBNX', 'device_code'=> 'GV4L8WPU', 'amount'=> 'GV4L8WPU']);
		array_push($venueCenters, ['name'=>'Mtendere', 'id'=> 8, 'default_currency'=>'ZMW', 'confirmation_code'=>'008', 'merchant_code'=>'MWCYY2RBNX', 'device_code'=> 'GV4L8WPU', 'amount'=> 'GV4L8WPU']);
		
		
		
		$resp = [];
		$resp['status'] = true;
		$resp['councils'] = $councils;
		$resp['schoolCenters'] = $schoolCenters;
		$resp['libraryCenters'] = $libraryCenters;
		$resp['venueCenters'] = $venueCenters;
		
		return response()->json($resp);
		
	}
	
	
	public function postGetStudentSchoolFees(Request $request)
	{
		$token = $request->get('shikolaToken');
		$studentNumber = $request->get('studentNumber');
		$schoolData = $request->get('schoolData');
		$schoolData = explode('***', $schoolData);
		
		$url = "https://".SHIKOLA_SUBDOMAIN.".shikola.com/api/school-student-query";
		$dataStr = "confirmation_code=".$schoolData[4]."&student_reg_no=".$studentNumber;
		$studentInfo = sendPostRequestWithTokenForShikola($url, $dataStr, $token);
		
		$url = "https://".SHIKOLA_SUBDOMAIN.".shikola.com/api/student-school-fee-query";
		$dataStr = "confirmation_code=".$schoolData[4]."&student_reg_no=".$studentNumber;
		$fees = sendPostRequestWithTokenForShikola($url, $dataStr, $token);
		
		$resp = [];
		$resp['success'] = true;
		$resp['status'] = 1;
		$resp['studentInfo'] = json_decode($studentInfo);
		$resp['feesInfo'] = $fees;
		
	
		
		return response()->json($resp);
	}
	
	
	public function validateMerchant(Request $request)
	{
		/*$token = $request->get('shikolaToken');
		$serverToken = $request->get('serverToken');
		$studentNumber = $request->get('studentNumber');
		$amount = $request->get('amount');
		$schoolData = $request->get('schoolData');
		$schoolData = explode('***', $schoolData);
		
		$url = "https://".SHIKOLA_SUBDOMAIN.".shikola.com/api/school-student-query";
		$dataStr = "confirmation_code=".$schoolData[4]."&student_reg_no=".$studentNumber;
		$studentInfo = sendPostRequestWithTokenForShikola($url, $dataStr, $token);
		
		$url = "https://".SHIKOLA_SUBDOMAIN.".shikola.com/api/student-school-fee-query";
		$dataStr = "confirmation_code=".$schoolData[4]."&student_reg_no=".$studentNumber;
		$fees = sendPostRequestWithTokenForShikola($url, $dataStr, $token);
		
		$resp = [];
		$resp['success'] = true;
		$resp['status'] = 1;
		$resp['studentInfo'] = json_decode($studentInfo);
		$resp['feesInfo'] = $fees;*/
		
	
		try
		{
			$all = $request->all();
			//return response()->json(array_keys($all));
			$dataStr = "";
			foreach($all as $d => $v)
			{
				$dataStr = $dataStr."".$d."=".$v."&";
			}
			$dataStr = $dataStr."&deviceCode=".PROBASEWALLET_DEVICE_CODE."&merchantId=".PROBASEWALLET_MERCHANT_CODE."&channel=MOBILE";
			//return response()->json($dataStr);
			$token = $request->json()->get('token');
			
			$url = '';
			$url = 'http://'.$this->getServiceBaseURL.'/mobile-bridge/api/v1/validate-merchant';
			//return response()->json($url);
			//$data = 'token='.$token;
			//return response()->json($dataStr);
			$server_output = sendPostRequestWithToken($url, $dataStr, $token);
			//return response()->json($server_output);
			//echo ($server_output);
			//dd(1);
			$authData = json_decode($server_output);
			return response()->json($authData);
		}
		catch(\Exception $e)
		{
			return response()->json($e->getMessage());
		}
	}
	
	
	public function postPayMerchant(Request $request)
	{
		try
		{
			$all = $request->json()->all();
			$dataStr = "";
			$keys = [];
			foreach($all as $d => $v)
			{
				try
				{
					if($v!=null && $d!='fee_criteria_item_classes_ids')
					{
						$dataStr = $dataStr."".$d."=".$v."&";
						array_push($keys, $d);
					}
					if($v!=null && $d=='debitSourceType')
					{
						if($v=="My Wallet")
						{
							$dataStr = $dataStr."".$d."=WALLET&";
							array_push($keys, $d);
						}
					}
				}
				catch(\Exception $e)
				{
					//return response()->json(json_encode([($d)]));
				}
			}
			$dataStr = $dataStr."&deviceCode=".PROBASEWALLET_DEVICE_CODE."&merchantId=".PROBASEWALLET_MERCHANT_CODE."&channel=MOBILE";
			$token = $request->json()->get('token');
			
			$url = '';
			$url = 'http://'.$this->getServiceBaseURL.'/mobile-bridge/api/v1/pay-merchant';
			//return response()->json($url);
			//$data = 'token='.$token;
			$server_output = sendPostRequestWithToken($url, $dataStr, $token);
			//return response()->json($server_output);
			//echo ($server_output);
			//dd(1);
			$authData = json_decode($server_output);
			return response()->json($authData);
		}
		catch(\Exception $e)
		{
			return response()->json($e->getMessage());
		}
	}
	
	
	public function postCreateNewWallet(Request $request)
	{
		
			$all = $request->json()->all();
			$dataStr = "";
			$keys = [];
			
			$data = [];
			$data['homeAddress'] = $all['address'];
			$data['city'] = $all['city'];
			$data['district'] = $all['district'];
			$data['meansOfIdentification'] = $all['meansOfIdentificationType'];
			$data['identityNumber'] = $all['meansOfIdentificationNumber'];
			$data['email'] = $all['emailAddress'];
			$data['gender'] = strtoupper($all['gender']);
			$data['dateOfBirth'] = $all['dateOfBirth'];
			$data['addNewAccountCustomerVerificationNumber'] = $all['customerVerificationNo'];
			$data['accountCurrency'] = $all['currencyCode'];
			$data['accountType'] = "SAVINGS";
			$data['token'] = $all['token'];
			//$data['openingAccountAmount'] = $all['openingAccountAmount'];
			$data['merchantCode'] = PROBASEWALLET_MERCHANT_CODE;
			$data['deviceCode'] = PROBASEWALLET_DEVICE_CODE;
			//return response()->json($data);
			
			
			foreach($data as $d => $v)
			{
				$dataStr = $dataStr."".$d."=".$v."&";
			}
			$token = $request->json()->get('token');
			
			$url = '';
			$url = 'http://'.$this->getServiceBaseURL.'/mobile-bridge/api/v1/create-wallet/1';
			//return response()->json($url);
			//$data = 'token='.$token;
			$server_output = sendPostRequest($url, $dataStr);
			//return response()->json($server_output);
			//echo ($server_output);
			//dd(1);
			$authData = json_decode($server_output);
			return response()->json($authData);
		
	}
	
	
	public function postValidateWallet(Request $request)
	{
		
			$all = $request->json()->all();
			$dataStr = "";
			$keys = [];
			foreach($all as $d => $v)
			{
				$dataStr = $dataStr."".$d."=".$v."&";
			}
			
			$dataStr = $dataStr."&merchantId=".PROBASEWALLET_MERCHANT_CODE;
			$dataStr = $dataStr."&deviceCode=".PROBASEWALLET_DEVICE_CODE;
			$token = $request->json()->get('token');
			
			$url = '';
			$url = 'http://'.$this->getServiceBaseURL.'/mobile-bridge/api/v1/validate-wallet/1';
			//return response()->json($url);
			//$data = 'token='.$token;
			$server_output = sendPostRequestWithToken($url, $dataStr, $token);
			//
			//return response()->json($server_output);
			//echo ($server_output);
			//dd(1);
			$authData = json_decode($server_output);
			return response()->json($authData);
	}
	
	public function postFundsTransfer(Request $request)
	{
		
			$all = $request->json()->all();
			$dataStr = "";
			$keys = [];
			foreach($all as $d => $v)
			{
				//if($d!='token')
					$dataStr = $dataStr."".$d."=".$v."&";
			}
			$dataStr = $dataStr."&deviceCode=".PROBASEWALLET_DEVICE_CODE."&merchantId=".PROBASEWALLET_MERCHANT_CODE."&channel=MOBILE";
			$token = $request->json()->get('token');
			
			$url = '';
			$url = 'http://'.$this->getServiceBaseURL.'/mobile-bridge/api/v1/ft/1';
			//return response()->json($url);
			//$data = 'token='.$token;
			$server_output = sendPostRequestWithToken($url, $dataStr, $token);
			//return response()->json($server_output);
			//echo ($server_output);
			//dd(1);
			$authData = json_decode($server_output);
			return response()->json($authData);
		
	}
	
	/**/
	public function postCreateNewVirtualCard(Request $request)
	{
		$all = $request->json()->all();
		//$jwtToken = $all['jwtToken'];
		$dataStr = "";
		$keys = [];
		foreach($all as $d => $v)
		{
			$dataStr = $dataStr."".$d."=".$v."&";
		}
		//$dataStr = $dataStr."&deviceCode=".PROBASEWALLET_DEVICE_CODE."&merchantId=".PROBASEWALLET_MERCHANT_CODE."&channel=MOBILE";
		$token = $request->json()->get('token');
		
		$url = '';
		$url = 'http://'.$this->getServiceBaseURL.'/mobile-bridge/api/v1/create-virtual-card/1';
		//return response()->json($url);
		//$data = 'token='.$token;
		$server_output = sendPostRequestWithToken($url, $dataStr, $token);
		//return response()->json($server_output);
		//return response()->json($server_output);
		//echo ($server_output);
		//dd(1);
		$authData = json_decode($server_output);
		return response()->json($authData);
	}
	
	
	public function postPayOtherBills(Request $request)
	{
		$all = $request->json()->all();
		//$jwtToken = $all['jwtToken'];
		$all = $request->json()->all();
		$dataStr = "";
		$keys = [];
		
		$dataStr = $dataStr."&deviceCode=".PROBASEWALLET_DEVICE_CODE."&merchantId=".PROBASEWALLET_MERCHANT_CODE."&channel=MOBILE&token=".
			$all['serverToken']."&accountIdentifier=".$all['accountIdentifier']."&recipientDeviceCode=".$all['deviceCode']."&amount=".$all['amount']."&debitSourceType=".
			$all['debitSourceType']."&otp=".$all['otp']."&otpRef=".$all['otpRef']."&payeeName=".$all['payeeName']."&merchantName=".$all['merchantName'];
		if($v=="My Wallet")
		{
			$dataStr = $dataStr."&debitSourceType=WALLET&";
		}
		return response()->json($dataStr);
		$token = $request->json()->get('token');
		
		$url = '';
		$url = 'http://'.$this->getServiceBaseURL.'/mobile-bridge/api/v1/pay-merchant';
		//return response()->json($url);
		//$data = 'token='.$token;
		$server_output = sendPostRequestWithToken($url, $dataStr, $token);
		//return response()->json($server_output);
		//echo ($server_output);
		//dd(1);
		$authData = json_decode($server_output);
		return response()->json($authData);
	}
}
