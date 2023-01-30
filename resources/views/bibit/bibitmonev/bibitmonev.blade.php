<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Users') }} --}}
            @include('components/breadscrumbs')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="mb-2">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight pt-3 text-center">
                            {{ __('Bibit Mangrove') }}
                        </h2>
                    </div>
                    <div class="grid grid-rows-2 grid-flow-col gap-4 mb-3">
                        <div class="col-span-2">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Mangrove Indonesia / Latin</dt>
                            <dd class="text-lg font-semibold">
                                {{ $bibit->mangroveindo }} &nbsp;/ &nbsp;{{ $bibit->mangrovelatin }}
                            </dd>
                        </div>
                        <div class="row-span-1 col-span-2 ...">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Tanggal Tanam</dt>
                            <dd class="text-lg font-semibold">{{ $bibit->tgltanam }}</dd>
                        </div>
                        {{-- <div class="row-span-1 col-span-2 ...">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400"></dt>
                            <dd class="text-lg font-semibold">yourname@flowbite.com</dd>
                        </div> --}}
                        <div class="row-span-2 m-auto">
                            <img src="{{ url('/image/bibitmangrove/' . $bibit->foto) }}" alt="" srcset=""
                                width="100" height="100">
                        </div>
                    </div>
                    <hr class="pb-5">
                    <div class="relative overflow-x-auto">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <div class="flex items-center justify-between pb-4">
                                <div>
                                    <form action="{{ action('BibitMangroveMonevController@create') }}">
                                        <button
                                            class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Tambah
                                        </button>
                                    </form>
                                </div>
                                <label for="table-search" class="sr-only">Search</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <input type="text" id="table-search"
                                        class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Search for items">
                                </div>
                            </div>
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">Tanggal Monev</th>
                                        <th scope="col" class="px-6 py-3">Tinggi Bibit</th>
                                        <th scope="col" class="px-6 py-3">Jumlah Daun</th>
                                        <th scope="col" class="px-6 py-3">Foto</th>
                                        <th scope="col" class="px-6 py-3">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    @foreach ($data as $item)
                                        <tr
                                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $item->tglmonev }}
                                            </th>
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $item->tinggibibit }}
                                            </th>
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $item->jml_daun }}
                                            </th>
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <img src="{{ url('/image/bibitmangrovemonev/' . $item->foto) }}"
                                                    alt="" srcset="" width="100" height="100"
                                                    class="m-auto">
                                            </th>

                                            <td class="px-6 py-4">
                                                <form action="{{ route('bibitmonev.destroy', $item->idmonevbibit) }}"
                                                    method="post" id="form_delete">

                                                    <div class="justify-center">
                                                        <a href="{{ route('bibitmonev.edit', $item->idmonevbibit) }}"
                                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                                        |

                                                        <button
                                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                                            Delete
                                                        </button>
                                                    </div>
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                {{-- <a href="#"
                                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-slot name="js">
    </x-slot>
</x-app-layout>
