<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Penanaman') }} --}}
            @include('components/breadscrumbs')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    @if (isset($data))
                        <form class="w-full" action="{{ action('UserController@update', $data->id) }}" method="post"
                            enctype="multipart/form-data">
                            @method('PUT')
                        @else
                            <form class="w-full" action="{{ action('UserController@store') }}" method="post"
                                enctype="multipart/form-data">
                    @endif
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-label for="name" :value="__('Name')" />

                        <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                            :value="isset($data) ? $data->name : old('name')" required autofocus />
                        @error('name')
                            <strong class="font-bold text-red-500">{{ $message }}!</strong>
                        @enderror
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-label for="email" :value="__('Email')" />

                        <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="isset($data) ? $data->email : old('email')" required />
                        @error('email')
                            <strong class="font-bold text-red-500">{{ $message }}!</strong>
                        @enderror
                    </div>

                    <!-- Phone Number -->
                    <div class="mt-4">
                        <x-label for="telp" :value="__('Nomer Telpon')" />

                        <x-input id="telp" class="block mt-1 w-full" type="number" name="telp"
                            :value="isset($data) ? $data->telp : old('telp')" required />
                        @error('telp')
                            <strong class="font-bold text-red-500">{{ $message }}!</strong>
                        @enderror
                    </div>

                    @isset($data)
                        <div class="mt-4">
                            <x-label for="telp" :value="__('Nomer Telpon')" />

                            <select id="countries"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                name="hakakses">
                                <option selected>Pilih Hak Akses</option>
                                @if (old('hakakses') == '2')
                                    <option value="2" selected>Admin</option>
                                @else
                                    @isset($data)
                                        @if ($data->hakakses == '2')
                                            <option value="2" selected>Admin</option>
                                        @else
                                            <option value="2">Admin</option>
                                        @endif
                                    @else
                                        <option value="2">Admin</option>
                                    @endisset
                                @endif
                                @if (old('hakakses') == '3')
                                    <option value="3" selected>Surveyor</option>
                                @else
                                    @isset($data)
                                        @if ($data->hakakses == '3')
                                            <option value="3" selected>Surveyor</option>
                                        @else
                                            <option value="3">Surveyor</option>
                                        @endif
                                    @else
                                        <option value="3">Surveyor</option>
                                    @endisset
                                @endif
                            </select>

                            @error('hakakses')
                                <strong class="font-bold text-red-500">{{ $message }}!</strong>
                            @enderror

                        </div>
                    @endisset

                    <!-- Password -->
                    <div class="mt-4">
                        <x-label for="password" :value="__('Password')" />

                        <x-input id="password" class="block mt-1 w-full" type="password" name="password"
                            autocomplete="new-password" />

                        @isset($data)
                            <small>note: <span class="text-red-400">*</span> Kosongkan Jika Tidak Ingin Merubah
                                Password</small>
                        @endisset
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-label for="password_confirmation" :value="__('Confirm Password')" />

                        <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                            name="password_confirmation" />
                        @error('password')
                            <strong class="font-bold text-red-500">{{ $message }}!</strong>
                        @enderror
                        @isset($data)
                            <small>note: <span class="text-red-400">*</span> Kosongkan Jika Tidak Ingin Merubah
                                Password</small>
                        @endisset
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <div class=" justify-start">
                            <a href="/user" type="button"
                                class="text-white bg-blue-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Back
                            </a>
                        </div>

                        <div class="">

                            @isset($data)
                                <x-button class="ml-4">
                                    {{ __('update') }}
                                </x-button>
                            @else
                                <x-button class="ml-4">
                                    {{ __('Register') }}
                                </x-button>
                            @endisset
                        </div>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <x-slot name="js">

    </x-slot>
</x-app-layout>
