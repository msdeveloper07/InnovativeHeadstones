<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrImage extends Model
{
    use HasFactory;
    protected $table = 'qrcode_images';
    protected $fillable = ['qr_id','image','image_url'];

    public function qr()
    {
        return $this->belongsTo(Qr::class);
    }
    
}
