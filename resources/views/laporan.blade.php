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



                    <!-- Modal toggle -->
                    <div class="flex flex-row-reverse mb-5">
                        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                            class="block text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
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
                                    placeholder="0.0" required="" value="10">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label
                                    class="block mb-2 text-xs font-light text-gray-900 dark:text-white">Nominal</label>
                                <input type="number" name="a{{ $i }}_amount"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="0.0" required="" value="{{ $i }}0100">
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
