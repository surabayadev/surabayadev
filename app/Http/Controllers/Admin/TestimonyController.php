<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class TestimonyController extends Controller
{
    public function index()
    {
        $testimonies = '';
        $data = [
            'title' => 'Manage Testimonies',
            'testimonies' => $testimonies
        ];
        return view('admin::contents.testimonies.index', $data);
    }
}
