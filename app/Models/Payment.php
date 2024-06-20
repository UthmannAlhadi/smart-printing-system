<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['receipt', 'order_id', 'payment_method'];

    public function training()
    {
        return $this->hasOne(Training::class, 'order_id', 'order_id');
    }


}
