<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'stores';

    protected $orders;

    protected $monthly_revenues;

    protected $monthly_orders;

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
        if (!$this->orders)
        {
            $this->orders = $this->orders()->selectRaw("*, DATE_FORMAT(created_at,'%Y.%m') as months")->get();
        }

        $months = [];

        foreach ($this->orders as $monthly_revenue) {
            if (!isset($months[$monthly_revenue->months])) {
                $months[$monthly_revenue->months] = 0;
            }

            $months[$monthly_revenue->months] += $monthly_revenue->total_amount;
        }

        $data = new \stdClass;

        $data->label = [];
        $data->data  = [];

        foreach ($months as $label => $month) {
            $data->label[] = $label;
            $data->data[]  = $month;
        }

        $this->monthly_revenues = $data;

        return $data;
    }

    public function getTotalTurnoversAttribute()
    {
        if (!$this->monthly_revenues)
        {
            $this->monthly_revenues = $this->getMonthlyRevenuesAttribute();
        }

        $data = new \stdClass;

        $data->label = $this->monthly_revenues->label;
        $data->data  = [];

        $sum = 0;

        foreach ($this->monthly_revenues->data as $monthly_revenue_data) {
            $sum += $monthly_revenue_data;

            $data->data[]  = $sum;
        }

        return $data;
    }

    public function getMonthlyOrdersAttribute()
    {
        if (!$this->orders)
        {
            $this->orders = $this->orders()->selectRaw("*, DATE_FORMAT(created_at,'%Y.%m') as months")->get();
        }

        $months = [];

        foreach ($this->orders as $monthly_revenue) {
            if (!isset($months[$monthly_revenue->months])) {
                $months[$monthly_revenue->months] = 0;
            }

            $months[$monthly_revenue->months]++;
        }

        $data = new \stdClass;

        $data->label = [];
        $data->data  = [];

        foreach ($months as $label => $month) {
            $data->label[] = $label;
            $data->data[]  = $month;
        }

        $this->monthly_orders = $data;

        return $data;
    }

    public function getTotalOrdersAttribute()
    {
        if (!$this->monthly_orders)
        {
            $this->monthly_orders = $this->getMonthlyOrdersAttribute();
        }

        $data = new \stdClass;

        $data->label = $this->monthly_orders->label;
        $data->data  = [];

        $sum = 0;

        foreach ($this->monthly_orders->data as $monthly_order_data) {
            $sum += $monthly_order_data;

            $data->data[]  = $sum;
        }
        
        return $data;
    }
}
