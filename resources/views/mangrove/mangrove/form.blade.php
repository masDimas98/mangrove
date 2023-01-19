<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mangrove') }} / {{ __('Mangrove') }} / {{ __('Tambah') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (isset($data))
                        <form class="w-full" action="{{ action('MangroveController@update', $data->idjenis) }}"
                            method="post" enctype="multipart/form-data">
                            @method('PUT')
                        @else
                            <form class="w-full" action="{{ action('MangroveController@store') }}" method="post"
                                enctype="multipart/form-data">
                    @endif
                    @csrf
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="flex block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 "
                                for="grid-password">
                                Pilih Jenis &nbsp; <div class="text-red-400"> *</div>
                            </label>
                            <select
                                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 mb-3  @error('idjenis') border-red-500 @enderror"
                                id="grid-state" name="idjenis">
                                <option value="default">Pilih</option>
                                @foreach ($jenismangrove as $item)
                                    @if ($errors->any())
                                        @if (old('idjenis') == $item->idjenis)
                                            <option value="{{ $item->idjenis }}" selected>{{ $item->namajenisindo }}
                                            </option>
                                        @else
                                            <option value="{{ $item->idjenis }}">{{ $item->namajenisindo }}
                                            </option>
                                        @endif
                                    @else
                                        @if (isset($data))
                                            @if ($data->idjenis == $item->idjenis)
                                                <option value="{{ $item->idjenis }}" selected>
                                                    {{ $item->namajenisindo }}
                                                </option>
                                            @endif
                                        @else
                                            <option value="{{ $item->idjenis }}">{{ $item->namajenisindo }}
                                            </option>
                                        @endif
                                    @endif
                                @endforeach
                            </select>
                            @error('idjenis')
                                <strong class="font-bold text-red-500">{{ $message }}!</strong>
                            @enderror
                        </div>
                        <div class="flex flex-wrap w-full">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="flex block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 "
                                    for="grid-password">
                                    Nama Latin &nbsp; <div class="text-red-400"> *</div>
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('mangrovelatin') border-red-500 @enderror"
                                    type="text" placeholder="" name="mangrovelatin"
                                    @if ($errors->any()) value="{{ old('mangrovelatin') }}"
                                        @else
                                        @isset($data)
                                                value="{{ $data->mangrovelatin }}"
                                        @endisset @endif>
                                @error('mangrovelatin')
                                    <strong class="font-bold text-red-500">{{ $message }}!</strong>
                                @enderror
                                <p class="text-gray-600 text-xs italic dark:text-white"></p>
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="flex block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 "
                                    for="grid-password">
                                    Nama Indonesia &nbsp; <div class="text-red-400"> *</div>
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('mangroveindo') border-red-500 @enderror"
                                    type="text" placeholder="" name="mangroveindo"
                                    @if ($errors->any()) value="{{ old('mangroveindo') }}"
                                        @else
                                        @isset($data)
                                                value="{{ $data->mangroveindo }}"
                                        @endisset @endif>
                                @error('mangroveindo')
                                    <strong class="font-bold text-red-500">{{ $message }}!</strong>
                                @enderror
                                <p class="text-gray-600 text-xs italic dark:text-white"></p>
                            </div>
                        </div>
                        <div class="w-full px-3">
                            <div class="float-right">
                                <button type="submit"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save
                                </button>
                            </div>
                            </form>
                            <div class="float-left">
                                <a href="/mangrove" type="button"
                                    class="text-white bg-blue-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Back
                                </a>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
