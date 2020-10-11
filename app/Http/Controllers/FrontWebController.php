<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use Illuminate\Http\Request;

class FrontWebController extends Controller
{
    //

    public static function index()
    {
        $machines = Machine::all();
        return view('frontweb.index', [
            'machines' => $machines
        ]);
    }


}
