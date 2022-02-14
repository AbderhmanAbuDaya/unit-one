<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <!-- Bootstrap CSS -->
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
    <!-- jQuery -->
    <script src="//code.jquery.com/jquery.js"></script>
    <!-- DataTables -->
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <!-- App scripts -->
    <script>
        $(document).ready(function () {
            $.fn.dataTable.ext.errMode = 'throw';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var table = $('#datatable');

            var datatable = table.DataTable({
                "initComplete": function () {
                    // $('.dataTables_length select', '#datatable_wrapper').select2({
                    //     minimumResultsForSearch: Infinity
                    // });
                    // $('.dataTables_scrollBody', '#datatable_wrapper').jScrollPane();
                },
                "order": [[0, "desc"]],
                "columnDefs": [{
                    "targets": 'no_sort',
                    "orderable": false
                }],

                "scrollY": false,
                "scrollCollapse": true,
                "sScrollX": "100%",
                "sScrollXInner": "110%",
                "bScrollCollapse": true,
                colReorder: false,
                processing: true,
                serverSide: true,

                dom: 'Blfrtip',
                ajax: {
                    url: "{{route('homes.index')}}",
                    type: 'GET'
                },
                columns: [
                    { data: 'title', name: 'title' },
                    { data: 'price', name: 'price',class:'post_item'},
                    { data: 'cover_image', name: 'cover_image'},
                    { data: 'city', name: 'city'},
                    { data: 'desc', name: 'desc'},
                    { data: 'sales_agent', name: 'sales_agent'},
                    { data: 'sales_agent_phone', name: 'sales_agent_phone'},
                    { data: 'link', name: 'link'},
                    { data: 'created_at', name: 'created_at' },
                    { data: 'actions', name: 'actions' },
                ]
            });

            table.on('draw.dt', function () {
                // $('.dataTables_scrollBody', '#datatable_wrapper').jScrollPane().data().jsp.destroy();
                // $('.dataTables_scrollBody', '#datatable_wrapper').jScrollPane();
            });
            $('.dt-buttons.btn-group').wrap('<div class="col-sm-12 col-md-6" style="padding: 20px;display: inline-flex;float: right;"></div>');
            $('#datatable_filter').wrap('<div class="col-sm-12 col-md-6" style="padding: 0 20px;display: inline-flex"></div>');

        });
    </script>
</html>
