<?php

namespace App\Http\View\Composers;

use App\Models\Company;
use Illuminate\View\View;
class CompanyComposer
{
    public function compose(View $view)
    {
        $companies = Company::all(); 
        $select = [];
        foreach($companies as $company){
            $select[$company->id] = $company->name;
        } 
        $view->with('select', $select);
    }
}