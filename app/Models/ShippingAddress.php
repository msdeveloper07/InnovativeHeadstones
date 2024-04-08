<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    use HasFactory;
    protected $table = 'shipping_addresses';
    protected $fillable = ['user_id', 'recipient_name', 'address_line1', 'address_line2' ,'land_mark', 'city', 'state', 'postal_code', 'country', 'is_default'];

}
