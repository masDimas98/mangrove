<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="float-right mb-2">

                        <button
                            class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Tambah
                        </button>
                    </div>
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Nama</th>
                                <th class="px-4 py-2">Email</th>
                                <th class="px-4 py-2">No Telpon</th>
                                <th class="px-4 py-2">Hak Akses</th>
                                <th class="">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border px-4 py-2">nama user</td>
                                <td class="border px-4 py-2">nama@gmail.com</td>
                                <td class="border px-4 py-2">32112322</td>
                                <td class="border px-4 py-2">Super Admin</td>
                                <td class="border text-center">
                                    <div class="justify-center">
                                        <a href="" class="inline-flex">
                                            <img src="{{ url('icon/delete.png') }}" alt="" width="20px"
                                                height="20px">
                                        </a>

                                        <a href="" class="inline-flex">
                                            <img src="{{ url('icon/edit.png') }}" alt="" width="20px"
                                                height="20px">
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="border px-4 py-2">nama user</td>
                                <td class="border px-4 py-2">nama@gmail.com</td>
                                <td class="border px-4 py-2">12313221</td>
                                <td class="border px-4 py-2">Operator Web</td>
                                <td class="border text-center">
                                    <a href="" class="inline-flex text-center">
                                        <img src="{{ url('icon/delete.png') }}" alt="" width="20px"
                                            height="20px">
                                    </a>

                                    <a href="" class="inline-flex">
                                        <img src="{{ url('icon/edit.png') }}" alt="" width="20px"
                                            height="20px">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="border px-4 py-2">nama user</td>
                                <td class="border px-4 py-2">nama@gmail.com</td>
                                <td class="border px-4 py-2">123123132</td>
                                <td class="border px-4 py-2">Surveyor</td>
                                <td class="border text-center">
                                    <a href="" class="inline-flex">
                                        <img src="{{ url('icon/delete.png') }}" alt="" width="20px"
                                            height="20px">
                                    </a>

                                    <a href="" class="inline-flex">
                                        <img src="{{ url('icon/edit.png') }}" alt="" width="20px"
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
