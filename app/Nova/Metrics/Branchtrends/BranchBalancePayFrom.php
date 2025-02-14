<?php

namespace App\Nova\Metrics\Branchtrends;

use App\Models\Branch_balance;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\Trend;

class BranchBalancePayFrom extends Trend
{
    /**
     * Calculate the value of the metric.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return mixed
     */
    public function calculate(NovaRequest $request)
    {
        return $this->sumByDays($request, Branch_balance::where('branch_id', $request->resourceId), 'pay_amount', 'branchpay_date')
            ->format('0,0.00')
            ->showSumValue();
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
        // return now()->addMinutes(5);
    }
    public function name()
    {
        return 'ยอดจัดเก็บเงินปลายทาง';
    }
    /**
     * Get the URI key for the metric.
     *
     * @return string
     */
    public function uriKey()
    {
        return 'branchs-branch-balance-pay-from';
    }
}
