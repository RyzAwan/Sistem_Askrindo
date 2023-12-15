<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- {{ __("You're logged in!") }} --}}
                    <div class="flex flex-row justify-between items-center mb-8">
                        <p class="text-center text-xl">
                            {{ $month . ' ' . $year }}
                        </p>
                        <a href="/laporan/export/"
                            class="cursor-pointer inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
                            type="button">
                            <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20"
                                height="20" viewBox="0 0 50 50">
                                <path
                                    d="M 28.875 0 C 28.855469 0.0078125 28.832031 0.0195313 28.8125 0.03125 L 0.8125 5.34375 C 0.335938 5.433594 -0.0078125 5.855469 0 6.34375 L 0 43.65625 C -0.0078125 44.144531 0.335938 44.566406 0.8125 44.65625 L 28.8125 49.96875 C 29.101563 50.023438 29.402344 49.949219 29.632813 49.761719 C 29.859375 49.574219 29.996094 49.296875 30 49 L 30 44 L 47 44 C 48.09375 44 49 43.09375 49 42 L 49 8 C 49 6.90625 48.09375 6 47 6 L 30 6 L 30 1 C 30.003906 0.710938 29.878906 0.4375 29.664063 0.246094 C 29.449219 0.0546875 29.160156 -0.0351563 28.875 0 Z M 28 2.1875 L 28 6.53125 C 27.867188 6.808594 27.867188 7.128906 28 7.40625 L 28 42.8125 C 27.972656 42.945313 27.972656 43.085938 28 43.21875 L 28 47.8125 L 2 42.84375 L 2 7.15625 Z M 30 8 L 47 8 L 47 42 L 30 42 L 30 37 L 34 37 L 34 35 L 30 35 L 30 29 L 34 29 L 34 27 L 30 27 L 30 22 L 34 22 L 34 20 L 30 20 L 30 15 L 34 15 L 34 13 L 30 13 Z M 36 13 L 36 15 L 44 15 L 44 13 Z M 6.6875 15.6875 L 12.15625 25.03125 L 6.1875 34.375 L 11.1875 34.375 L 14.4375 28.34375 C 14.664063 27.761719 14.8125 27.316406 14.875 27.03125 L 14.90625 27.03125 C 15.035156 27.640625 15.160156 28.054688 15.28125 28.28125 L 18.53125 34.375 L 23.5 34.375 L 17.75 24.9375 L 23.34375 15.6875 L 18.65625 15.6875 L 15.6875 21.21875 C 15.402344 21.941406 15.199219 22.511719 15.09375 22.875 L 15.0625 22.875 C 14.898438 22.265625 14.710938 21.722656 14.5 21.28125 L 11.8125 15.6875 Z M 36 20 L 36 22 L 44 22 L 44 20 Z M 36 27 L 36 29 L 44 29 L 44 27 Z M 36 35 L 36 37 L 44 37 L 44 35 Z">
                                </path>
                            </svg>
                            Download Excel
                        </a>
                    </div>
                    {{-- {{ $report }} --}}
                    <div class="grid grid-cols-12">
                        <div class="col-span-8">
                            <canvas id="myChart"></canvas>
                        </div>
                        <div class="col-span-4">
                            <canvas id="polarChart"></canvas>
                        </div>
                    </div>
                    <hr>
                    <p class="text-center text-xl mb-8 mt-10">
                        Target {{ $month . ' ' . $year }}
                    </p>
                    @if (isset($target))
                        <div class="grid grid-cols-12">
                            <div class="col-span-5">
                                <canvas id="targetDebit"></canvas>
                            </div>
                            <div class="col-span-1"></div>
                            <div class="col-span-5">
                                <canvas id="targetNominal"></canvas>
                            </div>
                        </div>
                    @else
                        <p class="text-center text-l mb-8 mt-10 text-gray-500">
                            Target belum ditetapkan
                        </p>
                    @endif

                </div>
            </div>
        </div>
    </div>

    <x-slot name="scripts">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", () => {

                const ctx = document.getElementById('myChart');
                const polarChart = document.getElementById('polarChart');

                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['A1', 'A2', 'A3', 'A4', 'A5'],
                        datasets: [{
                            label: 'Debit',
                            data: [{{ $report['a1_deb'] }},
                                {{ $report['a2_deb'] }},
                                {{ $report['a3_deb'] }},
                                {{ $report['a4_deb'] }},
                                {{ $report['a5_deb'] }},
                            ],
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgb(255, 99, 132)',
                            borderWidth: 1,
                        }, {
                            label: 'Nominal',
                            data: [{{ $report['a1_amount'] }},
                                {{ $report['a2_amount'] }},
                                {{ $report['a3_amount'] }},
                                {{ $report['a4_amount'] }},
                                {{ $report['a5_amount'] }},
                            ],
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgb(54, 162, 235)',
                            borderWidth: 1,
                        }, ]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

                const data = {
                    labels: [
                        'A1',
                        'A2',
                        'A3',
                        'A4',
                        'A5',
                    ],
                    datasets: [{
                        label: 'Debit',
                        data: [{{ $report['a1_deb'] }},
                            {{ $report['a2_deb'] }},
                            {{ $report['a3_deb'] }},
                            {{ $report['a4_deb'] }},
                            {{ $report['a5_deb'] }},
                        ],
                        fill: true,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgb(255, 99, 132)',
                        pointBackgroundColor: 'rgb(255, 99, 132)',
                        pointBorderColor: '#fff',
                        pointHoverBackgroundColor: '#fff',
                        pointHoverBorderColor: 'rgb(255, 99, 132)'
                    }, {
                        label: 'Nominal',
                        data: [{{ $report['a1_amount'] }},
                            {{ $report['a2_amount'] }},
                            {{ $report['a3_amount'] }},
                            {{ $report['a4_amount'] }},
                            {{ $report['a5_amount'] }},
                        ],
                        fill: true,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgb(54, 162, 235)',
                        pointBackgroundColor: 'rgb(54, 162, 235)',
                        pointBorderColor: '#fff',
                        pointHoverBackgroundColor: '#fff',
                        pointHoverBorderColor: 'rgb(54, 162, 235)'
                    }]
                };
                const config = {
                    type: 'radar',
                    data: data,
                    options: {
                        elements: {
                            line: {
                                borderWidth: 3
                            }
                        },
                        scales: {
                            r: {
                                pointLabels: {
                                    display: false // Hides the labels around the radar chart
                                },
                                ticks: {
                                    display: false // Hides the labels in the middel (numbers)
                                }
                            }
                        }
                    },
                };
                new Chart(polarChart, config);



                @isset($target)

                    const dataTargetDebit = {
                        labels: [
                            'A1',
                            'A2',
                            'A3',
                            'A4',
                            'A5',
                        ],
                        datasets: [{
                            label: 'Debit',
                            data: [{{ $report['a1_deb'] }},
                                {{ $report['a2_deb'] }},
                                {{ $report['a3_deb'] }},
                                {{ $report['a4_deb'] }},
                                {{ $report['a5_deb'] }},
                            ],
                            fill: true,
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgb(255, 99, 132)',
                            pointBackgroundColor: 'rgb(255, 99, 132)',
                            pointBorderColor: '#fff',
                            pointHoverBackgroundColor: '#fff',
                            pointHoverBorderColor: 'rgb(255, 99, 132)'
                        }, {
                            label: 'Target',
                            data: [{{ $target['a1_deb'] }},
                                {{ $target['a2_deb'] }},
                                {{ $target['a3_deb'] }},
                                {{ $target['a4_deb'] }},
                                {{ $target['a5_deb'] }},
                            ],
                            fill: true,
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgb(54, 162, 235)',
                            pointBackgroundColor: 'rgb(54, 162, 235)',
                            pointBorderColor: '#fff',
                            pointHoverBackgroundColor: '#fff',
                            pointHoverBorderColor: 'rgb(54, 162, 235)'
                        }]
                    };
                    const configTargetDebit = {
                        type: 'radar',
                        data: dataTargetDebit,
                        options: {
                            elements: {
                                line: {
                                    borderWidth: 3
                                }
                            },
                            scales: {
                                r: {
                                    pointLabels: {
                                        display: false // Hides the labels around the radar chart
                                    },
                                    ticks: {
                                        display: false // Hides the labels in the middel (numbers)
                                    }
                                }
                            }
                        },
                    };
                    const targetDebit = document.getElementById('targetDebit');

                    new Chart(targetDebit, configTargetDebit);



                    const dataTargetNominal = {
                        labels: [
                            'A1',
                            'A2',
                            'A3',
                            'A4',
                            'A5',
                        ],
                        datasets: [{
                            label: 'Nominal',
                            data: [{{ $report['a1_amount'] }},
                                {{ $report['a2_amount'] }},
                                {{ $report['a3_amount'] }},
                                {{ $report['a4_amount'] }},
                                {{ $report['a5_amount'] }},
                            ],
                            fill: true,
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgb(255, 99, 132)',
                            pointBackgroundColor: 'rgb(255, 99, 132)',
                            pointBorderColor: '#fff',
                            pointHoverBackgroundColor: '#fff',
                            pointHoverBorderColor: 'rgb(255, 99, 132)'
                        }, {
                            label: 'Target',
                            data: [{{ $target['a1_amount'] }},
                                {{ $target['a2_amount'] }},
                                {{ $target['a3_amount'] }},
                                {{ $target['a4_amount'] }},
                                {{ $target['a5_amount'] }},
                            ],
                            fill: true,
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgb(54, 162, 235)',
                            pointBackgroundColor: 'rgb(54, 162, 235)',
                            pointBorderColor: '#fff',
                            pointHoverBackgroundColor: '#fff',
                            pointHoverBorderColor: 'rgb(54, 162, 235)'
                        }]
                    };
                    const configTargetNominal = {
                        type: 'radar',
                        data: dataTargetNominal,
                        options: {
                            elements: {
                                line: {
                                    borderWidth: 3
                                }
                            },
                            scales: {
                                r: {
                                    pointLabels: {
                                        display: false // Hides the labels around the radar chart
                                    },
                                    ticks: {
                                        display: false // Hides the labels in the middel (numbers)
                                    }
                                }
                            }
                        },
                    };
                    const targetNominal = document.getElementById('targetNominal');

                    new Chart(targetNominal, configTargetNominal);
                @endisset
            });
        </script>
    </x-slot>
</x-app-layout>
