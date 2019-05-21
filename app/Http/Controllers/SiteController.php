<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function about()
    {
        $data = [
            'title' => 'About'
        ];
        return view('theme::contents.about', $data);
    }
}
