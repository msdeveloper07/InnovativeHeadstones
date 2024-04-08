<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPlan extends Model
{
    use HasFactory;
    protected $table = 'users_plan';
    protected $fillable = ['plan_id','user_id','start_date', 'end_date', 'created_at'];
    
}
