<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Penanaman') }} / {{ __('Detail Tanaman') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <ul class="flex border-b">
                <li class="-mb-px mr-1">
                    <a class="bg-white inline-block border-l border-t border-r rounded-t py-2 px-4 text-blue-700 font-semibold"
                        href="#">Penanaman</a>
                </li>
                <li class="mr-1">
                    <a class="bg-white inline-block py-2 px-4 text-blue-500 hover:text-blue-800 font-semibold"
                        href="{{ route('mangrove') }}"></a>
                </li>
            </ul>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-3">
                        <div>
                            <button
                                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded float-left mb-2">Filter
                            </button>
                        </div>
                        <div>
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight pt-3 text-center">
                                {{ __('Daftar Tanam') }}
                            </h2>
                        </div>
                        <div class="">
                            <button
                                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded float-right mb-2">Tambah
                            </button>
                        </div>
                    </div>
                    <hr>
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Mangrove</th>
                                <th class="px-4 py-2">Tanggal Tanam</th>
                                <th class="px-4 py-2">Jumlah Tanam</th>
                                <th class="px-4 py-2">Pihak Tanam</th>
                                <th class="px-4 py-2">Status Tanam</th>
                                <th class="px-4 py-2">Lahan</th>
                                <th class="px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border px-4 py-2">Nama Mangrove</td>
                                <td class="border px-4 py-2">12-2-2022</td>
                                <td class="border px-4 py-2">150</td>
                                <td class="border px-4 py-2">Kantor</td>
                                <td class="border px-4 py-2">Tanam</td>
                                <td class="border px-4 py-2">Lahan 1</td>
                                <td class="border text-center">
                                    <div class="justify-center">
                                        <a href="" class="inline-flex pr-4">
                                            <img src="{{ url('icon/delete.png') }}" alt="" width="20px"
                                                height="20px">
                                        </a>

                                        <a href="" class="inline-flex pr-4">
                                            <img src="{{ url('icon/edit.png') }}" alt="" width="20px"
                                                height="20px">
                                        </a>

                                        <a href="" class="inline-flex">
                                            <img src="{{ url('icon/detail.png') }}" alt="" width="20px"
                                                height="20px">
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="border px-4 py-2">Nama Mangrove</td>
                                <td class="border px-4 py-2">12-26-2022</td>
                                <td class="border px-4 py-2">322</td>
                                <td class="border px-4 py-2">Kantor</td>
                                <td class="border px-4 py-2">Tanam</td>
                                <td class="border px-4 py-2">Lahan 2</td>
                                <td class="border text-center">
                                    <a href="" class="inline-flex pr-4">
                                        <img src="{{ url('icon/delete.png') }}" alt="" width="20px"
                                            height="20px">
                                    </a>

                                    <a href="" class="inline-flex pr-4">
                                        <img src="{{ url('icon/edit.png') }}" alt="" width="20px"
                                            height="20px">
                                    </a>

                                    <a href="" class="inline-flex">
                                        <img src="{{ url('icon/detail.png') }}" alt="" width="20px"
                                            height="20px">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="border px-4 py-2">Nama Mangrove</td>
                                <td class="border px-4 py-2">12-12-2022</td>
                                <td class="border px-4 py-2">120</td>
                                <td class="border px-4 py-2">Kantor</td>
                                <td class="border px-4 py-2">Tanam</td>
                                <td class="border px-4 py-2">Lahan 3</td>
                                <td class="border text-center">
                                    <a href="" class="inline-flex pr-4">
                                        <img src="{{ url('icon/delete.png') }}" alt="" width="20px"
                                            height="20px">
                                    </a>

                                    <a href="" class="inline-flex pr-4">
                                        <img src="{{ url('icon/edit.png') }}" alt="" width="20px"
                                            height="20px">
                                    </a>

                                    <a href="" class="inline-flex">
                                        <img src="{{ url('icon/detail.png') }}" alt="" width="20px"
                                            height="20px">
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
