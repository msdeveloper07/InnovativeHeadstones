<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrVideo extends Model
{
    use HasFactory;
    protected $table = 'qrcode_videos';
    protected $fillable = ['qr_id','video','video_url'];
    
    public function qr()
    {
        return $this->belongsTo(Qr::class);
    }
}
