<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Machine;
use App\Models\Service;
use Illuminate\Http\Request;

class FrontWebController extends Controller
{
    //

    public static function index()
    {
        $total_clients = User::where('role','client')->count();
        $total_machines = Machine::all()->count();
        $total_services = Service::all()->count();
        
        return view('frontweb.index', [
            'total_clients' => $total_clients,
            'total_machines' => $total_machines,
            'total_services' => $total_services
        ]);
    }

}
