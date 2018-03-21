<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    public function orderables()
    {
        return $this->hasMany(Orderable::class);
    }

    public function getTotalAmountAttribute()
    {
        return $this->orderables()->notVariations()->get()->sum('total_price');
    }
}
