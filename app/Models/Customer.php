<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name','address','phone_number','email','contact_person','is_active'];
    protected $casts = ['is_active' => 'boolean'];
    public function sale(){
        return $this -> hasMany(Sale::class); 
    }
}

