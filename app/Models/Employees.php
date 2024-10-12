<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;
    protected $fillable=[
        'id','name', 'gender ','address ','marital_status ','birthday','department ','position ','account_number ',
        'mobile ', 'email '
    ];
    
}
