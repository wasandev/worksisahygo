<?php

namespace App\Nova\Filters;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Laravel\Nova\Filters\DateFilter;

class CarpaymentToDate extends DateFilter
{
    public $name = 'ถึงวันที่';

    public function default()
    {
        return date('Y-m-d', strtotime('last day of this month'));
    }
    /**
     * Apply the filter to the given query.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(Request $request, $query, $value)
    {
        return  $query->whereDate('payment_date', '<=', $value);
    }
}
