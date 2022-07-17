<?php

namespace App\Services;

use App\Models\Card;
use App\Models\Company;
use App\Models\ConfigInDb;
use Illuminate\Support\Collection;
use Illuminate\Session\SessionManager;
use Spatie\Permission\Models\Permission;

class ConfigService {
   
   
    public function updateAllConfig($inputs){
        foreach ($inputs as  $key=>$value){ 
            if(!config('configInDb.'.$key) == null && config('configInDb.'.$key) != $value){
                ConfigInDb::where('key', $key)->update(['value'=>$value]);
            }
         } 
    }
}
 