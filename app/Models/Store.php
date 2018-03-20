<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'stores';

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function orderables()
    {
        return $this->hasManyThrough(Orderable::class, Order::class);
    }

    public function getMonthlyRevenuesAttribute()
    {
        $monthly_revenues = new \stdClass;

        $monthly_revenues->label = [
            '2017.09',
            '2017.10',
            '2017.11',
            '2017.12',
            '2018.01',
            '2018.02',
        ];
        
        $monthly_revenues->data = [
            $this->orders()->whereYear('created_at', '2017')->whereMonth('created_at', '09')->get()->sum('total_amount'),
            $this->orders()->whereYear('created_at', '2017')->whereMonth('created_at', '10')->get()->sum('total_amount'),
            $this->orders()->whereYear('created_at', '2017')->whereMonth('created_at', '11')->get()->sum('total_amount'),
            $this->orders()->whereYear('created_at', '2017')->whereMonth('created_at', '12')->get()->sum('total_amount'),
            $this->orders()->whereYear('created_at', '2018')->whereMonth('created_at', '01')->get()->sum('total_amount'),
            $this->orders()->whereYear('created_at', '2018')->whereMonth('created_at', '02')->get()->sum('total_amount'),
        ];

        return $monthly_revenues;
    }
}
