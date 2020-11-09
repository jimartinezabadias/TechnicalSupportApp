<x-services>
    
    <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium text-gray-900">Create Service</h3>

                    <p class="mt-1 text-sm text-gray-600">
                        Ensure machine owner is correct.
                    </p>
                </div>
            </div>

            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="POST" action="{{ route('services.store') }}">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                
                                <div class="col-span-6 sm:col-span-4">

                                    <label class="block font-medium text-sm text-gray-700" for="machine">
                                        Machine
                                    </label>
        
                                    <input id="machine" name="machine" type="text" value="{{ $machine->owner . '\'s ' . $machine->model }}" 
                                        class="form-input rounded-md shadow-sm mt-1 block w-full" disabled>
                                    
                                    <input id="machine_id" name="machine_id" type="text" value="{{ $machine->id }}" 
                                        class="form-input rounded-md shadow-sm mt-1 block w-full hidden">

                                </div>

                                <div class="col-span-2 sm:col-span-2">
                                    
                                    <label class="block font-medium text-sm text-gray-700" for="date">
                                        Date
                                    </label>
                        
                                    <input id="date" name="date" type="date" value="{{ old('date') }}"
                                        class="form-input rounded-md shadow-sm mt-1 block w-full">
                                    
                                    @error('date')
                                        <div class="text-red-600">{{ $message }}</div>
                                    @enderror

                                </div>

                                <div class="col-span-6 sm:col-span-6">
                                    
                                    <label class="block font-medium text-sm text-gray-700" for="failure">
                                        Failure
                                    </label>
        
                                    <input id="failure" name="failure" type="text" value="{{ old('failure') }}" 
                                        class="form-input rounded-md shadow-sm mt-1 block w-full">
                                    
                                    @error('failure')
                                        <div class="text-red-600">{{ $message }}</div>
                                    @enderror
                                    
                                </div>
                                
                                <div class="col-span-2 sm:col-span-2">
                                    
                                    <label class="block font-medium text-sm text-gray-700" for="price">
                                        Price
                                    </label>
        
                                    <input id="price" name="price" type="number"
                                        value="{{ old('price') }}" 
                                        class="form-input rounded-md shadow-sm mt-1 block w-full">
                                    
                                    @error('price')
                                        <div class="text-red-600">{{ $message }}</div>
                                    @enderror
                                    
                                </div>

                                <div class="col-span-6 sm:col-span-6">
                                    
                                    <label class="block font-medium text-sm text-gray-700" for="failure_description">
                                        Failure Description
                                    </label>
        
                                    <textarea id="failure_description" name="failure_description"
                                        class="form-input rounded-md shadow-sm mt-1 block w-full">{{ old('failure_description') }}</textarea>
                                    
                                    @error('failure_description')
                                        <div class="text-red-600">{{ $message }}</div>
                                    @enderror
                                    
                                </div>

                                <div class="col-span-6 sm:col-span-6">
                                    
                                    <label class="block font-medium text-sm text-gray-700" for="service_description">
                                        Service Description
                                    </label>
        
                                    <textarea id="service_description" name="service_description"
                                        class="form-input rounded-md shadow-sm mt-1 block w-full">{{ old('service_description') }}</textarea>
                                    
                                    @error('service_description')
                                        <div class="text-red-600">{{ $message }}</div>
                                    @enderror
                                    
                                </div>

                            </div>

                        </div>

                        <div class="flex bg-white items-center justify-end px-4 py-3 text-right sm:px-6">
        
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Create Service
                            </button>
                        
                        </div>
                                    
                    </div>

                </form>
                
            </div>

        </div>
    </div>

</x-services>