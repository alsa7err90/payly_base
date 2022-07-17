<?php

namespace App\Services;

use App\Models\Company;
use Illuminate\Support\Collection;
use Illuminate\Session\SessionManager;
use Spatie\Permission\Models\Permission;

class CardService {
   
    public function getSelectCompany(){
        $companies = Company::all(); 
        $select = [];
        foreach($companies as $company){
            $select[$company->id] = $company->name;
        }
        return $select;
    }

    public function uploadImage($request){
        $fileName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('uploads'), $fileName);
        $data = $request->all();
        $data['image'] = $fileName; 
        return $data;
    }

     

}
 