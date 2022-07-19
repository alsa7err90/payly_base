<?php

namespace App\Services;

use App\Models\Card; 

class CardService {
    
    // uploadImage
    // createCard
    public function uploadImage($request){
        $fileName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('uploads'), $fileName);
        $data = $request->all();
        $data['image'] = $fileName; 
        return $data;
    }
 
    public function createCard($request){
        Card::create($request);
    }

}
 