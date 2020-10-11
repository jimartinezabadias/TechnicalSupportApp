<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use Illuminate\Http\Request;

class FrontWebController extends Controller
{
    //

    public static function index()
    {
        $machines = Machine::paginate(5);
        return view('frontweb.index', [
            'machines' => $machines
        ]);
    }


}
