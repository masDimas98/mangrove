<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Mangrove') }} / {{ __('Jenis Mangrove') }} / {{ __('Tambah') }} --}}
            @include('components/breadscrumbs')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (isset($data))
                        <form class="w-full" action="{{ action('JenisMangroveController@update', $data->idjenis) }}"
                            method="post" enctype="multipart/form-data">
                            @method('PUT')
                        @else
                            <form class="w-full" action="{{ action('JenisMangroveController@store') }}" method="post"
                                enctype="multipart/form-data">
                    @endif
                    @csrf


                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="flex block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 "
                                for="grid-password">
                                Nama Latin &nbsp; <div class="text-red-400"> *</div>
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('namajenislatin') border-red-500 @enderror"
                                type="text" placeholder="" name="namajenislatin"
                                @if ($errors->any()) value="{{ old('namajenislatin') }}"
                                    @else
                                    @isset($data)
                                    value="{{ $data->namajenislatin }}"
                                    @endisset @endif>
                            @error('namajenislatin')
                                <strong class="font-bold text-red-500">{{ $message }}!</strong>
                            @enderror
                            <p class="text-gray-600 text-xs italic dark:text-white"></p>
                        </div>
                        <div class="w-full px-3">
                            <label class="flex block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 "
                                for="grid-password">
                                Nama Indonesia &nbsp; <div class="text-red-400"> *</div>
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('namajenisindo') border-red-500 @enderror"
                                type="text" placeholder="" name="namajenisindo"
                                @if ($errors->any()) value="{{ old('namajenisindo') }}"
                                    @else
                                    @isset($data)
                                    value="{{ $data->namajenisindo }}"
                                    @endisset @endif>
                            @error('namajenisindo')
                                <strong class="font-bold text-red-500">{{ $message }}!</strong>
                            @enderror
                            <p class="text-gray-600 text-xs italic dark:text-white"></p>
                        </div>
                        <div class="w-full px-3">
                            <div class="float-right">
                                <button type="submit"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save
                                </button>
                            </div>
                            </form>
                            <div class="float-left">
                                <a href="/jenismangrove" type="button"
                                    class="text-white bg-blue-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Back
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-slot name="js">
    </x-slot>
</x-app-layout>
