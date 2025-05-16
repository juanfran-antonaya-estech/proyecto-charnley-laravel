<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HospitalFloorLinesController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        echo "Hospital Floor Lines Controller";
    }
}
