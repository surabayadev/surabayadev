<?php

namespace App\Http\Controllers;

use App\Models\Testimony;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonies = Testimony::where('status', 1)->latest()->limit(3)->get();
        $data = [
            'title' => 'Home',
            'testimonies' => $testimonies
        ];
        return view('theme::contents.home', $data);
    }
}
