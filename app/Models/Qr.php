<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qr extends Model
{
    use HasFactory;
    protected $table = 'qrcode_details';
    protected $fillable = ['label', 'first_name', 'last_name', 'biography', 'user_plan_id', 'user_id', 'audio_id', 'profile_image', 'bg_image', 'is_new'];

    // Define any relationships with other models, for example:
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function images()
    {
        return $this->hasMany(QrImage::class);
    }
    
    public function videos()
    {
        return $this->hasMany(QrVideo::class);
    }
}
