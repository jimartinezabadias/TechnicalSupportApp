<x-machines>

    <!--
    Tailwind UI components require Tailwind CSS v1.8 and the @tailwindcss/ui plugin.
    Read the documentation to get started: https://tailwindui.com/documentation
    -->
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        
        <div class="flex justify-between px-4 py-5 border-b border-gray-200 sm:px-6">
            <h3 class="self-center text-lg leading-6 font-medium text-gray-900">
                Machine Information
            </h3>
            <!-- <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
                Personal details and application.
            </p> -->

            <span class="sm:ml-3 shadow-sm rounded-md">
                <a href="{{ route('machines.edit', $machine->id ) }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:shadow-outline-indigo focus:border-indigo-700 active:bg-indigo-700 transition duration-150 ease-in-out">
                    <svg class="-ml-1 mr-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                    Edit Machine
                </a>
            </span>

        </div>

        <div>
            <dl>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm leading-5 font-medium text-gray-500">
                    Owner name
                    </dt>
                    <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                    {{ $machine->owner }}
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm leading-5 font-medium text-gray-500">
                    Type
                    </dt>
                    <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                    {{ $machine->type }}
                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm leading-5 font-medium text-gray-500">
                    Model
                    </dt>
                    <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                    {{ $machine->model }}
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm leading-5 font-medium text-gray-500">
                    Trademark
                    </dt>
                    <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                    {{ $machine->trademark }}
                    </dd>
                </div>
                
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm leading-5 font-medium text-gray-500">
                    Services
                    </dt>
                    <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                        <ul class="bg-white border border-gray-200 rounded-md">
                            @foreach( $machine['services'] as $service )
                            <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm leading-5">
                                <div class="w-0 flex-1 flex items-center">
                                    <!-- Heroicon name: support -->

                                    <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-2 0c0 .993-.241 1.929-.668 2.754l-1.524-1.525a3.997 3.997 0 00.078-2.183l1.562-1.562C15.802 8.249 16 9.1 16 10zm-5.165 3.913l1.58 1.58A5.98 5.98 0 0110 16a5.976 5.976 0 01-2.516-.552l1.562-1.562a4.006 4.006 0 001.789.027zm-4.677-2.796a4.002 4.002 0 01-.041-2.08l-.08.08-1.53-1.533A5.98 5.98 0 004 10c0 .954.223 1.856.619 2.657l1.54-1.54zm1.088-6.45A5.974 5.974 0 0110 4c.954 0 1.856.223 2.657.619l-1.54 1.54a4.002 4.002 0 00-2.346.033L7.246 4.668zM12 10a2 2 0 11-4 0 2 2 0 014 0z" clip-rule="evenodd" />
                                    </svg>

                                    <span class="ml-2 flex-1 w-0 truncate">
                                    {{ $service->date }} /  {{ $service->failure }}
                                    </span>
                                </div>
                                <div class="ml-4 flex-shrink-0">
                                    <a href="{{ route('services.show', $service->id ) }}" class="font-medium text-indigo-600 hover:text-indigo-500 transition duration-150 ease-in-out">
                                    Show Service
                                    </a>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </dd>
                </div>

                <div class="flex bg-white items-center justify-end px-4 py-4 text-right sm:px-6">
        
                    <form method="POST" action="{{ route('machines.destroy', $machine) }}">
                        @method('DELETE')
                        @csrf

                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                            Delete Machine
                        </button>

                    </form>

                
                </div>

            </dl>
        </div>

    </div>


</x-machines>
