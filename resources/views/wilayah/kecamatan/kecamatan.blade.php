<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Wilayah') }} / {{ __('Kecamatan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="float-right mb-2">
                        <form action="{{ action('KecamatanController@create') }}">
                            <button type="submit"
                                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Tambah
                            </button>
                        </form>
                    </div>
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Nama Kecamatan</th>
                                <th class="">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td class="border px-4 py-2">{{ $item->namakec }}</td>
                                    <td class="border text-center">
                                        <form action="{{ route('kecamatan.destroy', $item->idkec) }}" method="post">
                                            <div class="justify-center">
                                                <a href="{{ route('kecamatan.edit', $item->idkec) }}"
                                                    class="inline-flex pr-5">

                                                    <img src="{{ url('icon/edit.png') }}" alt="" width="20px"
                                                        height="20px">
                                                </a>

                                                <button type="submit" class="inline-flex">
                                                    <img src="{{ url('icon/delete.png') }}" alt=""
                                                        width="20px" height="20px">
                                                </button>
                                                @csrf
                                                @method('DELETE')
                                            </div>
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
</x-app-layout>
