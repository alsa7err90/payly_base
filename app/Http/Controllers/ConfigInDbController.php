<?php

namespace App\Http\Controllers;

use App\Models\ConfigInDb;
use Illuminate\Http\Request;

class ConfigInDbController extends Controller
{

    // to set new config
    //     ConfigInDb::create([
    //     'key' => 'example',
    //     'value' => 'Hello World',
    // ]);

    // to get config
    // $v = config('configInDb.example');
    // dd($v);

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    
        $data = ConfigInDb::orderBy('id','DESC')->paginate(15);
        return view('config.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
         
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'key' => 'required',
            'value' => 'required'
          
        ]);
    
        $input = $request->all();
          
        $user = ConfigInDb::create($input);
        
        return redirect()->route('configurations.index')
                        ->with('success','Config created successfully');
    }
 
     
    public function update(Request $request)
    {  
    
        $inputs = $request->all(); 
        $request->only(['_token', '_method']);
         foreach ($inputs as  $key=>$value){ 
            if(!config('configInDb.'.$key) == null){
                if(config('configInDb.'.$key) != $value)
              ConfigInDb::where('key', $key)->update(['value'=>$value]);

            }
         } 
        return redirect()->route('configurations.index')
                        ->with('success','Config updated successfully');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ConfigInDb::find($id)->delete();
        return redirect()->route('configurations.index')
                        ->with('success','User deleted successfully');
    }

    
  

}
