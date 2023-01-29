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
                    <h5 class="font-semibold text-xl text-gray-800 leading-tight pt-3 text-center">
                        {{ __('Bibit Mangrove') }}
                    </h5>
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
                    <hr>
                    <div class="grid grid-cols-3 py-3">
                        <div class="flex"></div>
                        <div class="">
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight pt-3 text-center">
                                {{ __('Monitoring Bibit') }}
                            </h2>
                        </div>
                        <div class="float-right">
                            <form action="{{ action('BibitMangroveMonevController@create') }}">
                                <button
                                    class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded float-right">Tambah
                                </button>
                            </form>
                        </div>
                    </div>
                    <hr>
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Tanggal Monev</th>
                                <th class="px-4 py-2">Tinggi Bibit</th>
                                <th class="px-4 py-2">Jumlah Daun</th>
                                <th class="px-4 py-2">Foto</th>
                                <th class="">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td class="border px-4 py-2">{{ $item->tglmonev }}</td>
                                    <td class="border px-4 py-2">{{ $item->tinggibibit }}</td>
                                    <td class="border px-4 py-2">{{ $item->jml_daun }}</td>
                                    <td class="border px-4 py-2">
                                        <img src="{{ url('/image/bibitmangrovemonev/' . $item->foto) }}" alt=""
                                            srcset="" width="100" height="100" class="m-auto">
                                    </td>

                                    <td class="border text-center">
                                        <form action="{{ route('bibitmonev.destroy', $item->idmonevbibit) }}"
                                            method="post" id="form_delete">

                                            <div class="justify-center">
                                                <a href="{{ route('bibitmonev.edit', $item->idmonevbibit) }}"
                                                    class="inline-flex pr-5">
                                                    <img src="{{ url('icon/edit.png') }}" alt="" width="20px"
                                                        height="20px">
                                                </a>

                                                <button class="inline-flex">
                                                    <img src="{{ url('icon/delete.png') }}" alt=""
                                                        width="20px" height="20px">
                                                </button>
                                            </div>
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <x-slot name="js">
    </x-slot>
</x-app-layout>
