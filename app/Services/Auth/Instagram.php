<?php

namespace App\Services\Auth;

use Illuminate\Http\Request;
use App\Services\Auth\Contract\AuthSocialMedia;

class Instagram implements AuthSocialMedia
{
    const URL_ACCESS_TOKEN = 'https://api.instagram.com/oauth/access_token';

    public function redirect()
    {
        $code = ($_GET['code'] !== '' && $_GET['code'] !== null) ? $_GET['code'] : abort(404);

        $param = [
            'client_id' => config('services.instagram.client_id'),
            'client_secret' => config('services.instagram.secret_id'),
            'code' => $code,
            'grant_type' => 'authorization_code',
            'redirect_uri' => config('services.instagram.redirect_url'),
        ];

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', self::URL_ACCESS_TOKEN, [
            'form_params' => $param
        ]);

        $response = json_decode($response->getBody()->getContents(), true);
        $data = [];
        $data['instagram'] = $response['user']['id'];
        $data['instagram_token'] = $response['access_token'];

        return $data;
    }
}
