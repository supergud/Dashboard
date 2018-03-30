<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'stores';

    protected $monthly_revenues;

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
        $monthly_revenues = $this->orders()->selectRaw("*, DATE_FORMAT(created_at,'%Y.%m') as months")->get();

        $months = [];

        foreach ($monthly_revenues as $monthly_revenue) {
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
            $monthly_revenues = $this->getMonthlyRevenuesAttribute();
        }
        else {
            $monthly_revenues = $this->monthly_revenues;
        }

        $data = new \stdClass;

        $data->label = $monthly_revenues->label;
        $data->data  = [];

        $sum = 0;

        foreach ($monthly_revenues->data as $monthly_revenue_data) {
            $sum += $monthly_revenue_data;

            $data->data[]  = $sum;
        }

        return $data;
    }
}
