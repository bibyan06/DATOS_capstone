<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    use HasFactory;
    protected $table = 'college';
    public $timestamps = false;
    protected $fillable = ['college_name'];

    public function users()
    {
        return $this->hasMany(User::class, 'college','college_id');
    }
        
}
