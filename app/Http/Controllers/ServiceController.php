<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Machine;
use App\Http\Requests\CreateServiceRequest;
use Illuminate\Http\Request;
// use App\Support\CustomCollection;

class ServiceController extends Controller
{
    
    public function index(Request $request)
    {
        //

        $search = $request->get('search');

        $user = auth()->user();

        if ( $user->isAdmin() )
        {
            $services = Service::with('machine')
            ->whereHas('machine', function ($query) use ($search) {
                return $query->where('owner','iLIKE', "%{$search}%" )
                            ->orWhere('model','iLIKE', "%{$search}%" );
            })
            ->orWhere('failure','iLIKE', "%{$search}%" )
            ->orderBy('date','desc')
            ->paginate(10);
        }
        else
        {
            
            $services = Service::with('machine')
            ->whereHas('machine', function ($query) use ($user) {
                return $query->where('user_id',$user->id);
            })
            ->paginate(10);

        }

        
            
        return view('services.index', [ 'services' => $services ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($machine_id)
    {
        $machine = Machine::find($machine_id);
        return view('services.create', [ 'machine' => $machine ]);
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
        // dd($input);
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
        $this->authorize('view',$service);
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
        $this->authorize('update',$service);
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
        $this->authorize('update',$service);

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
        $this->authorize('delete',$service);
        $service->delete();
        return redirect('services');
    }
}
