<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;
use App\Services\CompanyService;

class CompanyController extends Controller
{ 
    
    protected $companyService;

    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $companies = Company::orderBy('id','DESC')->paginate(5);
        return view('company.index',compact('companies'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {

       
        if($this->companyService->checkIfDataCorrect($request)){
            $this->companyService->setPermissions($request->name);
            $this->companyService->createCompany($request);
            
            return redirect()->back()
            ->with('success', 'Company was created successfully!');
        }
        return redirect()->back()
        ->with('error', 'The percent should be between 0-100 !');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    { 
        return view('company.show',compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    { 
        return view('company.edit',compact('company'));
    }
 
    public function update(CompanyRequest $request, Company $company)
    {
        if($this->companyService->checkIfDataCorrect($request)){
            $company->update($request->all());
            return redirect()->route('companies.index')
            ->with('success','Company updated successfully');
        }
        return redirect()->back()
        ->with('error', 'The percent should be between 0-100 !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {  
        $company->delete();
        return redirect()->back()
        ->with('success', 'success deleted !');
    }
}
