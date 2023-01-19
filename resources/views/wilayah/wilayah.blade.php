<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Wilayah') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-3">
                        <div class="">
                            <div class="max-w-sm rounded overflow-hidden shadow-lg">
                                {{-- <img class="w-full" src="/img/card-top.jpg" alt="Sunset in the mountains"> --}}
                                <div class="px-6 py-4">
                                    <div class="font-bold text-xl mb-2">
                                        <a href="/kecamatan">kecamatan</a>
                                    </div>
                                    <p class="text-gray-700 text-base">3</p>
                                </div>
                                <div class="px-6 pt-4 pb-9">
                                    <div class="float-right m-0">
                                        <a href="/kecamatan"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold mb-3 py-2 px-4 rounded-full">detail</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="max-w-sm rounded overflow-hidden shadow-lg">
                                {{-- <img class="w-full" src="/img/card-top.jpg" alt="Sunset in the mountains"> --}}
                                <div class="px-6 py-4">
                                    <div class="font-bold text-xl mb-2">
                                        <a href="/desa">desa</a>
                                    </div>
                                    <p class="text-gray-700 text-base">10</p>
                                </div>
                                <div class="px-6 pt-4 pb-9">
                                    <div class="float-right m-0">
                                        <a href="/desa"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold mb-3 py-2 px-4 rounded-full">detail</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="max-w-sm rounded overflow-hidden shadow-lg">
                                {{-- <img class="w-full" src="/img/card-top.jpg" alt="Sunset in the mountains"> --}}
                                <div class="px-6 py-4">
                                    <div class="font-bold text-xl mb-2">
                                        <a href="/lahan">lahan</a>
                                    </div>
                                    <p class="text-gray-700 text-base">50</p>
                                </div>
                                <div class="px-6 pt-4 pb-9">
                                    <div class="float-right m-0">
                                        <a href="/lahan"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold mb-3 py-2 px-4 rounded-full">Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
