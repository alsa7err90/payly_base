<?php
 
namespace App\Http\Controllers; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
 
class BaseController extends Controller
{ 
  // redirectBackSuccess
  // redirectBackError
  // sendError 
    public function redirectBackSuccess($message)
    {
      return  redirect()->back()
        ->with('success', $message); 
    } 
    public function checkItem($model,$id)
    {
      $model = "App\Models\\".$model;
      $item =  $model::whereId($id)->first();
      if($item === null){
        return false;
      }
      return true;
       
    } 
    public function redirectBackError($message)
    {
      return  redirect()->back()
        ->with('error', $message); 
    } 
    public function sendError($error, $errorMessages = [], $code = 404)
    {
    	$response = [
            'success' => false,
            'message' => $error,
        ]; 
        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        } 
        return response()->json($response, $code);
    }
}