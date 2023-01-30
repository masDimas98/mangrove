<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @include('components/breadscrumbs')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (isset($data))
                        <form class="w-full" action="{{ action('BibitMangroveMonevController@update', $data->idbibit) }}"
                            method="post" enctype="multipart/form-data">
                            @method('PUT')
                        @else
                            <form class="w-full" action="{{ action('BibitMangroveMonevController@store') }}"
                                method="post" enctype="multipart/form-data">
                    @endif
                    @csrf


                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="flex block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 "
                                for="grid-password">
                                Tanggal Monev &nbsp; <div class="text-red-400"> *</div>
                            </label>
                            <div class="relative mb-3">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <input datepicker datepicker-autohide datepicker-format="yyyy-mm-dd" type="text"
                                    class="bg-gray-200 text-gray-700 border border-gray-200 rounded rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('tanggal') border-red-500 @enderror"
                                    placeholder="Select date" name="tanggal"
                                    @if ($errors->any()) value="{{ old('tanggal') }}"
                                        @else
                                        @isset($data)
                                        value="{{ $data->getAttributes()['tglmonev'] }}"
                                        @endisset @endif>
                            </div>


                            @error('tgltanam')
                                <strong class="font-bold text-red-500">{{ $message }}!</strong>
                            @enderror
                            <p class="text-gray-600 text-xs italic dark:text-white"></p>
                        </div>
                        <div class="w-full px-3">
                            <label class="flex block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 "
                                for="grid-password">
                                Tinggi Bibit &nbsp; <div class="text-red-400"> *</div>
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('tinggi') border-red-500 @enderror"
                                type="number" placeholder="" name="tinggi"
                                @if ($errors->any()) value="{{ old('tinggi') }}"
                                    @else
                                    @isset($data)
                                    value="{{ $data->tinggibibit }}"
                                    @endisset @endif>
                            @error('tinggi')
                                <strong class="font-bold text-red-500">{{ $message }}!</strong>
                            @enderror
                            <p class="text-gray-600 text-xs italic dark:text-white"></p>
                        </div>
                        <div class="w-full px-3">
                            <label class="flex block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 "
                                for="grid-password">
                                Jumlah Daun &nbsp; <div class="text-red-400"> *</div>
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('jumlah') border-red-500 @enderror"
                                type="number" placeholder="" name="jumlah"
                                @if ($errors->any()) value="{{ old('jumlah') }}"
                                    @else
                                    @isset($data)
                                    value="{{ $data->jml_daun }}"
                                    @endisset @endif>
                            @error('jumlah')
                                <strong class="font-bold text-red-500">{{ $message }}!</strong>
                            @enderror
                            <p class="text-gray-600 text-xs italic dark:text-white"></p>
                        </div>
                        <div class="w-full px-3">
                            <label class="flex block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 "
                                for="grid-password">
                                Foto &nbsp; <div class="text-red-400"> *</div>
                            </label>

                            <div class="w-full px- mb-3">
                                <img id="showpic" src="#" alt="your image" class="block mx-auto" />
                                @isset($data)
                                    <img id="oldpic" src="{{ url('/image/bibitmangrovemonev/' . $data->foto) }}"
                                        alt="your image" class="block mx-auto" />
                                @endisset
                            </div>
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-200 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 mb-3 @error('foto') border-red-500 @enderror"
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
                        <div class="w-full px-3">
                            <div class="float-right">
                                <button type="submit"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save
                                </button>
                            </div>
                            </form>
                            <div class="float-left">
                                <a href="/bibitmonev" type="button"
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
        <script>
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#showpic')
                            .attr('src', e.target.result)
                            .width(300)
                            .height(300)
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $(document).ready(function() {
                $('#showpic').hide();
            })

            $("#file_input").change(function() {
                readURL(this);
                $('#showpic').show();
                $('#oldpic').hide();
            });
        </script>
    </x-slot>
</x-app-layout>
