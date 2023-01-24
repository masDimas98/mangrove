<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mangrove') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <ul class="flex border-b">
                <li class="mr-1">
                    <a class="bg-white inline-block py-2 px-4 text-blue-500 hover:text-blue-800 font-semibold" href="{{ url('/jenismangrove') }}">Jenis</a>
                </li>
                <li class="-mb-px mr-1">
                    <a class="bg-white inline-block border-l border-t border-r rounded-t py-2 px-4 text-blue-700 font-semibold" href="#">Daftar</a>
                </li>

            </ul>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-3">
                        <div class="flex">
                            <label for="jenis_select" class="sr-only">Underline select</label>
                            <select id="jenis_select" class="block py-2.5 px-0 w-32 text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer mr-4 mb-2">
                                <option value="0" selected>Jenis Mangrove</option>
                                @foreach ($jenismangrove as $item)
                                @if (isset($filter))
                                @if ($filter == $item->idjenis)
                                <option value="{{ $item->idjenis }}" selected>{{ $item->namajenisindo }}
                                </option>
                                @else
                                <option value="{{ $item->idjenis }}">{{ $item->namajenisindo }}</option>
                                @endif
                                @else
                                <option value="{{ $item->idjenis }}">{{ $item->namajenisindo }}</option>
                                @endif
                                @endforeach

                            </select>
                            <form action="" method="post" id="formSearch">
                                @method('GET')
                            </form>
                            <button id="btn_search" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded float-right mb-2">Cari
                            </button>
                        </div>
                        <div class="">
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight pt-3 text-center">
                                {{ __('Daftar Mangrove') }}
                            </h2>
                        </div>
                        <div class="">
                            <form action="{{ action('MangroveController@create') }}">
                                <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded float-right mb-2">Tambah
                                </button>
                            </form>
                        </div>
                    </div>
                    <hr>
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Mangrove Latin</th>
                                <th class="px-4 py-2">Mangrove Indonesia</th>
                                <th class="">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td class="border px-4 py-2">{{ $item->mangrovelatin }}</td>
                                <td class="border px-4 py-2">{{ $item->mangroveindo }}</td>
                                <td class="border text-center">
                                    <form action="{{ route('mangrove.destroy', $item->idmangrove) }}" method="post" id="form_delete">

                                        <div class="justify-center">
                                            <a href="{{ route('mangrove.edit', $item->idmangrove) }}" class="inline-flex pr-5">
                                                <img src="{{ url('icon/edit.png') }}" alt="" width="20px" height="20px">
                                            </a>

                                            <button class="inline-flex">
                                                <img src="{{ url('icon/delete.png') }}" alt="" width="20px" height="20px">
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
<script src="vendor/sweetalert/sweetalert.all.js"></script>
<script src="{{ asset('js/myjs.js') }}"></script>
<script type="text/javascript">
    btn = $('#btn_search');
    btn.click(function(e) {
        var id = $('#jenis_select').val();
        console.log(id);

        // searchData(id);
        if (id != "0") {
            $("#formSearch").attr('action', "{{ url('/mangrove') }}/" + id);
            $("#formSearch").submit();
        } else {
            window.location.href = "{{ url('/mangrove') }}";
        }
    });

    // $(document).ready(function() {
    //     function delete() {
    //         Swal.fire({
    //             title: 'Are you sure?',
    //             text: "You won't be able to revert this!",
    //             icon: 'warning',
    //             showCancelButton: true,
    //             confirmButtonColor: '#3085d6',
    //             cancelButtonColor: '#d33',
    //             confirmButtonText: 'Yes, delete it!'
    //         }).then((result) => {
    //             if (result.isConfirmed) {
    //                 Swal.fire(
    //                     'Deleted!',
    //                     'Your file has been deleted.',
    //                     'success'
    //                 )
    //                 // $('#form_delete').submit();
    //             }
    //         });
    //     };
    // });
</script>