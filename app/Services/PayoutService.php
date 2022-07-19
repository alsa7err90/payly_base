<?php

namespace App\Services;
 
class PayoutService {

    // checkIfCanPayout : run all function to check if user can payout
    // checkHaveBalnce :   function to check if have enough balnce
    // getkBalnceUser :  function to get balnce user
    // checkStateUser : to check if account user Enabled

    public function checkIfCanPayout($request){
       if(!$this->checkHaveBalnce($request)){
        return "You do not have enough balnce";
       }
       
       if(!$this->checkStateUser()){
        return "Your account is banned";
       }
       return true;
    }

    public function checkHaveBalnce($request)
    {
        $amount = $request->amount;
        $BalnceUser = $this->getkBalnceUser();
        if($amount > $BalnceUser){
            return false;
        }
        return true;
        
    } 
    public function getkBalnceUser()
    {   $user = auth()->user();
        return $user['balnce'];
    } 

    public function checkStateUser(){
        $user = auth()->user();
         if($user['state'] == 0){
            return false;
         }
         return true;
    }

    

}
