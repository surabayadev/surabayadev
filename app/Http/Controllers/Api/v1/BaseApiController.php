<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;

abstract class BaseApiControlleraaa extends Controller
{
    use DispatchesJobs, ValidatesRequests;
}