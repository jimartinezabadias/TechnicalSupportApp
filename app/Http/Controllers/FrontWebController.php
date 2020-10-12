<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use Illuminate\Http\Request;

class FrontWebController extends Controller
{
    //

    public static function index(Request $request)
    {
        $search = $request->get('search');

        $machines = Machine::where('type','iLIKE', $search)
            ->orWhere('owner','iLIKE', $search)
            ->orWhere('model','iLIKE', $search)
            ->paginate(10);
        
        return view('frontweb.index', [
            'machines' => $machines
        ]);
    }


}
