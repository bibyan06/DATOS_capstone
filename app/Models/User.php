<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    protected $table = 'users';

    protected $primaryKey = 'user_id';

    public $incrementing = true; 

    protected $keyType = 'int'; 

    protected $fillable = [
        'employee_id',
        'last_name',
        'first_name',
        'middle_name',
        'age',
        'gender',
        'phone_number',
        'home_address',
        'email',
        'college',
        'username',
        'password',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
     protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected $dates = [
        'email_verified_at',
        // Other dates columns...
    ];

    public function hasVerifiedEmail()
    {
        return !is_null($this->email_verified_at);
    }

    public function employee()
    {
        return $this->hasOne(Employee::class, 'employee_id', 'employee_id');
    }

    public function getRoleAttribute()
    {
        if (substr($this->employee_id, 0, 2) === '01') {
            return '001';  // Admin
        } elseif (substr($this->employee_id, 0, 2) === '02') {
            return '002';  // Office staff
        } elseif (substr($this->employee_id, 0, 2) === '03') {
            return '003';  // Dean
        }
        return 'user';
    }
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id'); 
    }

    
    public function getRoleNameAttribute()
    {
        return $this->role ? $this->role->name : 'user';
    }

    public function documents()
    {
        return $this->hasMany(Document::class, 'uploaded_by');
    }

    public function college()
    {
        return $this->belongsTo(College::class, 'college', 'college_id');
    }

    public function forwardedDocuments()
    {
        return $this->hasMany(ForwardedDocument::class, 'forwarded_to', 'user_id'); 
    }

}
