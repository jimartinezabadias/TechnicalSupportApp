<x-machines>

    <!--
    Tailwind UI components require Tailwind CSS v1.8 and the @tailwindcss/ui plugin.
    Read the documentation to get started: https://tailwindui.com/documentation
    -->
    <div class="lg:flex lg:items-center lg:justify-between mb-6">
        <div class="flex-1 min-w-0">
            @if ( Auth::user()->isAdmin() )
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate">
            All Machines
            </h2>
            @else
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate">
            My Machines
            </h2>
            @endif
            <div class="mt-1 flex flex-col sm:mt-0 sm:flex-row sm:flex-wrap">
           
            </div>
        </div>

        <div class="mt-5 flex lg:mt-0 lg:ml-4">
            
            <!-- <span class="hidden sm:block shadow-sm rounded-md">
                <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out">
                    <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                    </svg>
                    Edit
                </button>
            </span> -->

            <!-- <span class="hidden sm:block ml-3 shadow-sm rounded-md">
                <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
                    <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0 1 1 0 00-1.414 1.414 4 4 0 005.656 0l3-3a4 4 0 00-5.656-5.656l-1.5 1.5a1 1 0 101.414 1.414l1.5-1.5zm-5 5a2 2 0 012.828 0 1 1 0 101.414-1.414 4 4 0 00-5.656 0l-3 3a4 4 0 105.656 5.656l1.5-1.5a1 1 0 10-1.414-1.414l-1.5 1.5a2 2 0 11-2.828-2.828l3-3z" clip-rule="evenodd" />
                    </svg>
                    View
                </button>
            </span> -->

            <div class="relative text-gray-600">
                
                <form action="{{ route('machines.index') }}" method="GET">
                
                    <input type="search" name="search" placeholder="Eg. Printer, Owner Name" class="bg-white h-10 px-5 pr-10 rounded-full text-md focus:outline-none">
                    
                    <button type="submit" class="absolute right-0 top-0 mt-3 mr-4">
                        <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
                            <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"/>
                        </svg>
                    </button>
                
                </form>

            </div>

            @can ('create',App\Models\Machine::class)
            <span class="sm:ml-3 shadow-sm rounded-md">
                <a href="{{ route('machines.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:shadow-outline-indigo focus:border-indigo-700 active:bg-indigo-700 transition duration-150 ease-in-out">
                    <svg class="-ml-1 mr-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                    Create Machine
                </a>
            </span>
            @endcan

        </div>

    </div>


    <!-- Machines Table -->

    <!--
    Tailwind UI components require Tailwind CSS v1.8 and the @tailwindcss/ui plugin.
    Read the documentation to get started: https://tailwindui.com/documentation
    -->

    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Owner
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Type
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Model
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Trademark
                            </th>
                            <th class="px-6 py-3 bg-gray-50"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($machines as $machine)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="flex items-center">
                                        @isset($machine->user) 
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full" src="{{ $machine->user->profile_photo_url }}" alt="">
                                        </div>
                                        @endisset
                                        <div class="ml-4">
                                            <div class="text-sm leading-5 font-medium text-gray-900">
                                                {{ $machine->owner }}
                                            </div>
                                            @isset($machine->user)
                                            <div class="text-sm leading-5 text-gray-500">
                                                {{ $machine->user->email }}
                                            </div>
                                            @endisset
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                    {{ $machine->type }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">{{ $machine->model }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-500">{{ $machine->trademark }}</div>
                                </td>
                                <!-- <td class="px-6 py-4 whitespace-no-wrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Functional
                                    </span>
                                </td> -->
                                <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                                @can ('view', $machine)
                                    <a href="{{ route('machines.show', $machine->id ) }}" class="text-indigo-600 hover:text-indigo-900">View</a>
                                @endcan
                                </td>
                            </tr>
                            @endforeach
                            <!-- More rows... -->
                        </tbody>
                    </table>

                    {{ $machines->links() }}
                    
                </div>
            </div>
        </div>
    </div>

</x-machines>
