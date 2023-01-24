<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mangrove') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <ul class="flex border-b">
                <li class="-mb-px mr-1">
                    <a class="bg-white inline-block border-l border-t border-r rounded-t py-2 px-4 text-blue-700 font-semibold" href="#">Jenis</a>
                </li>
                <li class="mr-1">
                    <a class="bg-white inline-block py-2 px-4 text-blue-500 hover:text-blue-800 font-semibold" href="{{ url('/mangrove') }}">Daftar</a>
                </li>
            </ul>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-2">
                        <div>
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight pt-3">
                                {{ __('Jenis Mangrove') }}
                            </h2>
                        </div>
                        <div class="">
                            <form action="{{ action('JenisMangroveController@create') }}">
                                <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded float-right mb-2">Tambah
                                </button>
                            </form>
                        </div>
                    </div>
                    <hr>
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Nama Latin</th>
                                <th class="px-4 py-2">Nama Indonesia</th>
                                <th class="">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td class="border px-4 py-2">{{ $item->namajenislatin }}</td>
                                <td class="border px-4 py-2">{{ $item->namajenisindo }}</td>
                                <td class="border text-center">
                                    <form action="{{ route('jenismangrove.destroy', $item->idjenis) }}" method="post" id="form_delete">

                                        <div class="justify-center">
                                            <a href="{{ route('jenismangrove.edit', $item->idjenis) }}" class="inline-flex pr-5">
                                                <img src="{{ url('icon/edit.png') }}" alt="" width="20px" height="20px">
                                            </a>

                                            <button type="" class="inline-flex" onclick="delete">
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
<script type="text/javascript">
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