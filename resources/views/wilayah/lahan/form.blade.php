<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Wilayah') }} / {{ __('Lahan') }} / {{ __('Tambah') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (isset($data))
                        <form class="w-full" action="{{ action('LahanController@update', $data->idlahan) }}" method="post"
                            enctype="multipart/form-data">
                            @method('PUT')
                        @else
                            <form class="w-full" action="{{ action('LahanController@store') }}" method="post"
                                enctype="multipart/form-data">
                    @endif
                    @csrf

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="flex flex-wrap w-full">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="flex block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 "
                                    for="grid-password">
                                    Pilih Kecamatan &nbsp; <div class="text-red-400"> *</div>
                                </label>
                                <select id="kecamatan_select"
                                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 mb-3  @error('idkec') border-red-500 @enderror"
                                    id="grid-state" name="idkec">
                                    <option value="default">Pilih</option>
                                    @foreach ($kecamatan as $item)
                                        @if ($errors->any())
                                            @if (old('idkec') == $item->idkec)
                                                <option value="{{ $item->idkec }}" selected>{{ $item->namakec }}
                                                </option>
                                            @else
                                                <option value="{{ $item->idkec }}">{{ $item->namakec }}</option>
                                            @endif
                                        @else
                                            @if (isset($data))
                                                @if ($data->idkec == $item->idkec)
                                                    <option value="{{ $item->idkec }}" selected>{{ $item->namakec }}
                                                    </option>
                                                @endif
                                            @else
                                                <option value="{{ $item->idkec }}">{{ $item->namakec }}
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
                                    Pilih Desa &nbsp; <div class="text-red-400"> *</div>
                                </label>
                                <select id="desa_select"
                                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 mb-3  @error('iddes') border-red-500 @enderror"
                                    id="grid-state" name="iddes">
                                    <option value="default">Pilih</option>
                                    @foreach ($desa as $item)
                                        @if ($errors->any())
                                            @if (old('iddes') == $item->iddes)
                                                <option value="{{ $item->iddes }}" selected>{{ $item->namadesa }}
                                                </option>
                                            @else
                                                <option value="{{ $item->iddes }}">{{ $item->namadesa }}
                                                </option>
                                            @endif
                                        @else
                                            @if (isset($data))
                                                @if ($data->iddesa == $item->iddes)
                                                    <option value="{{ $item->iddes }}" selected>{{ $item->namadesa }}
                                                    </option>
                                                @endif
                                            @else
                                                <option value="{{ $item->iddes }}">{{ $item->namadesa }}
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
                                    Nama Lahan &nbsp; <div class="text-red-400"> *</div>
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('namalahan') border-red-500 @enderror"
                                    type="text" placeholder="" name="namalahan"
                                    @if ($errors->any()) value="{{ old('namalahan') }}"
                                        @else
                                        @isset($data)
                                                value="{{ $data->namalahan }}"
                                        @endisset @endif
                                    @error('namalahan')
                                    <strong class="font-bold text-red-500">{{ $message }}!</strong>
                                @enderror
                                    <p class="text-gray-600 text-xs italic dark:text-white"></p>
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="flex block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 "
                                    for="grid-password">
                                    Nama Pemilik &nbsp; <div class="text-red-400"> *</div>
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('namapemilik') border-red-500 @enderror"
                                    type="text" placeholder="" name="namapemilik"
                                    @isset($data)
                                        @if ($errors->any())
                                             value="{{ old('namapemilik') }}"
                                        @else
                                            value="{{ $data->kepemilikan }}"
                                        @endif
                                    @endisset>
                                @error('namapemilik')
                                    <strong class="font-bold text-red-500">{{ $message }}!</strong>
                                @enderror
                                <p class="text-gray-600 text-xs italic dark:text-white"></p>
                            </div>
                        </div>
                        <div class="flex flex-wrap w-full">
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="flex block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 "
                                    for="grid-password">
                                    Luas &nbsp; <div class="text-red-400"> *</div>
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('luas') border-red-500 @enderror"
                                    type="number" placeholder="" name="luas"
                                    @if ($errors->any()) value="{{ old('luas') }}"
                                    @else
                                        @isset($data)
                                                value="{{ $data->luas }}"
                                        @endisset @endif>
                                @error('luas')
                                    <strong class="font-bold text-red-500">{{ $message }}!</strong>
                                @enderror
                                <p class="text-gray-600 text-xs italic dark:text-white"></p>
                            </div>
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="flex block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 "
                                    for="grid-password">
                                    Latitude &nbsp; <div class="text-red-400"> *</div>
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('latitude') border-red-500 @enderror"
                                    type="number" step="any" placeholder="" name="latitude"
                                    @if ($errors->any()) value="{{ old('latitude') }}"
                                        @else
                                        @isset($data)
                                                value="{{ $data->latitude }}"
                                        @endisset @endif>
                                @error('latitude')
                                    <strong class="font-bold text-red-500">{{ $message }}!</strong>
                                @enderror
                                <p class="text-gray-600 text-xs italic dark:text-white"></p>
                            </div>
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="flex block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 "
                                    for="grid-password">
                                    Longitude &nbsp; <div class="text-red-400"> *</div>
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('longitude') border-red-500 @enderror"
                                    type="number" step="any" placeholder="" name="longitude"
                                    @if ($errors->any()) value="{{ old('longitude') }}"
                                        @else
                                        @isset($data)
                                                value="{{ $data->longitude }}"
                                        @endisset @endif>
                                @error('longitude')
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
                                <a href="/lahan" type="button"
                                    class="text-white bg-blue-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Back
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script src="vendor/sweetalert/sweetalert.all.js"></script>
<script type="text/javascript">
    var kecamatanSelect = $('#kecamatan_select');
    var desaSelect = $('#desa_select');
    var desa = {!! json_encode($desa) !!}

    $(kecamatanSelect).change(function(e) {
        e.preventDefault();
        var idkec = $(this).val()
        const found = desa.filter(element => element.idkec == idkec);
        console.log(found);
        desaSelect.empty();
        desaSelect.append($("<option></option>")
            .attr("value", "0").text("Pilih"));
        if (found !== 0) {
            $.each(found, function(key, value) {
                desaSelect.append($("<option></option>")
                    .attr("value", value.iddes).text(value.namadesa));
            });
        }
        if (idkec == 0) {
            console.log(desa);
            $.each(desa, function(key, value) {
                desaSelect.append($("<option></option>")
                    .attr("value", value.iddes).text(value.namadesa));
            });
        }
    });
</script>
