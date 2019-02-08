<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 2/8/2019
 * Time: 8:17 PM
 */

namespace App\Helpers\Formatter\Admin;


trait StatusFormatter
{
    public static function displayStatus($status)
    {
        $status *= 1;
        return __('admin/global.display_status_' . $status);
    }

    public static function displayStatusLabel($status)
    {
        $status *= 1;
        return "<h4><span class='" . config('settings.admin.display_status.' . $status . '.class') . "'>" . static::displayStatus($status) . "</span></h4>";
    }
}