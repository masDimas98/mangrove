<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div id="controls-carousel" class="relative" data-carousel="slide">
                    <!-- Carousel wrapper -->
                    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                        <!-- Item 1 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="https://c4.wallpaperflare.com/wallpaper/596/347/680/garigal-national-park-mangrove-nature-reflection-wallpaper-preview.jpg"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                        <!-- Item 2 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                            <img src="https://c1.wallpaperflare.com/preview/20/960/841/mangrove-green-tropical-plant.jpg"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                        <!-- Item 3 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="https://c4.wallpaperflare.com/wallpaper/29/657/82/forest-lake-river-forest-tropical-hd-wallpaper-preview.jpg"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                        <!-- Item 4 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="https://p4.wallpaperbetter.com/wallpaper/596/347/680/garigal-national-park-mangrove-nature-reflection-wallpaper-preview.jpg"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                        <!-- Item 5 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="https://c4.wallpaperflare.com/wallpaper/985/204/863/forest-lake-river-forest-wallpaper-preview.jpg"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                    </div>
                    <!-- Slider controls -->
                    <button type="button"
                        class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-prev>
                        <span
                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg aria-hidden="true" class="w-6 h-6 text-white dark:text-gray-800" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7">
                                </path>
                            </svg>
                            <span class="sr-only">Previous</span>
                        </span>
                    </button>
                    <button type="button"
                        class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-next>
                        <span
                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg aria-hidden="true" class="w-6 h-6 text-white dark:text-gray-800" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                            <span class="sr-only">Next</span>
                        </span>
                    </button>
                </div>

                <div class="p-6 border-b border-gray-200">
                    <div class="grid sm:grid-cols-1 lg:grid-cols-2 gap-4">
                        <div class="border  p-6 border-b border-gray-200">
                            <div>
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                        <div class="border  p-6 border-b border-gray-200">
                            <div>
                                <canvas id="myChart1"></canvas>
                            </div>
                        </div>
                        <div class="border  p-6 border-b border-gray-200">
                            <div>
                                <canvas id="myChart2"></canvas>
                            </div>
                        </div>
                        <div class="border  p-6 border-b border-gray-200">
                            <div>
                                <canvas id="myChart3"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <x-slot name="js">
        <script>
            const mangrovelahan = ["Lahan A", "Lahan B", "Lahan C", "lahan D"];
            const mangrovelahanData = {
                labels: mangrovelahan,
                datasets: [{
                        label: 'Mangrove A',
                        backgroundColor: 'rgb(24, 99, 132)',
                        borderColor: 'rgb(25, 99, 132)',
                        data: [0, 5, 2, 10, 0, 4],
                    },
                    {
                        label: 'Mangrove B',
                        backgroundColor: 'rgb(12, 99, 132)',
                        borderColor: 'rgb(10, 99, 132)',
                        data: [0, 1, 3, 20, 0, 4],
                    },
                    {
                        label: 'Mangrove C',
                        backgroundColor: 'rgb(12, 99, 132)',
                        borderColor: 'rgb(10, 99, 132)',
                        data: [0, 3, 10, 9, 0, 9],
                    }
                ]
            };
            const mangrovelahanConfig = {
                type: 'line',
                data: mangrovelahanData,
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            title: {
                                display: true,
                                text: 'Jumlah'
                            },
                            // ticks: {
                            //     display: true,
                            //     text: 'test'
                            //     // Include a dollar sign in the ticks
                            //     // callback: function(value, index, ticks) {
                            //     //     return '$' + value;
                            //     // }
                            // }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Lahan'
                            },
                        }
                    },
                    plugins: {
                        title: {
                            display: true,
                            text: 'Mangrove Berdasarkan Lahan'
                        }
                    }
                }
            };


            const mangrovestatus = ["Layu", "Tidak Ada Pertumbuhan", "Sehat"];
            const mangrovestatusData = {
                labels: mangrovestatus,
                datasets: [{
                        label: 'Mangrove A',
                        backgroundColor: 'rgb(255, 99, 132)',
                        borderColor: 'rgb(255, 99, 132)',
                        data: [4, 5, 2],
                    },
                    {
                        label: 'Mangrove B',
                        backgroundColor: 'rgb(100, 99, 132)',
                        borderColor: 'rgb(100, 99, 132)',
                        data: [7, 1, 3],
                    },
                    {
                        label: 'Mangrove C',
                        backgroundColor: 'rgb(12, 99, 132)',
                        borderColor: 'rgb(10, 99, 132)',
                        data: [2, 3, 10],
                    }
                ]
            };
            const mangrovestatusConfig = {
                type: 'bar',
                data: mangrovestatusData,
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            title: {
                                display: true,
                                text: 'Jumlah'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Status'
                            }
                        }
                    },
                    plugins: {
                        title: {
                            display: true,
                            text: 'mangrove Berdasarkan Status'
                        }
                    }
                }
            };


            const mangrovedinas = ["Mangrove A", "Mangrove B", "Mangrove C"];
            const mangrovedinasData = {
                labels: mangrovedinas,
                datasets: [{
                        label: 'Dinas A',
                        backgroundColor: 'rgb(255, 99, 132)',
                        borderColor: 'rgb(255, 99, 132)',
                        data: [4, 5, 8],
                    },
                    {
                        label: 'Dinas B',
                        backgroundColor: 'rgb(100, 99, 132)',
                        borderColor: 'rgb(100, 99, 132)',
                        data: [6, 1, 3],
                    },
                    {
                        label: 'Dinas C',
                        backgroundColor: 'rgb(12, 99, 132)',
                        borderColor: 'rgb(10, 99, 132)',
                        data: [2, 3, 10],
                    }
                ]
            };
            const mangrovedinasConfig = {
                type: 'bar',
                data: mangrovedinasData,
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            title: {
                                display: true,
                                text: 'Jumlah'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Mangrove'
                            }
                        }
                    },
                    plugins: {
                        title: {
                            display: true,
                            text: 'Berdasarkan Disa Menanam'
                        }
                    }
                }
            };
            // var usersWeeklyChart = new Chart(
            //     document.getElementById('usersWeeklyChart'),
            //     weeklyConfig
            // );

            const mangrovejenisLabels = ["November", "December", "January", "February", "March", "April"];
            const mangrovejenisData = {
                labels: mangrovejenisLabels,
                datasets: [{
                        label: 'Jenis A',
                        backgroundColor: 'rgb(255, 99, 132)',
                        borderColor: 'rgb(255, 99, 132)',
                        data: [0, 0, 0, 0, 0, 4],
                    },
                    {
                        label: 'Jenis B',
                        backgroundColor: 'rgb(100, 99, 132)',
                        borderColor: 'rgb(100, 99, 132)',
                        data: [0, 0, 0, 0, 0, 4],
                    },
                    {
                        label: 'Jenis C',
                        backgroundColor: 'rgb(12, 99, 132)',
                        borderColor: 'rgb(10, 99, 132)',
                        data: [0, 3, 10, 9, 0, 9],
                    }
                ]
            };
            const mangrovejenisConfig = {
                type: 'line',
                data: mangrovejenisData,
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            title: {
                                display: true,
                                text: 'Jumlah'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Bulan'
                            }
                        }
                    },
                    plugins: {
                        title: {
                            display: true,
                            text: 'Perkembangan Penanaman'
                        }
                    }
                }
            };
            var usersMonthlyChart = new Chart(
                document.getElementById('myChart'),
                mangrovelahanConfig
            );
            var usersMonthlyChart1 = new Chart(
                document.getElementById('myChart1'),
                mangrovestatusConfig
            );
            var usersMonthlyChart2 = new Chart(
                document.getElementById('myChart2'),
                mangrovedinasConfig
            );
            var usersMonthlyChart2 = new Chart(
                document.getElementById('myChart3'),
                mangrovejenisConfig
            );
        </script>
    </x-slot>
</x-app-layout>
