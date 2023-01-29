<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Penanaman') }} --}}
            @include('components/breadscrumbs')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <ul class="flex border-b">
                <li class="-mb-px mr-1">
                    <a class="bg-white inline-block border-l border-t border-r rounded-t py-2 px-4 text-blue-700 font-semibold"
                        href="#">Penanaman</a>
                </li>
            </ul> --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-3 pb-5">
                        <div>
                        </div>
                        <div>
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight pt-3 text-center">
                                {{ __('Daftar Tanam') }}
                            </h2>
                        </div>
                        <div class="">

                        </div>
                    </div>
                    <hr class="pb-5">
                    <div class="relative overflow-x-auto">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <div class="flex items-center justify-between pb-4">
                                <div>

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
                                        <th scope="col" class="px-6 py-3">
                                            Mangrove
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Tanggal Tanam
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Jumlah Tanam
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Pihak Tanam
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Status Tanam
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Lahan
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    @foreach ($data as $item)
                                        <tr
                                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $item->mangroveindo }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $item->tgltanam }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $item->jmltanam }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $item->pihak_tanam }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $item->statustanam }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $item->namalahan }}
                                            </td>
                                            <td class="px-6 py-4">
                                                <a href="{{ route('monitoringdetail', $item->idtanam) }}"
                                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Detail</a>
                                            </td>
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
