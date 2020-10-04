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

                                    <!-- <div class='w-full md:w-full px-3 mb-6'> -->
                                        <label for="machine" class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'>Machine</label>
                                        <div class="flex-shrink w-full inline-block relative">
                                            <select id="machine" name="machine_id" value="{{ old('machine_id') }}"
                                                class="block appearance-none text-gray-600 w-full bg-white border border-gray-400 shadow-inner px-4 py-2 pr-8 rounded">
                                                <option></option>
                                                @foreach($machines as $machine)

                                                    <option value="{{ $machine->id }}" 
                                                        @if( old('machine_id') == $machine->id ) selected @endif
                                                        >Model: {{ $machine->model }} Owner: {{ $machine->owner }}</option>

                                                @endforeach
                                                
                                                <!-- <option @if( old('type') == "Plotter" ) selected @endif >Plotter</option> -->
                                            </select>
                                            <div class="pointer-events-none absolute top-0 mt-3  right-0 flex items-center px-2 text-gray-600">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                            </div>
                                        </div>
                                    <!-- </div> -->
                                    @error('machine_id')
                                        <div class="text-red-600">{{ $message }}</div>
                                    @enderror

                                    <!-- <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="trademark" type="text"> -->

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