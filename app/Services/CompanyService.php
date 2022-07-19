<?php

namespace App\Services;

use App\Models\Company;
use Illuminate\Support\Collection;
use Illuminate\Session\SessionManager;
use Spatie\Permission\Models\Permission;

class CompanyService {
    public const  MAX_PERCENT = 100;
    public const MIN_PERCENT = 0;

// checkIfCanPay : run all method to check if  Data Correct
// checkPercent : check if percent between 0 - 100
// bigPercent : to return condition bigger value allowable
// minPercent : to return condition min value allowable
// setPermissions : when create new company should add permisson
// createCompany : to create new company 

    public function checkIfDataCorrect($request){
        $checkPercent = $this->checkPercent($request); 
        if( $checkPercent){
            return true;
        }
        return false;
    }

    public function checkPercent($request){
        if( $this->bigPercent($request)){
            return false;
        }
        if($this->lessPercent($request)){
            return false;
        }
        return true;
    }

    public function bigPercent($request){
        return $request->type_fee == "percent" && $request->fee > self::MAX_PERCENT;
     }
     public function lessPercent($request){
        return $request->type_fee == "percent" && $request->fee < self::MIN_PERCENT;
     }

    public function setPermissions(string $name){
        $permissions = [
            $name.'-list',
            $name.'-create',
            $name.'-edit',
            $name.'-delete'
           
         ];
      
         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }

    }

        public function createCompany($request){
            Company::create($request->only(['name','state','fee','type_fee','url_api','api_key','message','data','note']));
        }


       

       


    }







     