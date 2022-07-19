<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;
use App\Services\CompanyService;
use App\Http\Controllers\BaseController as BaseController;

class CompanyController extends BaseController
{ 
    // index 
    // create
    // store
    // show
    // edit
    // update
    // destroy
    
    protected $companyService;

    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }
     
    public function index(Request $request)
    {
        $companies = Company::orderBy('id','DESC')->paginate(5);
        return view('company.index',compact('companies'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

     
    public function create()
    { 
        return view('company.create');
    }

     
    public function store(CompanyRequest $request)
    {

       
        if($this->companyService->checkIfDataCorrect($request)){
            $this->companyService->setPermissions($request->name);
            $this->companyService->createCompany($request);
             
            return $this->redirectBackSuccess("success store"); 
        } 
        return $this->redirectBackError("The percent should be between 0-100 !");  

    }

     
    public function show(Company $company)
    { 
        return view('company.show',compact('company'));
    }

    
    public function edit(Company $company)
    { 
        return view('company.edit',compact('company'));
    }
 
    public function update(CompanyRequest $request, Company $company)
    {
        if($this->companyService->checkIfDataCorrect($request)){
            $company->update($request->all());
            
       return $this->redirectBackSuccess("success update");
            
        } 
        return $this->redirectBackError("The percent should be between 0-100 !");
    }
 
    public function destroy(Company $company)
    {  
        $company->delete(); 
        return $this->redirectBackSuccess("success deleted ");
    }
}
