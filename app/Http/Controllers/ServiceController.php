<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Machine;
use App\Http\Requests\CreateServiceRequest;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $services = Service::with('machine')->paginate(10);
        return view('services.index', [ 'services' => $services ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $machines = Machine::all();
        return view('services.create', [ 'machines' => $machines ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateServiceRequest $request)
    {
        //
        $input = $request->all();
        Service::create($input);
        return redirect('services');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
        return view( 'services.show', [ 'service' => $service ] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
        $machines = Machine::all();
        return view('services.edit', [
            'service' => $service,
            'machines' => $machines ] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(CreateServiceRequest $request, Service $service)
    {
        //
        $input = $request->all();
        $service->machine_id = $input['machine_id'];
        $service->date = $input['date'];
        $service->failure = $input['failure'];
        $service->price = $input['price'];
        $service->failure_description = $input['failure_description'];
        $service->service_description = $input['service_description'];
        $service->save();
        return redirect('services');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
        $service->delete();
        return redirect('services');
    }
}
