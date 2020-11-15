<x-services>

    <!--
    Tailwind UI components require Tailwind CSS v1.8 and the @tailwindcss/ui plugin.
    Read the documentation to get started: https://tailwindui.com/documentation
    -->
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        
        <div class="flex justify-between px-4 py-5 border-b border-gray-200 sm:px-6">
            <h3 class="self-center text-lg leading-6 font-medium text-gray-900">
                Service Information
            </h3>
            <!-- <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
                Personal details and application.
            </p> -->

            @can ('update', $service)
            <span class="sm:ml-3 shadow-sm rounded-md">
                <a href="{{ route('services.edit', $service->id ) }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:shadow-outline-indigo focus:border-indigo-700 active:bg-indigo-700 transition duration-150 ease-in-out">
                    <svg class="-ml-1 mr-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                    Edit Service
                </a>
            </span>
            @endcan

        </div>

        <div>
            <dl>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm leading-5 font-medium text-gray-500">
                    Machine
                    </dt>
                    <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                    {{ $service['machine']->trademark }} - {{ $service['machine']->model }} 
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm leading-5 font-medium text-gray-500">
                    Owner
                    </dt>
                    <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                    {{ $service['machine']->owner }}
                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm leading-5 font-medium text-gray-500">
                    Date
                    </dt>
                    <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                    {{ $service->date }}
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm leading-5 font-medium text-gray-500">
                    Failure
                    </dt>
                    <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                    {{ $service->failure }}
                    </dd>
                </div>
                
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm leading-5 font-medium text-gray-500">
                    Price
                    </dt>
                    <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                    {{ $service->price }}
                    </dd>
                </div>
                
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm leading-5 font-medium text-gray-500">
                    Failure Description
                    </dt>
                    <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                    {{ $service->failure_description }}
                    </dd>
                </div>
                
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm leading-5 font-medium text-gray-500">
                    Service Description
                    </dt>
                    <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                    {{ $service->service_description }}
                    </dd>
                </div>

                @if ($service->service_image)
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm leading-5 font-medium text-gray-500">
                        Imagen
                    </dt>
                    <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                        <ul class="border border-gray-200 rounded-md">
                            <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm leading-5">
                                <div class="w-0 flex-1 flex items-center">
                                    <!-- Heroicon name: paper-clip -->
                                    <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2 flex-1 w-0 truncate">
                                    {{ basename($service->service_image_path) }}
                                    </span>
                                </div>
                                <div class="ml-4 flex-shrink-0">
                                    <a href="{{ $service->service_image_path }}" class="font-medium text-indigo-600 hover:text-indigo-500 transition duration-150 ease-in-out">
                                    Download
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </dd>
                </div>
                @endif

                @can ('delete', $service)
                <div class="flex bg-white items-center justify-end px-4 py-4 text-right sm:px-6">
        
                    <form method="POST" action="{{ route('services.destroy', $service) }}">
                        @method('DELETE')
                        @csrf

                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                            Delete Service
                        </button>

                    </form>

                
                </div>
                @endcan

            </dl>
        </div>

    </div>


</x-services>
