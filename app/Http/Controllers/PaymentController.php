<?php

namespace App\Http\Controllers;

use App\Models\CreateEvent;
use App\Models\Stk;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Throwable;

class PaymentController extends Controller
{
    public function checkout(Request $request)
    {
        $events = CreateEvent::all();

        $services = $request->query('services');

        // If only one service is provided, convert it to an array for consistent processing
        $services = is_array($services) ? $services : explode(',', $services);

        // Trim spaces from each service and remove empty values
        $services = array_filter(array_map('trim', $services));

        // Retrieve events based on the provided services
        $service = CreateEvent::where(function ($query) use ($services) {
            foreach ($services as $service) {
                $query->orWhere('eventname', 'LIKE', "%$service%");
            }
        })->get();
        $name = $request->query('name');
        $ticketId = $request ->query('ticketId');


        $data = compact('events', 'service', 'name', 'ticketId');

        return view('home.mpesa', $data);
    }


    public function token(){
        $consumerKey='CQ4pHm72bciVpnfobRiMvcwtkj5VjUEX';
        $consumerSecret='o0XABv0wuT7hJCPa';
        $url='https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

        $response=Http::withBasicAuth($consumerKey,$consumerSecret)->get($url);
        return $response['access_token'];
    }
    public function initiateStkPush(Request $request)
    {
        $phone = $request->query('phone');
        $id = $request->query('id');

        $accessToken = $this->token();
        $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
        $PassKey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
        $BusinessShortCode = 174379;
        $Timestamp = Carbon::now()->format('YmdHis');
        $password = base64_encode($BusinessShortCode . $PassKey . $Timestamp);
        $TransactionType = 'CustomerPayBillOnline';
        $Amount = ceil($request->amount);
        $PartyA = $phone;
        $PartyB = 174379;
        $PhoneNumber = $phone;
        $CallbackUrl = 'https://6743-105-29-165-230.ngrok-free.app//stkcallback'. $id;;
        $AccountReference = 'GigsLink';
        $TransactionDesc = 'payment for e-services';
        $job_id =$request->query('id');
        $calculated = $request->query('amount');


        try {
            $response = Http::withToken($accessToken)->post($url, [
                'BusinessShortCode' => $BusinessShortCode,
                'Password' => $password,
                'Timestamp' => $Timestamp,
                'TransactionType' => $TransactionType,
                'Amount' => $Amount,
                'PartyA' => $PartyA,
                'PartyB' => $PartyB,
                'PhoneNumber' => $PhoneNumber,
                'CallBackURL' => $CallbackUrl,
                'AccountReference' => $AccountReference,
                'TransactionDesc' => $TransactionDesc
            ]);
            if ($response->getStatusCode() !== 200) {
                throw new \Exception('Error in payment request. Response status code: ' . $response->getStatusCode());
            }

            $res = json_decode($response->body());

            $ResponseCode = $res->ResponseCode;

            if ($ResponseCode == 0) {
                $MerchantRequestID = $res->MerchantRequestID;
                $CheckoutRequestID = $res->CheckoutRequestID;
                $CustomerMessage = $res->CustomerMessage;

                // Save the response to the database
                $payment = new Stk();
                $payment->phone = $PhoneNumber;
                $payment->amount = $Amount;
                $payment->reference = $AccountReference;
                $payment->description = $TransactionDesc;
                $payment->MerchantRequestID = $MerchantRequestID;
                $payment->CheckoutRequestID = $CheckoutRequestID;
                $payment->status = 'Requested';
                $payment-> job_id = $job_id;
                $payment-> calculated = $calculated;

                $payment->save();


                return $CustomerMessage;
            }
        } catch (\Throwable $e) {
            return redirect('/error')->with(['error' => $e->getMessage()]);
        }
    }



    public function stkCallback(Request $request){
        $id = $request -> query('id');

        $data=file_get_contents('php://input');
        Storage::disk('local')->put('stk.txt',$data);


        $response=json_decode($data);



        $ResultCode=$response->Body->stkCallback->ResultCode;

        if($ResultCode==0){

            $MerchantRequestID=$response->Body->stkCallback->MerchantRequestID;
            $CheckoutRequestID=$response->Body->stkCallback->CheckoutRequestID;
            $ResultDesc=$response->Body->stkCallback->ResultDesc;
            $Amount=$response->Body->stkCallback->CallbackMetadata->Item[0]->Value;
            $MpesaReceiptNumber=$response->Body->stkCallback->CallbackMetadata->Item[1]->Value;
            //$Balance=$response->Body->stkCallback->CallbackMetadata->Item[2]->Value;
            $TransactionDate=$response->Body->stkCallback->CallbackMetadata->Item[3]->Value;
            $PhoneNumber=$response->Body->stkCallback->CallbackMetadata->Item[3]->Value;

            $payment=Stk::where('CheckoutRequestID',$CheckoutRequestID)->firstOrfail();
            $payment->status='Paid';
            $payment->TransactionDate=$TransactionDate;
            $payment->MpesaReceiptNumber=$MpesaReceiptNumber;
            $payment->ResultDesc=$ResultDesc;
            $payment->save();



        }else{

            $CheckoutRequestID=$response->Body->stkCallback->CheckoutRequestID;
            $ResultDesc=$response->Body->stkCallback->ResultDesc;
            $payment=Stk::where('CheckoutRequestID',$CheckoutRequestID)->firstOrfail();

            $payment->ResultDesc=$ResultDesc;
            $payment->status='Failed';
            $payment->save();

        }

    }

