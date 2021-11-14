<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'user_id', 'mobile', 'gender', 'birth_date',
        'profile_pic', 'district_id', 'blood_group', 'donate_status', 'last_donate'];
}
