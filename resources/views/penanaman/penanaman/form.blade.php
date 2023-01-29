<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Penanaman') }} / {{ __('Tambah') }} --}}
            @include('components/breadscrumbs')
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (isset($data))
                        <form class="w-full" action="{{ action('PenanamanController@update', $data->idtanam) }}"
                            method="post" enctype="multipart/form-data">
                            @method('PUT')
                        @else
                            <form class="w-full" action="{{ action('PenanamanController@store') }}" method="post"
                                enctype="multipart/form-data">
                    @endif
                    @csrf

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="flex flex-wrap w-full">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="flex block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 "
                                    for="grid-password">
                                    Pilih Mangrove &nbsp; <div class="text-red-400"> *</div>
                                </label>
                                <select id="mangrove_select"
                                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 mb-3  @error('idmangrove') border-red-500 @enderror"
                                    id="grid-state" name="idmangrove">
                                    <option value="default">Pilih</option>
                                    @foreach ($mangrove as $item)
                                        @if ($errors->any())
                                            @if (old('idmangrove') == $item->idmangrove)
                                                <option value="{{ $item->idmangrove }}" selected>
                                                    {{ $item->mangrovelatin }}
                                                </option>
                                            @else
                                                <option value="{{ $item->idmangrove }}">{{ $item->mangrovelatin }}
                                                </option>
                                            @endif
                                        @else
                                            @if (isset($data))
                                                @if ($data->idmangrove == $item->idmangrove)
                                                    <option value="{{ $item->idmangrove }}" selected>
                                                        {{ $item->mangrovelatin }}
                                                    </option>
                                                @endif
                                            @else
                                                <option value="{{ $item->idmangrove }}">{{ $item->mangrovelatin }}
                                                </option>
                                            @endif
                                        @endif
                                    @endforeach
                                </select>
                                <div
                                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    {{-- <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg> --}}
                                </div>
                                @error('idkec')
                                    <strong class="font-bold text-red-500">{{ $message }}!</strong>
                                @enderror
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="flex block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 "
                                    for="grid-password">
                                    Pilih Lahan &nbsp; <div class="text-red-400"> *</div>
                                </label>
                                <select id="lahan_select"
                                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 mb-3  @error('idlahan') border-red-500 @enderror"
                                    id="grid-state" name="idlahan">
                                    <option value="default">Pilih</option>
                                    @foreach ($lahan as $item)
                                        @if ($errors->any())
                                            @if (old('idlahan') == $item->idlahan)
                                                <option value="{{ $item->idlahan }}" selected>{{ $item->namalahan }}
                                                </option>
                                            @else
                                                <option value="{{ $item->idlahan }}">{{ $item->namalahan }}
                                                </option>
                                            @endif
                                        @else
                                            @if (isset($data))
                                                @if ($data->idlahan == $item->idlahan)
                                                    <option value="{{ $item->idlahan }}" selected>
                                                        {{ $item->namalahan }}
                                                    </option>
                                                @endif
                                            @else
                                                <option value="{{ $item->idlahan }}">{{ $item->namalahan }}
                                                </option>
                                            @endif
                                        @endif
                                    @endforeach
                                </select>
                                <div
                                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    {{-- <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg> --}}
                                </div>
                                @error('iddes')
                                    <strong class="font-bold text-red-500">{{ $message }}!</strong>
                                @enderror
                            </div>
                        </div>

                        <div class="flex flex-wrap w-full">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="flex block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 "
                                    for="grid-password">
                                    Pihak Penanam &nbsp; <div class="text-red-400"> *</div>
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('pihaktanam') border-red-500 @enderror"
                                    type="text" placeholder="" name="pihaktanam"
                                    @isset($data) @if ($errors->any())
                                        value="{{ old('pihaktanam') }}"
                                        @else
                                        value="{{ $data->pihak_tanam }}"
                                        @endif
                                        @endisset>
                                @error('pihaktanam')
                                    <strong class="font-bold text-red-500">{{ $message }}!</strong>
                                @enderror
                                <p class="text-gray-600 text-xs italic dark:text-white"></p>
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="flex block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 "
                                    for="grid-password">
                                    Blok Lahan &nbsp; <div class="text-red-400"> *</div>
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('blok_lahan') border-red-500 @enderror"
                                    type="text" placeholder="" name="blok_lahan"
                                    @isset($data) @if ($errors->any())
                                        value="{{ old('blok_lahan') }}"
                                        @else
                                        value="{{ $data->blok_lahan }}"
                                        @endif
                                        @endisset>
                                @error('blok_lahan')
                                    <strong class="font-bold text-red-500">{{ $message }}!</strong>
                                @enderror
                                <p class="text-gray-600 text-xs italic dark:text-white"></p>
                            </div>
                        </div>

                        <div class="flex flex-wrap w-full">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="flex block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 "
                                    for="grid-password">
                                    Tanggal Penanaman &nbsp; <div class="text-red-400"> *</div>
                                </label>
                                {{-- tanggal --}}
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <input datepicker datepicker-autohide datepicker-format="yyyy-mm-dd" type="text"
                                        class="bg-gray-200 text-gray-700 border border-gray-200 rounded rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('tgltanam') border-red-500 @enderror"
                                        placeholder="Select date" name="tgltanam"
                                        @if ($errors->any()) value="{{ old('tgltanam') }}"
                                            @else
                                            @isset($data)
                                            value="{{ $data->tgltanam }}"
                                            @endisset @endif>
                                </div>


                                @error('tgltanam')
                                    <strong class="font-bold text-red-500">{{ $message }}!</strong>
                                @enderror
                                <p class="text-gray-600 text-xs italic dark:text-white"></p>
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="flex block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 "
                                    for="grid-password">
                                    Jumlah Penanaman &nbsp; <div class="text-red-400"> *</div>
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('jmltanam') border-red-500 @enderror"
                                    type="text" placeholder="" name="jmltanam"
                                    @isset($data) @if ($errors->any())
                                        value="{{ old('jmltanam') }}"
                                        @else
                                        value="{{ $data->jmltanam }}"
                                        @endif
                                        @endisset>
                                @error('jmltanam')
                                    <strong class="font-bold text-red-500">{{ $message }}!</strong>
                                @enderror
                                <p class="text-gray-600 text-xs italic dark:text-white"></p>
                            </div>
                        </div>
                        <div class="flex flex-wrap w-full">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="flex block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 "
                                    for="grid-password">
                                    Status Tanam &nbsp; <div class="text-red-400"> *</div>
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('statustanam') border-red-500 @enderror"
                                    type="text" step="any" placeholder="" name="statustanam"
                                    @if ($errors->any()) value="{{ old('statustanam') }}"
                                        @else
                                        @isset($data)
                                        value="{{ $data->statustanam }}"
                                        @endisset @endif>
                                @error('statustanam')
                                    <strong class="font-bold text-red-500">{{ $message }}!</strong>
                                @enderror
                                <p class="text-gray-600 text-xs italic dark:text-white"></p>
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="flex block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 "
                                    for="grid-password">
                                    Foto &nbsp; <div class="text-red-400"> *</div>
                                </label>

                                <input
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-200 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 @error('foto') border-red-500 @enderror"
                                    id="file_input" type="file" name="foto"
                                    @if ($errors->any()) value="{{ old('foto') }}"
                                        @else
                                        @isset($data)
                                        value="{{ $data->foto }}"
                                        @endisset @endif>

                                @error('foto')
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
                                <a href="/penanaman" type="button"
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.2/datepicker.min.js"></script>
    </x-slot>
</x-app-layout>
