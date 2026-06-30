<?php

use App\Models\SiteSetting;

if (!function_exists('setting')) {
    /**
     * Helper to retrieve cached site settings.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    function setting(string $key, $default = null)
    {
        return SiteSetting::get($key, $default);
    }
}
