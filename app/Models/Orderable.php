<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orderable extends Model
{
    protected $table = 'orderables';

    public function getTotalPriceAttribute()
    {
        return $this->unit_price * $this->quantity + $this->variation_additional_price;
    }

    public function scopeNotVariations($query)
    {
        return $query->where('orderable_type', '!=', 'App\\Models\\Variation');
    }
}
