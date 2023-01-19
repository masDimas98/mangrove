<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                {{-- <div class="p-6 border-b border-gray-200"> --}}
                <div class="grid sm:grid-cols-1 lg:grid-cols-2 gap-4">
                    <div class="border bg-white p-6 border-b border-gray-200">
                        <div>
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                    <div class="border bg-white p-6 border-b border-gray-200">
                        <div>
                            <canvas id="myChart1"></canvas>
                        </div>
                    </div>
                    <div class="border bg-white p-6 border-b border-gray-200">
                        <div>
                            <canvas id="myChart2"></canvas>
                        </div>
                    </div>
                    <div class="border bg-white p-6 border-b border-gray-200">
                        <div>
                            <canvas id="myChart3"></canvas>
                        </div>
                    </div>
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.1.1/dist/chart.min.js"></script>
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
