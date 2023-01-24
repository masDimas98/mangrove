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
                    <div class="grid grid-cols-3">
                        <div class="flex">
                            <label for="jenis_select" class="sr-only">Underline select</label>
                            <select id="jenis_select"
                                class="block py-2.5 px-0 w-32 text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer mr-4 mb-2">
                                <option value="0" selected>Jenis Mangrove</option>
                                @foreach ($mangrove as $item)
                                    @if (isset($filter))
                                        @if ($filter == $item->idmangrove)
                                            <option value="{{ $item->idmangrove }}" selected>{{ $item->mangroveindo }}
                                            </option>
                                        @else
                                            <option value="{{ $item->idmangrove }}">{{ $item->mangroveindo }}</option>
                                        @endif
                                    @else
                                        <option value="{{ $item->idmangrove }}">{{ $item->mangroveindo }}</option>
                                    @endif
                                @endforeach

                            </select>
                            <form action="" method="post" id="formSearch">
                                @method('GET')
                            </form>
                            <button id="btn_search"
                                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded float-right mb-2">Cari
                            </button>
                        </div>
                        <div class="">
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight pt-3 text-center">
                                {{ __('Monitoring Bibit') }}
                            </h2>
                        </div>
                        <div class="float-right mb-2">
                            <form action="{{ action('BibitMangroveController@create') }}">
                                <button
                                    class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded float-right mb-2">Tambah
                                </button>
                            </form>
                        </div>
                    </div>
                    <hr>
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Mangrove</th>
                                <th class="px-4 py-2">Tanggal Tanam</th>
                                <th class="px-4 py-2">Foto</th>
                                <th class="">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td class="border px-4 py-2">{{ $item->mangroveindo }}</td>
                                    <td class="border px-4 py-2">{{ $item->tgltanam }}</td>
                                    <td class="border px-4 py-2 ">
                                        <img src="{{ url('/image/bibitmangrove/' . $item->foto) }}" alt=""
                                            srcset="" width="100" height="100">
                                    </td>
                                    <td class="border text-center">
                                        <form action="{{ route('bibit.destroy', $item->idbibit) }}" method="post"
                                            id="form_delete">

                                            <div class="justify-center">
                                                <a href="{{ route('bibit.edit', $item->idbibit) }}"
                                                    class="inline-flex pr-5">
                                                    <img src="{{ url('icon/edit.png') }}" alt="" width="20px"
                                                        height="20px">
                                                </a>

                                                <button class="inline-flex">
                                                    <img src="{{ url('icon/delete.png') }}" alt=""
                                                        width="20px" height="20px">
                                                </button>

                                                <a href="{{ route('bibit.detail', $item->idbibit) }}"
                                                    class="inline-flex pr-5">
                                                    <img src="{{ url('icon/edit.png') }}" alt="" width="20px"
                                                        height="20px">
                                                </a>
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
