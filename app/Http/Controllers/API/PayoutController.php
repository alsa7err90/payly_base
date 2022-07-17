<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator; 
use App\Services\PayoutService;

class PayoutController extends BaseController
{
    protected $payoutService;

    public function __construct(PayoutService $payoutService)
    {
        $this->payoutService = $payoutService;
    }
 
    public function pay(Request $request)
    {
        $use = 'App\CompanyClasses\\';
        $amount = $request->amount;
        $type_card = $request->type_card;
        $payout =$use.$type_card;
         $data = (array) $request->all();
         
        $checkIfCanPayout =$this->payoutService->checkIfCanPayout($request);
        if($checkIfCanPayout === true){
            $type_pay = new $payout($data);
            return $type_pay->payout();
        }
        else{
           return  $checkIfCanPayout;
        }
         
    }

    
    
    
    


}