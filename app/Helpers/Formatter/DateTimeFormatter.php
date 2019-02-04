<?php
/**
 * Created by PhpStorm.
 * User: PhuongNKV
 * Date: 11/7/2018
 * Time: 8:37 PM
 */

namespace App\Helpers\Formatter;

use Carbon\Carbon;

trait DateTimeFormatter
{
    /**
     * @param Carbon $date
     * @return string
     */
    public static function dateTimeFormat(Carbon $date)
    {
        $date->setTimezone(config('app.timezone'));
        return $date->format(config('settings.date_time_format'));
    }

    /**
     * @param Carbon $date
     * @return string
     */
    public static function dateFormat(Carbon $date)
    {
        $date->setTimezone(\Config::get('app.timezone'));
        return $date->format(\Config::get('settings.date_format'));
    }
}