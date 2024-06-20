<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'total_price', 'time', 'payment_status', 'payment_method'];

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'order_id', 'order_id');
    }


}