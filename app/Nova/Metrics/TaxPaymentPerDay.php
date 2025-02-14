<?php

namespace App\Nova\Metrics;

use App\Models\Carpayment;
use App\Models\Withholdingtax;
use Illuminate\Http\Request;
use Laravel\Nova\Metrics\Trend;


class TaxPaymentPerDay extends Trend
{
    /**
     * Calculate the value of the metric.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function calculate(Request $request)
    {
        return $this->sumByDays($request, Withholdingtax::class, 'pay_amount', 'pay_date')
            ->showSumValue()
            ->format('0,0.00');
    }

    /**
     * Get the ranges available for the metric.
     *
     * @return array
     */
    public function ranges()
    {
        return [

            30 => '30 วัน',
            60 => '60 วัน',
            365 => '365 วัน',
        ];
    }

    /**
     * Determine for how many minutes the metric should be cached.
     *
     * @return  \DateTimeInterface|\DateInterval|float|int
     */
    public function cacheFor()
    {
        return now()->addMinutes(5);
    }

    /**
     * Get the URI key for the metric.
     *
     * @return string
     */
    public function uriKey()
    {
        return 'tax-payment-per-day';
    }
    public function name()
    {
        return 'ยอดจ่ายเงินอื่นๆ(หัก ณ ที่จ่าย)';
    }
}
