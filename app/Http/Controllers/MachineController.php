<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use App\Http\Requests\CreateMachineRequest;
use Illuminate\Http\Request;

class MachineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $machines = Machine::paginate(10);
        return view('machines.index', [
            'machines' => $machines
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('machines.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMachineRequest $request)
    {
        //
        $input = $request->all();
        Machine::create($input);
        return redirect('machines');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Machine  $machine
     * @return \Illuminate\Http\Response
     */
    public function show(Machine $machine)
    {
        //
        $machineWithCategory = Machine::with('services')->find($machine->id);
        return view('machines.show', [ 'machine' => $machineWithCategory ] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Machine  $machine
     * @return \Illuminate\Http\Response
     */
    public function edit(Machine $machine)
    {
        //
        return view('machines.edit', ['machine' => $machine] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Machine  $machine
     * @return \Illuminate\Http\Response
     */
    public function update(CreateMachineRequest $request, Machine $machine)
    {
        //
        $input = $request->all();
        $machine->owner = $input['owner'];
        $machine->type = $input['type'];
        $machine->model = $input['model'];
        $machine->trademark = $input['trademark'];
        $machine->save();
        return redirect('machines');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Machine  $machine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Machine $machine)
    {
        //
        foreach ($machine->services as $service) {
            # code...
            $service->delete();
        }
        $machine->delete();
        return redirect('machines');
    }
}
