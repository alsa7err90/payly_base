<?php

 namespace App\CompanyClasses;

use App\Interfaces\PayoutInterface;
use App\Models\Card;
use App\Models\Company;
use App\Models\User;

class Paypal implements PayoutInterface
{
    // $data : data from user - All the data we need to send payout
    //  $company_data : all data company as fee,api_key,url_api ...
    // 
    private const  COMPANY = "Paypal";
    private $data;
    private $user;
    private $company_data;  
    private $new_balnce;
    public function __construct($data)
    {
        $this->data = $data; 
        // get data company
        $this->getDataCompany();  
        // get data user
        $this->getDataUser(); 
        
    }

    

    private function setNewBalnceUser(){
        $old_balnc =  $this->user->balnce;
        $this->new_balnce = $old_balnc - $this->data['amount'] ; 
    }
    private function discountFromBlanceUser()
    {
        $user =  User::whereId($this->user->id)->update(['balnce' => $this->new_balnce]);
       
    }
    ////////////// add cards tomorrow
    
    public function checkCardExists(){
        $amount =  $this->data['amount'];
        $type_card =  $this->data['type_card'];
        $company_id = $this->getIdCompany($type_card);
        $card = Card::whereCompanyId($company_id)->whereAmount($amount)->first();
        if ($card === null) { 
            return false;
         }
         return  true;
        }

    public function getIdCompany($type_card){
        return   Company::whereName($type_card)->first()->id;
    }
    private function amountWillPay()
    {
        $fee = $this->company_data->fee;
        $type_fee = $this->company_data->type_fee;
        $this->amount_will_pay = $this->CalculationPercent($type_fee,$fee);
        
       
    }
    
    public function CalculationPercent($type_fee,$fee){
        if( $type_fee == "percent"){
            $dicountFee =  ($this->data['amount'] * $fee)/100;
           return  $this->data['amount'] - $dicountFee;
          } 
          else{
            return  $this->data['amount'] - $fee;
          } 
           
    }

    private function getDataCompany()
    {
       $this->company_data = Company::whereName(self::COMPANY)->first();
    }
    private function getDataUser()
    { 
      $id =  auth()->user()->id;
       $this->user = User::whereId($id)->first();
    }
    

    public function payout()
    {
        // check if card exists 
        if(!$this->checkCardExists()) return "error 91";
         // calc new balne user  after discount amount Will Pay with  fee
        $this->setNewBalnceUser(); 
        // update balnce account company 
        $this->discountFromBlanceUser(); 
        // get data user after update new balnce  
        $this->getDataUser();
        // dicount fee from amount 
        $this->amountWillPay();

         return  "done";
    }

}
