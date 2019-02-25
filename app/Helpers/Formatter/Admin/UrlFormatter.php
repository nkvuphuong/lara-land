<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 2/4/2019
 * Time: 7:49 PM
 */

namespace App\Helpers\Formatter\Admin;


trait UrlFormatter
{
    public static $prefixUrl = "admin.";
    public static $routeUrl = "dashboard";

    /**
     * @param $act
     * @param null $params
     * @param array $additionals
     * @return string
     */
    public static function routeUrl($act = null, $params = null, $additionals = [])
    {
        $indexUrl  = self::$prefixUrl . static::$routeUrl . ($act ? '.' . $act : '.index');
        $nonIndexUrl  = self::$prefixUrl . static::$routeUrl . ($act ? '.' . $act : '');

        $url = \Route::has($indexUrl) ? route($indexUrl, $params) : route($nonIndexUrl, $params);

        if ($additionals && is_array($additionals)) {
            $additionalUrl = [];
            foreach ($additionals as $k => $v) {
                $v = urlencode($v);
                $additionalUrl[] = "{$k}={$v}";
            }
            $url .= strpos($url, '?') !== false ? '&' . implode('&', $additionalUrl) : '?' . implode('&', $additionalUrl);
        }

        return $url;
    }

    public static function createUrl()
    {
        return self::routeUrl('create');
    }

    public static function storeUrl()
    {
        return self::routeUrl('store');
    }

    public static function editUrl($id)
    {
        return self::routeUrl('edit', $id, request(['locale']));
    }

    public static function updateUrl($id)
    {
        return self::routeUrl('update', $id);
    }

    public static function showUrl($id)
    {
        return self::routeUrl('show', $id);
    }

    public static function setShowUrl()
    {
        return self::routeUrl("set-show");
    }

    public static function setHideUrl()
    {
        return self::routeUrl("set-hide");
    }

    public static function setDeleteUrl()
    {
        return self::routeUrl("set-delete");
    }

    public static function deleteUrl($id = null, $additional = [])
    {
        return self::routeUrl('delete', $id, $additional);
    }

    public static function destroyUrl($id, $additional = [])
    {
        return self::routeUrl('destroy', $id, $additional);
    }

    public static function deleteFileUrl($id)
    {
        return self::routeUrl('delete-file', $id);
    }

    public static function indexUrl()
    {
        return self::routeUrl('index');
    }

    public static function logoutUrl()
    {
        return route('admin.logout');
    }

    public static function rootUrl()
    {
        return self::$prefixUrl . static::$routeUrl . '/';
    }

    public static function showUrlWithSlug($slug, $id)
    {
        return url(static::rootUrl() . $slug . '/' .$id);
    }
}