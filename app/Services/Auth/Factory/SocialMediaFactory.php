<?php

namespace App\Services\Auth\Factory;

use App\Services\Auth\Instagram;


class SocialMediaFactory
{
    public static function make(string $type)
    {
        switch ($type) {
            case 'instagram':
                return new Instagram();
            default:
                abort(404);
                break;
        }
    }
}
