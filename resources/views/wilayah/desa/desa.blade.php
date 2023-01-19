<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Wilayah') }} / {{ __('Desa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-2">
                        <div class="flex">
                            <label for="underline_select" class="sr-only">Underline select</label>
                            <select id="kecamatan_select"
                                class="block py-2.5 px-0 w-36 text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer mr-4 mb-2">
                                <option value="0" selected>Semua Kecamatan</option>
                                @foreach ($kecamatan as $kecamatan)
                                    @if (isset($filter))
                                        @if ($filter == $kecamatan->idkec)
                                            <option value="{{ $kecamatan->idkec }}" selected>
                                                {{ $kecamatan->namakec }}
                                            </option>
                                        @else
                                            <option value="{{ $kecamatan->idkec }}">{{ $kecamatan->namakec }}
                                            </option>
                                        @endif
                                    @else
                                        <option value="{{ $kecamatan->idkec }}">{{ $kecamatan->namakec }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <form action="{{ action('DesaController@show', 1) }}" method="post" id="formSearch">
                                @method('GET')

                            </form>
                            <button id="btn_search"
                                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded float-right mb-2">Cari
                            </button>
                        </div>
                        <div class="">
                            <form action="{{ action('DesaController@create') }}">
                                <button
                                    class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded float-right mb-2">Tambah
                                </button>
                            </form>
                        </div>
                    </div>
                    <hr>
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Nama Kecamatan</th>
                                <th class="px-4 py-2">Nama desa</th>
                                <th class="">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td class="border px-4 py-2">{{ $item->namakec }}</td>
                                    <td class="border px-4 py-2">{{ $item->namadesa }}</td>
                                    <td class="border text-center">
                                        <form action="{{ route('desa.destroy', $item->iddes) }}" method="post"
                                            id="form_delete">
                                            <div class="justify-center">
                                                <a href="{{ route('desa.edit', $item->iddes) }}"
                                                    class="inline-flex pr-5">
                                                    <img src="{{ url('icon/edit.png') }}" alt="" width="20px"
                                                        height="20px">
                                                </a>

                                                <button type="" class="inline-flex" onclick="delete">
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
</x-app-layout>
<script src="vendor/sweetalert/sweetalert.all.js"></script>
<script type="text/javascript">
    btn = $('#btn_search');
    btn.click(function(e) {
        e.preventDefault();
        var kec = $('#kecamatan_select').val()
        if (kec != "0") {
            $("#formSearch").attr('action', "{{ url('/desa') }}/" + kec);
            $("#formSearch").submit();
        } else {
            window.location.href = "{{ url('/desa') }}";
        }
    });

    function delete() {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
                $('#form_delete').submit();
            }
        })
    }
</script>
