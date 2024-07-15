<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'employee_id',
        'last_name',
        'first_name',
        'position',
        // Add other fields as needed
    ];


}
