<x-machines>

    <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium text-gray-900">Edit Machine</h3>

                    <p class="mt-1 text-sm text-gray-600">
                        Ensure machine owner is correct.
                    </p>
                </div>
            </div>

            <div class="mt-5 md:mt-0 md:col-span-2">
                @if ( session('success') )
                    <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3 mb-3 sm:rounded-md" role="alert">
                        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                        <p>
                            {{ session('success') }}
                        </p>
                    </div>
                @endif
                <form method="POST" action="{{ route('machines.update', $machine->id ) }}">
                    @method('PUT')
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                
                                <div class="col-span-6 sm:col-span-4">
                                    
                                    <label class="block font-medium text-sm text-gray-700" for="owner">
                                        Owner Name
                                    </label>
                        
                                    <input id="owner" name="owner" type="text" 
                                        value="@error('owner'){{old('owner')}}@enderror{{$machine->owner}}"
                                        class="form-input rounded-md shadow-sm mt-1 block w-full">
                                    
                                    @error('owner')
                                        <div class="text-red-600">{{ $message }}</div>
                                    @enderror

                                </div>

                                <div class="col-span-6 sm:col-span-4">
                    
                                    <!-- <label class="block font-medium text-sm text-gray-700" for="type">
                                        Type
                                    </label> -->

                                    <!-- <div class='w-full md:w-full px-3 mb-6'> -->
                                        <label for="type" class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'>Type</label>
                                        <div class="flex-shrink w-full inline-block relative">
                                            <select id="type" name="type" value="{{ old('type') }}"
                                                class="block appearance-none text-gray-600 w-full bg-white border border-gray-400 shadow-inner px-4 py-2 pr-8 rounded">
                                                <option></option>
                                                <option @if($machine->type == "Printer") selected @endif >Printer</option>
                                                <option @if($machine->type == "Plotter") selected @endif >Plotter</option>
                                            </select>
                                            <div class="pointer-events-none absolute top-0 mt-3  right-0 flex items-center px-2 text-gray-600">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                            </div>
                                        </div>
                                    <!-- </div> -->
                                    @error('type')
                                        <div class="text-red-600">{{ $message }}</div>
                                    @enderror
        
                                    <!-- <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="trademark" type="text"> -->
        
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    
                                    <label class="block font-medium text-sm text-gray-700" for="model">
                                        Model
                                    </label>
        
                                    <input id="model" name="model" type="text" 
                                        value="@error('model'){{old('model')}}@enderror{{$machine->model}}" 
                                        class="form-input rounded-md shadow-sm mt-1 block w-full">
                                    
                                    @error('model')
                                        <div class="text-red-600">{{ $message }}</div>
                                    @enderror
                                    
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                    
                                    <label class="block font-medium text-sm text-gray-700" for="trademark">
                                        Trademark
                                    </label>
        
                                    <input id="trademark" name="trademark" type="text" 
                                        value="@error('trademark'){{old('trademark')}}@enderror{{$machine->trademark}}"
                                        class="form-input rounded-md shadow-sm mt-1 block w-full">
                                    
                                    @error('trademark')
                                        <div class="text-red-600">{{ $message }}</div>
                                    @enderror

                                </div>

                            </div>

                        </div>

                        <div class="flex bg-white items-center justify-end px-4 py-3 text-right sm:px-6">
        
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Update Machine
                            </button>
                        
                        </div>
                                    
                    </div>

                </form>
                
            </div>

        </div>
    </div>

</x-machines>