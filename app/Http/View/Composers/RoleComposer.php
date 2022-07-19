<?php

namespace App\Http\View\Composers;
 
use Spatie\Permission\Models\Role;
use Illuminate\View\View;
class RoleComposer
{
    public function compose(View $view)
    { 
        $view->with('roles', Role::pluck('name','name')->all());
    }
}