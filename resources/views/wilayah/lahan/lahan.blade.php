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
                            <select id="kecamatan_select" class="block py-2.5 px-0 text-sm w-32 text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer mr-4 mb-2">
                                <option value="0">Kecamatan</option>
                                @foreach ($kecamatan as $item)
                                <option value="{{ $item->idkec }}">{{ $item->namakec }}</option>
                                @endforeach
                            </select>
                            <select id="desa_select" class="block py-2.5 px-0 text-sm w-32 text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer mr-4 mb-2">
                                <option value="0">Desa</option>
                                @foreach ($desa as $item)
                                <option value="{{ $item->iddes }}">{{ $item->namadesa }}</option>
                                @endforeach
                            </select>
                            <button id="btn_search" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded float-right mb-2">Cari
                            </button>
                            <form action="#" method="post" id="formSearch">
                                @method('GET')

                            </form>
                        </div>
                        <div class="">
                            <form action="{{ action('LahanController@create') }}">
                                <button type="submit" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded float-right mb-2">Tambah
                                </button>
                            </form>
                        </div>
                    </div>
                    <hr>
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Nama lahan</th>
                                <th class="px-4 py-2">Kepemilikan</th>
                                <th class="px-4 py-2">Luas</th>
                                <th class="">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td class="border px-4 py-2">{{ $item->namalahan }}</td>
                                <td class="border px-4 py-2">{{ $item->kepemilikan }}</td>
                                <td class="border px-4 py-2">{{ $item->luas }}</td>
                                <td class="border text-center">
                                    <form action="{{ route('lahan.destroy', $item->idlahan) }}" method="post" id="form_delete">
                                        <div class="justify-center">
                                            <a href="{{ route('lahan.edit', $item->idlahan) }}" class="inline-flex pr-5">

                                                <img src="{{ url('icon/edit.png') }}" alt="" width="20px" height="20px">
                                            </a>

                                            <button type="" class="inline-flex" onclick="delete">
                                                <img src="{{ url('icon/delete.png') }}" alt="" width="20px" height="20px">
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
    <x-slot name="js">
    </x-slot>
</x-app-layout>
<script src="vendor/sweetalert/sweetalert.all.js"></script>
<script type="text/javascript">
    var btn = $('#btn_search');
    var kecamatanSelect = $('#kecamatan_select');
    var desaSelect = $('#desa_select');
    var desa = {
        !!json_encode($desa) !!
    }

    btn.click(function(e) {
        e.preventDefault();
        var des = desaSelect.val()
        if (des != "0") {
            $("#formSearch").attr('action', "{{ url('/lahan') }}/" + des);
            $("#formSearch").submit();
        } else {
            window.location.href = "{{ url('/lahan') }}";
        }
    });

    $(kecamatanSelect).change(function(e) {
        e.preventDefault();
        var idkec = $(this).val()
        const found = desa.filter(element => element.idkec == idkec);
        desaSelect.empty();
        desaSelect.append($("<option></option>")
            .attr("value", "").text("Desa"));
        if (found !== 0) {
            $.each(found, function(key, value) {
                desaSelect.append($("<option></option>")
                    .attr("value", value.iddes).text(value.namadesa));
            });
        }
        if (idkec == 0) {
            console.log(desa);
            $.each(desa, function(key, value) {
                desaSelect.append($("<option></option>")
                    .attr("value", value.iddes).text(value.namadesa));
            });
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
                // $('#form_delete').submit();
            }
        })
    }
</script>