    public function stkQuery(Request $request){
        $accessToken = $this->token();
        $BusinessShortCode = 174379;
        $PassKey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
        $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpushquery/v1/query';
        $Timestamp = Carbon::now()->format('YmdHis');
        $Password = base64_encode($BusinessShortCode . $PassKey . $Timestamp);
        $CheckoutRequestID = $request->query('id');

        $response = Http::withToken($accessToken)->post($url, [
            'BusinessShortCode' => $BusinessShortCode,
            'Timestamp' => $Timestamp,
            'Password' => $Password,
            'CheckoutRequestID' => $CheckoutRequestID
        ]);

        return view('home.message', compact('response'));
    }

    public function b2c(){
        $accessToken=$this->token();

        $InitiatorName='testapi';
        $InitiatorPassword='Safaricom999!*!';
        $path=Storage::disk('local')->get('SandboxCertificate.cer');
        $pk=openssl_pkey_get_public($path);


        openssl_public_encrypt(
            $InitiatorPassword,
            $encrypted,
            $pk,
            $padding=OPENSSL_PKCS1_PADDING

        );

        //$encrypted
        $SecurityCredential=base64_encode($encrypted);
        $CommandID='E-service payment'; //BusinessPayment PromotionPayment
        $Amount=3000;
        $PartyA=600584;
        $PartyB=254708374149;
        $Remarks='remarks';
        $QueueTimeOutURL='https://d49b-105-29-165-230.ngrok-free.app//b2ctimeout';
        $ResultURL='https://d49b-105-29-165-230.ngrok-free.app//b2cresult';
        $Occassion='occassion';
        $url='https://sandbox.safaricom.co.ke/mpesa/b2c/v3/paymentrequest';

        $response=Http::withToken($accessToken)->post($url,[
            'InitiatorName'=>$InitiatorName,
            'SecurityCredential'=>$SecurityCredential,
            'CommandID'=>$CommandID,
            'Amount'=>$Amount,
            'PartyA'=>$PartyA,
            'PartyB'=>$PartyB,
            'Remarks'=>$Remarks,
            'QueueTimeOutURL'=>$QueueTimeOutURL,
            'ResultURL'=>$ResultURL,
            'Occassion'=>$Occassion

        ]);

        return $response;



    }

    public function b2cResult(){
        $data=file_get_contents('php://input');
        Storage::disk('local')->put('b2cresponse.txt',$data);

    }

