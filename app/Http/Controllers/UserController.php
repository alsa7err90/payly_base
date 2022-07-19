<?php   
namespace App\Http\Controllers;
    
use Illuminate\Http\Request; 
use App\Http\Requests\UserRequest; 
use App\Models\User; 
use DB;
use App\Http\Controllers\BaseController as BaseController;
use App\Services\UserService;

class UserController extends BaseController
{ 
    // index 
    // create
    // store
    // show
    // edit
    // update
    // destroy
    protected $userService; 
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    } 

    public function index(Request $request)
    { 
        $data = User::orderBy('id','DESC')->paginate(5);
        return view('users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
 
    public function create()
    { 
        return view('users.create');
    }
 
    public function store(UserRequest $request)
    { 
        $this->companyService->createUser($request); 
        return $this->redirectBackSuccess("User created successfully"); 
    }
 
    public function show($id)
    {
       if(!$this->checkItem("User",$id)){
        return $this->redirectBackError("user not found !");
       }
        $user = User::find($id); 
            return view('users.show',compact('user')); 
    }
 
    public function edit($id)
    {
        if(!$this->checkItem("User",$id)){
         return $this->redirectBackError("user not found !");
        }
        $user = User::find($id); 
        $userRole = $user->roles->pluck('name','name')->all();
    
        return view('users.edit',compact('user','userRole'));
    }
 
    public function update(UserRequest $request, $id)
    { 
        if(!$this->checkItem("User",$id)){
         return $this->redirectBackError("user not found !");
        }
        $input = $request->all();
        $this->companyService->updatePassword($input); 
        $this->companyService->updateUser($request,$input, $id); 
        return $this->redirectBackSuccess("User updated successfully");  
    }
 
    public function destroy($id)
    {
        if(!$this->checkItem("User",$id)){
         return $this->redirectBackError("user not found !");
        }
        User::find($id)->delete();
        return $this->redirectBackSuccess("User deleted successfully");   
    }
}