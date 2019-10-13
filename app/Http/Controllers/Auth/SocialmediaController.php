<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Auth\Factory\SocialMediaFactory;

class SocialmediaController extends Controller
{
    public function callback(string $type)
    {
        $response = SocialMediaFactory::make($type)->redirect();
        dd($response);
        $this->updateDatabase($response);
        return redirect()->back();
    }

    public function updateDatabase(array $data): void
    {
        $user = User::findOrFail(auth()->user()->id);
        $user->update($data);
    }
}