    public function b2cTimeout(){
        $data=file_get_contents('php://input');
        Storage::disk('local')->put('b2ctimeout.txt',$data);
    }


//
//    public function registerUrl(){
//        $accessToken=$this->token();
//        $url='https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl';
//        $ShortCode=600997;
//        $ResponseType='Completed';  //Cancelled
//        $ConfirmationURL='https://a80a-197-156-137-172.sa.ngrok.io/payments/confirmation';
//        $ValidationURL='https://a80a-197-156-137-172.sa.ngrok.io/payments/validation';
//
//        $response=Http::withToken($accessToken)->post($url,[
//            'ShortCode'=>$ShortCode,
//            'ResponseType'=>$ResponseType,
//            'ConfirmationURL'=>$ConfirmationURL,
//            'ValidationURL'=>$ValidationURL
//        ]);
//
//        return $response;
//    }
//
//    public function Simulate(){
//        $accessToken=$this->token();
//        $url='https://sandbox.safaricom.co.ke/mpesa/c2b/v1/simulate';
//        $ShortCode=600997;
//        $CommandID='CustomerPayBillOnline'; //CustomerBuyGoodsOnline
//        $Amount=1;
//        $Msisdn=254708374149;
//        $BillRefNumber='00000';
//
//        $response=Http::withToken($accessToken)->post($url,[
//            'ShortCode'=>$ShortCode,
//            'CommandID'=>$CommandID,
//            'Amount'=>$Amount,
//            'Msisdn'=>$Msisdn,
//            'BillRefNumber'=>$BillRefNumber
//        ]);
//
//        return $response;
//
//
//    }
//
//    public function Validation(){
//        $data=file_get_contents('php://input');
//        Storage::disk('local')->put('validation.txt',$data);
//
//        //validation logic
//
//        return response()->json([
//            'ResultCode'=>0,
//            'ResultDesc'=>'Accepted'
//        ]);
//
//        /*
//        return response()->json([
//            'ResultCode'=>'C2B00011',
//            'ResultDesc'=>'Rejected'
//        ])
//        */
//    }
//
//    public function Confirmation(){
//        $data=file_get_contents('php://input');
//        Storage::disk('local')->put('confirmation.txt',$data);
//        //save data to DB
//        $response=json_decode($data);
//        $TransactionType=$response->TransactionType;
//        $TransID=$response->TransID;
//        $TransTime=$response->TransTime;
//        $TransAmount=$response->TransAmount;
//        $BusinessShortCode=$response->BusinessShortCode;
//        $BillRefNumber=$response->BillRefNumber;
//        $InvoiceNumber=$response->InvoiceNumber;
//        $OrgAccountBalance=$response->OrgAccountBalance;
//        $ThirdPartyTransID=$response->ThirdPartyTransID;
//        $MSISDN=$response->MSISDN;
//        $FirstName=$response->FirstName;
//        $MiddleName=$response->MiddleName;
//        $LastName=$response->LastName;
//
//        $c2b=new C2brequest;
//        $c2b->TransactionType=$TransactionType;
//        $c2b->TransID=$TransID;
//        $c2b->TransTime=$TransTime;
//        $c2b->TransAmount=$TransAmount;
//        $c2b->BusinessShortCode=$BusinessShortCode;
//        $c2b->BillRefNumber=$BillRefNumber;
//        $c2b->InvoiceNumber=$InvoiceNumber;
//        $c2b->OrgAccountBalance=$OrgAccountBalance;
//        $c2b->ThirdPartyTransID=$ThirdPartyTransID;
//        $c2b->MSISDN=$MSISDN;
//        $c2b->FirstName=$FirstName;
//        $c2b->MiddleName=$MiddleName;
//        $c2b->LastName=$LastName;
//        $c2b->save();
//
//
//        return response()->json([
//            'ResultCode'=>0,
//            'ResultDesc'=>'Accepted'
//        ]);
//
//    }
//
//    public function qrcode(){
//        $consumerKey=\config('safaricom.consumer_key');
//        $consumerSecret=\config('safaricom.consumer_secret');
//
//        $authUrl='https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
//
//        $request=Http::withBasicAuth($consumerKey,$consumerSecret)->get($authUrl);
//
//        $accessToken=$request['access_token'];
//
//        $MerchantName='ESKULI REVISION';
//        $RefNo='gggsgsgg';
//        $Amount=1;
//        $TrxCode='PB'; //BG-buy goods till, WA-mpesa agent, SM-send money, SB-send to business
//        $CPI=572555;
//
//        $url='https://api.safaricom.co.ke/mpesa/qrcode/v1/generate';
//
//        $response=Http::withToken($accessToken)->post($url,[
//            'MerchantName'=>$MerchantName,
//            'RefNo'=>$RefNo,
//            'Amount'=>$Amount,
//            'TrxCode'=>$TrxCode,
//            'CPI'=>$CPI
//        ]);
//
//        $data=$response['QRCode'];
//
//        return view('welcome')->with('qrcode',$data);
//
//    }
//
//
//    public function Reversal(){
//        $accessToken=$this->token();
//        $InitiatorPassword='Safaricom123!';
//        $path=Storage::disk('local')->get('SandboxCertificate.cer');
//        $pk=openssl_pkey_get_public($path);
//
//        openssl_public_encrypt(
//            $InitiatorPassword,
//            $encrypted,
//            $pk,
//            $padding=OPENSSL_PKCS1_PADDING
//
//        );
//
//        //$encrypted
//        $SecurityCredential=base64_encode($encrypted);
//        $CommandID='TransactionReversal';
//        $TransactionID='RAF31LULEV';
//        $TransactionAmount=3000;
//        $ReceiverParty=600998;
//        $ReceiverIdentifierType=11;
//        $ResultURL='https://a80a-197-156-137-172.sa.ngrok.io/payments/reversalResult';
//        $QueueTimeOutURL='https://a80a-197-156-137-172.sa.ngrok.io/payments/reversalTimeout';
//        $Remarks='remarks';
//        $Occassion='occassion';
//        $Initiator='testapi';
//
//        $url='https://sandbox.safaricom.co.ke/mpesa/reversal/v1/request';
//
//        $response=Http::withToken($accessToken)->post($url,[
//            'Initiator'=>$Initiator,
//            'SecurityCredential'=>$SecurityCredential,
//            'CommandID'=>$CommandID,
//            'TransactionID'=>$TransactionID,
//            'Amount'=>$TransactionAmount,
//            'ReceiverParty'=>$ReceiverParty,
//            'ReceiverIdentifierType'=>$ReceiverIdentifierType,
//            'ResultURL'=>$ResultURL,
//            'QueueTimeOutURL'=>$QueueTimeOutURL,
//            'Remarks'=>$Remarks,
//            'Occassion'=>$Occassion
//        ]);
//
//        return $response;
//
//    }
//
//    public function reversalResult(){
//        $data=file_get_contents('php://input');
//        Storage::disk('local')->put('reversalResult.txt',$data);
//    }
//    public function reversalTimeout(){
//        $data=file_get_contents('php://input');
//        Storage::disk('local')->put('reversalTimeout.txt',$data);
//    }
}
