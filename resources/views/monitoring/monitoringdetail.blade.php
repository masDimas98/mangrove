<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Monitoring') }} / {{ __('Daftar Tanaman') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <ul class="flex border-b">
                <li class="-mb-px mr-1">
                    <a class="bg-white inline-block border-l border-t border-r rounded-t py-2 px-4 text-blue-700 font-semibold"
                        href="#">Monitoring</a>
                </li>
                <li class="mr-1">
                    <a class="bg-white inline-block py-2 px-4 text-blue-500 hover:text-blue-800 font-semibold"
                        href="{{ route('mangrove') }}"></a>
                </li>
            </ul> --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-3">
                        <div>
                            {{-- <button
                                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded float-left mb-2">Filter
                            </button> --}}
                        </div>
                        <div>
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight pt-3 text-center">
                                {{ __('Daftar Tanam') }}
                            </h2>
                        </div>
                        <div class="">
                            {{-- <button
                                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded float-right mb-2">Monev
                            </button> --}}
                        </div>
                    </div>
                    <hr>
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Kode Mangrove</th>
                                <th class="px-4 py-2">Tanggal</th>
                                <th class="px-4 py-2">Tinggi Tanaman</th>
                                <th class="px-4 py-2">Lebar Tanaman</th>
                                <th class="px-4 py-2">Status</th>
                                <th class="px-4 py-2">Monev</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border px-4 py-2">AC-001</td>
                                <td class="border px-4 py-2">12-12-2022</td>
                                <td class="border px-4 py-2">68 cm</td>
                                <td class="border px-4 py-2">20 cm</td>
                                <td class="border px-4 py-2">
                                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative text-center"
                                        role="alert">
                                        <strong class="font-bold ">Data Tersimpan!</strong>
                                </td>
                                <td class="border text-center">
                                    <div class="justify-center">
                                        <button
                                            class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded mb-2">Tambah
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="border px-4 py-2">AC-002</td>
                                <td class="border px-4 py-2">-</td>
                                <td class="border px-4 py-2">-</td>
                                <td class="border px-4 py-2">-</td>
                                <td class="border px-4 py-2">
                                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative text-center"
                                        role="alert">
                                        <strong class="font-bold ">Data Kosong!</strong>
                                </td>
                                <td class="border text-center">
                                    <div class="justify-center">
                                        <button
                                            class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded mb-2">Tambah
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="border px-4 py-2">AC-003</td>
                                <td class="border px-4 py-2">-</td>
                                <td class="border px-4 py-2">-</td>
                                <td class="border px-4 py-2">-</td>
                                <td class="border px-4 py-2">
                                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative text-center"
                                        role="alert">
                                        <strong class="font-bold ">Data Kosong!</strong>
                                </td>
                                <td class="border text-center">
                                    <div class="justify-center">
                                        <button
                                            class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded mb-2">Tambah
                                        </button>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
