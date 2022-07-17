<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Company extends Model
{
    use HasFactory;
    protected $guarded = [];  
    
    public function cards(): HasOne 
{
    return $this->hasOne(Card::class);
}
}
