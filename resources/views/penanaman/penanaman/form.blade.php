<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Penanaman') }} / {{ __('Tambah') }}
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
                                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 mb-3  @error('iddes') border-red-500 @enderror"
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
                                    Tanggal Penanaman &nbsp; <div class="text-red-400"> *</div>
                                </label>
                                {{-- tanggal --}}
                                {{-- <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('tgltanam') border-red-500 @enderror"
                                    type="text" placeholder="" name="tgltanam"
                                    @if ($errors->any()) value="{{ old('tgltanam') }}"
                                        @else
                                        @isset($data)
                                                value="{{ $data->tgltanam }}"
                                        @endisset @endif> --}}

                                <div x-data="app()" x-init="[initDate(), getNoOfDays()]" x-cloak>
                                    <div class="mb-5">
                                        {{-- <label for="datepicker" class="font-bold mb-1 text-gray-700 block">Select
                                            Date</label> --}}
                                        <div class="relative">
                                            <input type="hidden" name="date" x-ref="date">
                                            <input type="text" readonly x-model="datepickerValue"
                                                @click="showDatepicker = !showDatepicker"
                                                @keydown.escape="showDatepicker = false"
                                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('tgltanam') border-red-500 @enderror"
                                                placeholder="Select date">

                                            <div class="absolute top-0 right-0 px-3 py-2">
                                                <svg class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                            <div class="bg-white mt-12 rounded-lg shadow p-4 absolute top-0 left-0"
                                                style="width: 17rem" x-show.transition="showDatepicker"
                                                @click.away="showDatepicker = false">
                                                <div class="flex justify-between items-center mb-2">
                                                    <div>
                                                        <span x-text="MONTH_NAMES[month]"
                                                            class="text-lg font-bold text-gray-800"></span>
                                                        <span x-text="year"
                                                            class="ml-1 text-lg text-gray-600 font-normal"></span>
                                                    </div>
                                                    <div>
                                                        <button type="button"
                                                            class="transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-200 p-1 rounded-full"
                                                            :class="{ 'cursor-not-allowed opacity-25': month == 0 }"
                                                            :disabled="month == 0 ? true : false"
                                                            @click="month--; getNoOfDays()">
                                                            <svg class="h-6 w-6 text-gray-500 inline-flex"
                                                                fill="none" viewBox="0 0 24 24"
                                                                stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" d="M15 19l-7-7 7-7" />
                                                            </svg>
                                                        </button>
                                                        <button type="button"
                                                            class="transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-200 p-1 rounded-full"
                                                            :class="{ 'cursor-not-allowed opacity-25': month == 11 }"
                                                            :disabled="month == 11 ? true : false"
                                                            @click="month++; getNoOfDays()">
                                                            <svg class="h-6 w-6 text-gray-500 inline-flex"
                                                                fill="none" viewBox="0 0 24 24"
                                                                stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" d="M9 5l7 7-7 7" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="flex flex-wrap mb-3 -mx-1">
                                                    <template x-for="(day, index) in DAYS" :key="index">
                                                        <div style="width: 14.26%" class="px-1">
                                                            <div x-text="day"
                                                                class="text-gray-800 font-medium text-center text-xs">
                                                            </div>
                                                        </div>
                                                    </template>
                                                </div>
                                                <div class="flex flex-wrap -mx-1">
                                                    <template x-for="blankday in blankdays">
                                                        <div style="width: 14.28%"
                                                            class="text-center border p-1 border-transparent text-sm">
                                                        </div>
                                                    </template>
                                                    <template x-for="(date, dateIndex) in no_of_days"
                                                        :key="dateIndex">
                                                        <div style="width: 14.28%" class="px-1 mb-1">
                                                            <div @click="getDateValue(date)" x-text="date"
                                                                class="cursor-pointer text-center text-sm leading-none rounded-full leading-loose transition ease-in-out duration-100"
                                                                :class="{
                                                                    'bg-blue-500 text-white': isToday(date) ==
                                                                        true,
                                                                    'text-gray-700 hover:bg-blue-200': isToday(
                                                                        date) == false
                                                                }">
                                                            </div>
                                                        </div>
                                                    </template>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- @error('tgltanam')
                                    <strong class="font-bold text-red-500">{{ $message }}!</strong>
                                @enderror --}}
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
                                    @isset($data)
                                        @if ($errors->any())
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
                                    Pihak Penanam &nbsp; <div class="text-red-400"> *</div>
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('pihaktanam') border-red-500 @enderror"
                                    type="number" placeholder="" name="pihaktanam"
                                    @if ($errors->any()) value="{{ old('pihaktanam') }}"
                                    @else
                                        @isset($data)
                                                value="{{ $data->pihaktanam }}"
                                        @endisset @endif>
                                @error('pihaktanam')
                                    <strong class="font-bold text-red-500">{{ $message }}!</strong>
                                @enderror
                                <p class="text-gray-600 text-xs italic dark:text-white"></p>
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="flex block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 "
                                    for="grid-password">
                                    Status Tanam &nbsp; <div class="text-red-400"> *</div>
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('statustanam') border-red-500 @enderror"
                                    type="number" step="any" placeholder="" name="statustanam"
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
{{-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js"></script> --}}
<script type="text/javascript">
    const MONTH_NAMES = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
        'October', 'November', 'December'
    ];
    const DAYS = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

    function app() {
        return {
            showDatepicker: false,
            datepickerValue: '',

            month: '',
            year: '',
            no_of_days: [],
            blankdays: [],
            days: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],

            initDate() {
                let today = new Date();
                this.month = today.getMonth();
                this.year = today.getFullYear();
                this.datepickerValue = new Date(this.year, this.month, today.getDate()).toDateString();
            },
            isToday(date) {
                const today = new Date();
                const d = new Date(this.year, this.month, date);

                return today.toDateString() === d.toDateString() ? true : false;
            },
            getDateValue(date) {
                let selectedDate = new Date(this.year, this.month, date);
                this.datepickerValue = selectedDate.toDateString();
                this.$refs.date.value = selectedDate.getFullYear() + "-" + ('0' + selectedDate.getMonth()).slice(-2) +
                    "-" + ('0' + selectedDate.getDate()).slice(-2);
                console.log(this.$refs.date.value);

                this.showDatepicker = false;
            },

            getNoOfDays() {
                let daysInMonth = new Date(this.year, this.month + 1, 0).getDate();

                // find where to start calendar day of week
                let dayOfWeek = new Date(this.year, this.month).getDay();
                let blankdaysArray = [];
                for (var i = 1; i <= dayOfWeek; i++) {
                    blankdaysArray.push(i);
                }

                let daysArray = [];
                for (var i = 1; i <= daysInMonth; i++) {
                    daysArray.push(i);
                }

                this.blankdays = blankdaysArray;
                this.no_of_days = daysArray;
            }
        }
    }
</script>
