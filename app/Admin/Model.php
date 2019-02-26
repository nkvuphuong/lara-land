<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 2/4/2019
 * Time: 7:55 PM
 */

namespace App\Admin;

use App\Helpers\Formatter\Admin\UrlFormatter;

class Model extends \App\Model
{
    use UrlFormatter {routeUrl as traitRouteUrl;}

    public static $newRouteUrl;

    public static function routeUrl($act = null, $params = null, $additionals = [])
    {
        static::$routeUrl = static::$newRouteUrl;
        return static::traitRouteUrl($act, $params, $additionals);
    }

    /**
     * @param array $ids
     * @param $field
     * @param $value
     * @return mixed
     */
    public static function bulkChangeStatus($ids, $field, $value)
    {
        return static::whereIn('id', $ids)
            ->update([$field => $value]);
    }

    /**
     * @param array $ids
     * @param $value
     * @return bool
     */
    public static function bulkChangeDisplayStatus($ids, $value)
    {
        return static::bulkChangeStatus($ids, 'display_status', $value);
    }

    /**
     * @param array $ids
     * @return bool
     */
    public static function bulkShowDisplayStatus($ids = [])
    {
        return static::bulkChangeDisplayStatus($ids, 1);
    }

    /**
     * @param array $ids
     * @return bool
     */
    public static function bulkHideDisplayStatus($ids = [])
    {
        return static::bulkChangeDisplayStatus($ids, 0);
    }
}