<?php

namespace App\Http\Controllers;

use App\Models\ConfigInDb;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Requests\ConfigRequest;
use App\Services\ConfigService;

class ConfigInDbController extends BaseController
{
    // index  
    // store 
    // edit
    // update
    // destroy
    protected $configService;

    public function __construct(ConfigService $configService)
    {
        $this->configService = $configService;
    }

    // to set new config
    //     ConfigInDb::create([
    //     'key' => 'example',
    //     'value' => 'Hello World',
    // ]);

    // to get config
    // $v = config('configInDb.example');
    // dd($v);

     
    public function index(Request $request)
    {
    
        $data = ConfigInDb::orderBy('id','DESC')->paginate(15);
        return view('config.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    } 
    public function store(ConfigRequest $request)
    { 
        $input = $request->all(); 
        $user = ConfigInDb::create($input); 
        return $this->redirectBackSuccess("success store"); 
    } 

    public function update(Request $request)
    {    
        $inputs = $request->all(); 
         $request->only(['_token', '_method']);
        $this->configService->updateAllConfig($inputs);
        return $this->redirectBackSuccess("success update");
                        
    }
 
    public function destroy($id)
    {
        ConfigInDb::find($id)->delete();
        return $this->redirectBackSuccess("success deleted ");
    }
 
}
