<?php

if (!function_exists('getImgAvatar')) {
    /**
     * Get image avatar from given email
     *
     * @param  string $email
     * @return string
     */
    function getImgAvatar($email, $size = 150)
    {
        $grav_url = "//www.gravatar.com/avatar/" . md5(strtolower(trim($email))) . "?s=" . $size;
        return $grav_url;
    }
}
