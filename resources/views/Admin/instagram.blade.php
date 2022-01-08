<x-app-layout>
    <x-slot name="header">
        <x-jet-nav-link href="{{ route('admin.dashboard') }}" :active="request()->routeIs('admin.dashboard')">
            {{ __('Web Configuration') }}
        </x-jet-nav-link>
        <x-jet-nav-link href="{{ route('admin.instagram.index') }}" :active="request()->routeIs('admin.instagram.index')">
            {{ __('Instagram Account') }}
        </x-jet-nav-link>
    </x-slot>


    <div>
        <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold leading-tight text-center text-gray-800">
                {{ __('Instagram Account') }}
            </h2>
            
            <div class="w-full shadow" id="account">
                <div class="px-4 py-5 sm:p-6">
                    <h2 class="ml-3 text-xl text-blue-500">Akun Instagram Bisnis</h2>
                    <div class="mt-4">
                        <div class="flex items-center">
                            <div class="w-full ml-3">
                                <div class="md:grid md:grid-cols-3 md:gap-6">
                                    <div class="flex justify-between md:col-span-1">
                                    <div class="px-4 sm:px-0">
                                        <h3 class="text-lg font-medium text-gray-900">Add Instagram Account</h3>
                                
                                        <p class="mt-1 text-sm text-gray-600">
                                            Tambahkan Akun Instagram Yang Dikelola Disini
                                        </p>
                                    </div>
                                
                                    <div class="px-4 sm:px-0">
                                        
                                    </div>
                                </div>
                                
                                    <div class="mt-5 md:mt-0 md:col-span-2">
                                        <form method="post" action="{{ route('admin.instagram.store') }}">
                                            @csrf
                                            <div class="px-4 py-5 bg-white shadow sm:p-6 sm:rounded-tl-md sm:rounded-tr-md">
                                                <div class="grid grid-cols-6 gap-6">
                                                    <div class="col-span-6 sm:col-span-4">
                                                        <label class="block text-sm font-medium text-gray-700" for="username">Username</label>
                                                        <input class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="username" type="text" name="username" value="{{ $instagramUsers[0]->username }}">
                                                    </div>
                                    
                                                    <div class="col-span-6 sm:col-span-4">
                                                        <label class="block text-sm font-medium text-gray-700" for="password">Password</label>
                                                        <input class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="password" type="password" name="password"  value="{{ $instagramUsers[0]->password }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                            <div class="flex items-center justify-end px-4 py-3 text-right shadow bg-gray-50 sm:px-6 sm:rounded-bl-md sm:rounded-br-md">
                                            <div class="mr-3 text-sm text-gray-600">
                                </div>
                                    
                                <button type="submit" class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25">
                                    Save
                                </button>
                                                </div>
                                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
