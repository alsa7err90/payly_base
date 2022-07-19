<?php 
namespace App\Services;

use App\Models\User;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class UserService {

    // createUser
    // updatePassword
    //  updateUser
    public function createUser($request){
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);  
        $user = User::create($input);
        $user->assignRole($request->input('roles')); 
    }

    public function updatePassword($input){
         
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
    }

    public function updateUser($request,$input, $id){
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete(); 
        $user->assignRole($request->input('roles'));
    }
}