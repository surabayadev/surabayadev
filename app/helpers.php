<?php

if (!function_exists('theme_asset')) {
    /**
     * Generate an active theme asset path for the application.
     *
     * @param  string  $path
     * @return string
     */
    function theme_asset($path, $secure = null)
    {
        $path = ($path ? DIRECTORY_SEPARATOR.ltrim($path, DIRECTORY_SEPARATOR) : $path);
        return asset('themes/' . config('surabayadev.theme') . $path, $secure);
    }
}

if (!function_exists('admin_asset')) {
    /**
     * Generate an admin asset path for the application.
     *
     * @param  string  $path
     * @return string
     */
    function admin_asset($path, $secure = null)
    {
        $path = ($path ? DIRECTORY_SEPARATOR.ltrim($path, DIRECTORY_SEPARATOR) : $path);
        return asset('admin-assets' . $path, $secure);
    }
}

if (!function_exists('theme_assets_path')) {
    /**
     * Get the path to the active theme asstes folder.
     *
     * @param  string  $path
     * @return string
     */
    function theme_assets_path($path = '')
    {
        return public_path('themes/' . config('surabayadev.theme')) . ($path ? DIRECTORY_SEPARATOR.ltrim($path, DIRECTORY_SEPARATOR) : $path);
    }
}

if (!function_exists('theme_view_path')) {
    /**
     * Get the path to the active theme asstes folder.
     *
     * @param  string  $path
     * @return string
     */
    function theme_view_path($path = '')
    {
        return resource_path('views/themes/' . config('surabayadev.theme') . '/assets') . ($path ? DIRECTORY_SEPARATOR.ltrim($path, DIRECTORY_SEPARATOR) : $path);
    }
}

if (!function_exists('avatar')) {
    /**
     * Get user avatar by email
     *
     * @param  string  $email
     * @return string
     */
    function avatar($email, $size = '180')
    {
        return 'http://www.gravatar.com/avatar/'. md5($email) .'?s='. $size;
    }
}

if (!function_exists('date_formatted')) {
    /**
     * Get formatted date
     *
     * @param Carbon\Carbon $dt
     * @param null|boolean $asHuman
     * @return string
     */
    function date_formatted($dt, $asHuman = null)
    {
        if (is_null($asHuman)) {
            return ($dt->diffInDays(now()) < 6) ? $dt->diffForHumans() : $dt->format('M j, Y - H:i');
        }

        return !$asHuman ? $dt->format('M j, Y - H:i') : $dt->diffForHumans();
    }
}

if (!function_exists('get_image')) {
    /**
     * Get image
     *
     * @param string $img
     * @return string
     */
    function get_image($img)
    {
        if (filter_var($img, FILTER_VALIDATE_URL)) {
            return $img;
        }
        
        // [coming soon]
        // implement to load to our storage
        throw new \Exception("Oh Prend, ini masih coming soon", 1);
    }
}
