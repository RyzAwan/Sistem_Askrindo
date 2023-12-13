<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Laporan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="flex flex-row justify-between items-center mb-8">

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
                        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                            class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4"
                            type="button">
                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Tambah laporan
                        </button>
                    </div>

                    <div class="card-datatable">
                        <table id="example" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th rowspan="2" class="text-center">Tanggal Produksi</th>
                                    <th colspan="2" class="text-center">A1</th>
                                    <th colspan="2" class="text-center">A2</th>
                                    <th colspan="2" class="text-center">A3</th>
                                    <th colspan="2" class="text-center">A4</th>
                                    <th colspan="2" class="text-center">A5</th>
                                </tr>
                                <tr>
                                    <th class="text-center">Debit</th>
                                    <th class="text-center">Nominal</th>
                                    <th class="text-center">Debit</th>
                                    <th class="text-center">Nominal</th>
                                    <th class="text-center">Debit</th>
                                    <th class="text-center">Nominal</th>
                                    <th class="text-center">Debit</th>
                                    <th class="text-center">Nominal</th>
                                    <th class="text-center">Debit</th>
                                    <th class="text-center">Nominal</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Main modal -->
    <div id="crud-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Buat Laporan
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5 flex flex-col" method="POST" action="/laporan">
                    @csrf
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                Produksi</label>
                            <input type="date" name="productions_date"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Type product name" required="">
                        </div>


                        @for ($i = 1; $i <= 5; $i++)
                            <div class="col-span-2">
                                <hr>
                                <label
                                    class="block mt-2 text-sm font-medium text-gray-700 dark:text-white">A{{ $i }}</label>
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="price"
                                    class="block mb-2 text-xs font-light text-gray-900 dark:text-white">DEB</label>
                                <input type="number" name="a{{ $i }}_deb"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="0.0" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label
                                    class="block mb-2 text-xs font-light text-gray-900 dark:text-white">Nominal</label>
                                <input type="number" name="a{{ $i }}_amount"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="0.0" required="">
                            </div>
                        @endfor
                    </div>
                    <button type="submit"
                        class="text-white mt-5 inline-flex items-center justify-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Tambahkan laporan
                    </button>
                </form>
            </div>
        </div>
    </div>
    <x-slot name="scripts">
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <!--Datatables -->
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
        {{-- <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script> --}}
        {{-- <script src="https://cdn.datatables.net/1.13.7/js/dataTables.tailwindcss.min.js"></script> --}}
        <script src="https://cdn.tailwindcss.com"></script>

        <script>
            $(document).ready(function() {
                // alert("test");
                // new DataTable('#example');

                const dashboardTable = $("#example").DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '{{ route('laporan') }}',
                        // data: function(query) {
                        //     query.status = $("#status").val()
                        //     return query
                        // }
                    },
                    columnDefs: [{
                        targets: '_all',
                        defaultContent: '-'
                    }],
                    columns: [{
                        data: 'productions_date',
                        className: 'text-center',
                        searchable: true,
                    }, {
                        data: 'a1_deb',
                        className: 'text-center',
                        searchable: true,
                    }, {
                        data: 'a1_amount',
                        className: 'text-center',
                        searchable: true,
                    }, {
                        data: 'a2_deb',
                        className: 'text-center',
                        searchable: true,
                    }, {
                        data: 'a2_amount',
                        className: 'text-center',
                        searchable: true,
                    }, {
                        data: 'a3_deb',
                        className: 'text-center',
                        searchable: true,
                    }, {
                        data: 'a3_amount',
                        className: 'text-center',
                        searchable: true,
                    }, {
                        data: 'a4_deb',
                        className: 'text-center',
                        searchable: true,
                    }, {
                        data: 'a4_amount',
                        className: 'text-center',
                        searchable: true,
                    }, {
                        data: 'a5_deb',
                        className: 'text-center',
                        searchable: true,
                    }, {
                        data: 'a5_amount',
                        className: 'text-center',
                        searchable: true,
                    }, ],
                    pagingType: 'simple',
                    language: {
                        "lengthMenu": "Rows per page: _MENU_",
                        "info": "_START_-_END_ of _TOTAL_ items",
                        "infoEmpty": "Showing 0 to 0 of 0 entries",
                        "paginate": {
                            "next": ">",
                            "previous": "<"
                        },
                    },
                    "aaSorting": []
                });
            })
        </script>
    </x-slot>
</x-app-layout>
