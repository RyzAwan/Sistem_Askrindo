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
                    <p class="text-center text-xl mb-8">
                        {{ $month . ' ' . $year }}
                    </p>
                    {{-- {{ $report }} --}}
                    <div class="grid grid-cols-12">
                        <div class="col-span-8">
                            <canvas id="myChart"></canvas>
                        </div>
                        <div class="col-span-4">
                            <canvas id="polarChart"></canvas>
                        </div>
                    </div>
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
            });
        </script>
    </x-slot>
</x-app-layout>
