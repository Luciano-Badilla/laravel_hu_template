<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Inventario - Tecnica</title>
    <link rel="icon" href="{{ asset('images/hu_icon.png') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/css/adminlte.min.css">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">

    <!-- Additional CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqvmap/1.5.1/jqvmap.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.13.1/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/daterangepicker/3.1.0/daterangepicker.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"  />



    <!-- Custom Styles -->
    <style>
        /* Estilo para el campo de búsqueda */

        .search_input {
            margin-left: 5% !important;
            border: 1px solid gray !important;
            border-radius: 8px !important;
            padding: 0.375rem 0.75rem !important;
            font-size: 1rem !important;
            background-color: #F8F9FA;
        }

        .dataTables_filter {
            margin-left: 53% !important;
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }

        .dataTables_filter input {
            border: 1px solid gray !important;
            border-radius: 10px !important;
            padding: 0.375rem 0.75rem !important;
            font-size: 1rem !important;
        }

        /* Estilo para el botón de agregar */
        #addButton {
            font-size: 14px !important;
            /* Ajusta el tamaño del texto según sea necesario */
            margin-right: 10px !important;
            /* Espacio a la derecha del botón si es necesario */
        }

        /* Ajusta el margen entre los botones de paginación */
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            margin: 0 0px !important;
            padding: 0 0px !important;
            /* Cambia el valor para ajustar la separación */
        }

        /* Opcional: Ajusta el espaciado interno del contenedor de paginación */
        .dataTables_wrapper .dataTables_paginate {
            margin-top: 0px !important;
            /* Cambia el valor para ajustar el espaciado superior */
        }

        /* Estilo para el hover de los botones de paginación */
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            border: 1px solid #007bff !important;
            /* Cambia el color del borde en hover */
            background-color: #f8f9fa !important;
            /* Cambia el color de fondo en hover */
        }

        /* Estilo para el control lengthChange */
        .dataTables_length {
            display: flex !important;
            align-items: center !important;
            justify-content: space-between !important;
            /* Alinea los elementos en la fila */
        }

        /* Oculta el control de longitud específico dentro de lengthChange */
        .dataTables_length select {
            display: none !important;
            /* Oculta el selector del número de registros por página */
        }

        /* Asegura que el botón esté alineado en el contenedor de la tabla */
        .dataTables_wrapper .row {
            margin-bottom: 20px !important;
            /* Ajusta el espaciado entre el botón y la tabla */
        }

        /* Estilo para el contenedor del botón */
        .dataTables_wrapper .col-md-6 {
            display: flex !important;
            justify-content: flex-start !important;
            /* Alinea el botón al principio del contenedor */
        }

        /* Estilo para cuando pasas el mouse por encima de las filas */
        .dataTables_wrapper tbody tr:hover {
            background-color: #adabab !important;
            /* Cambia el color de fondo al pasar el mouse */
            cursor: pointer !important;
            /* Cambia el cursor a una mano al pasar el mouse */
        }

        /* Opcional: Agrega bordes a las celdas */
        .dataTables_wrapper table {
            border: none !important;
        }

        table.dataTable tbody td {
            /* Color de fondo blanco */
            color: #000000 !important;
            /* Color del texto negro */
            border: none !important;
            /* Quita el borde de las celdas */
        }

        table.dataTable thead th {
            background-color: #ffffff !important;
            /* Color de fondo blanco para los encabezados */
            color: #000000 !important;
            /* Color del texto negro para los encabezados */
            border: none !important;
            /* Quita el borde de los encabezados */
        }

        table.dataTable {
            border: none !important;
            /* Elimina los espacios entre los bordes de las celdas */
        }

        /* Excepción para mostrar encabezados en #table_historias */
        #table_historias thead {
            display: table-header-group !important;
        }

        /* Excepción para mostrar encabezados en #historyPcModal */
        #table_historias_pc thead {
            display: table-header-group !important;
        }

        .form-group .input-group {
            max-width: 165px;
            /* Ajusta el ancho máximo del input */
        }

        .form-group input {
            border: 1px solid gray;
            border-top-left-radius: 5px;
            /* Bordes redondeados superior izquierdo */
            border-bottom-left-radius: 5px;
            /* Bordes redondeados inferior izquierdo */
        }

        .input-group-append {
            border-top-right-radius: 5px;
            /* Bordes redondeados superior derecho */
            border-bottom-right-radius: 5px;
            /* Bordes redondeados inferior derecho */
        }


        body {
            --background-color: #18181B;
            --text-color: #A1A1AA;

            --card-background-color: #343A40;
            --card-border-color: rgba(255, 255, 255, 0.1);
            --card-box-shadow-1: rgba(0, 0, 0, 0.05);
            --card-box-shadow-1-y: 3px;
            --card-box-shadow-1-blur: 6px;
            --card-box-shadow-2: rgba(0, 0, 0, 0.1);
            --card-box-shadow-2-y: 8px;
            --card-box-shadow-2-blur: 15px;
            --card-label-color: #FFFFFF;
            --card-icon-color: #D4D4D8;
            --card-icon-background-color: rgba(255, 255, 255, 0.08);
            --card-icon-border-color: rgba(255, 255, 255, 0.12);
            --card-shine-opacity: .1;
            --card-shine-gradient: conic-gradient(from 205deg at 50% 50%, rgba(16, 185, 129, 0) 0deg, #10B981 25deg, rgba(52, 211, 153, 0.18) 295deg, rgba(16, 185, 129, 0) 360deg);
            --card-tile-color: rgba(16, 185, 129, 0.05);

            --card-hover-border-color: rgba(255, 255, 255, 0.2);
            --card-hover-box-shadow-1: rgba(0, 0, 0, 0.04);
            --card-hover-box-shadow-1-y: 5px;
            --card-hover-box-shadow-1-blur: 10px;
            --card-hover-box-shadow-2: rgba(0, 0, 0, 0.3);
            --card-hover-box-shadow-2-y: 15px;
            --card-hover-box-shadow-2-blur: 25px;
            --card-hover-icon-color: #ffffff;
            --card-hover-icon-background-color: rgba(0, 17, 11, 0.1);
            --card-hover-icon-border-color: rgba(255, 255, 255, 0.2);

            --blur-opacity: .01;

            &.light {
                --background-color: #FAFAFA;
                --text-color: #52525B;

                --card-background-color: transparent;
                --card-border-color: rgba(24, 24, 27, 0.08);
                --card-box-shadow-1: rgba(24, 24, 27, 0.02);
                --card-box-shadow-1-y: 3px;
                --card-box-shadow-1-blur: 6px;
                --card-box-shadow-2: rgba(24, 24, 27, 0.04);
                --card-box-shadow-2-y: 2px;
                --card-box-shadow-2-blur: 7px;
                --card-label-color: #18181B;
                --card-icon-color: #18181B;
                --card-icon-background-color: rgba(24, 24, 27, 0.04);
                --card-icon-border-color: rgba(24, 24, 27, 0.1);
                --card-shine-opacity: .3;
                --card-shine-gradient: conic-gradient(from 225deg at 50% 50%, rgba(16, 185, 129, 0) 0deg, #10B981 25deg, #EDFAF6 285deg, #FFFFFF 345deg, rgba(16, 185, 129, 0) 360deg);
                --card-line-color: #E9E9E7;
                --card-tile-color: rgba(16, 185, 129, 0.08);

                --card-hover-border-color: rgba(24, 24, 27, 0.15);
                --card-hover-box-shadow-1: rgba(24, 24, 27, 0.05);
                --card-hover-box-shadow-1-y: 3px;
                --card-hover-box-shadow-1-blur: 6px;
                --card-hover-box-shadow-2: rgba(24, 24, 27, 0.1);
                --card-hover-box-shadow-2-y: 8px;
                --card-hover-box-shadow-2-blur: 15px;
                --card-hover-icon-color: #18181B;
                --card-hover-icon-background-color: rgba(24, 24, 27, 0.04);
                --card-hover-icon-border-color: rgba(24, 24, 27, 0.34);

                --blur-opacity: .1;
            }

            &.toggle .grid * {
                transition-duration: 0s !important;
            }
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(2, 240px);
            grid-gap: 32px;
            position: relative;
            z-index: 1;
        }

        .card {
            background-color: var(--background-color);
            box-shadow: 0px var(--card-box-shadow-1-y) var(--card-box-shadow-1-blur) var(--card-box-shadow-1), 0px var(--card-box-shadow-2-y) var(--card-box-shadow-2-blur) var(--card-box-shadow-2), 0 0 0 1px var(--card-border-color);
            padding: 16px;
            border-radius: 15px;
            position: relative;
            transition: box-shadow .25s;
            cursor: pointer;

            &::before {
                content: '';
                position: absolute;
                inset: 0;
                border-radius: 15px;
                background-color: var(--card-background-color);
            }

            .icon {
                z-index: 2;
                position: relative;
                display: table;
                padding: 8px;
                width: 35%;
            }

            .iconHome {
                z-index: 2;
                position: relative;
                display: table;
                padding: 8px;
                width: 40%;
            }

            h4 {
                z-index: 2;
                position: relative;
                margin: 12px 0 4px 0;
                font-family: inherit;
                font-weight: 600;
                font-size: 14px;
                line-height: 2;
                color: var(--card-label-color);
            }

            p {
                z-index: 2;
                position: relative;
                margin: 0;
                font-size: 14px;
                line-height: 1.7;
                color: var(--text-color);
            }

            .shine {
                border-radius: inherit;
                position: absolute;
                inset: 0;
                z-index: 1;
                overflow: hidden;
                opacity: 0;
                transition: opacity .5s;

                &:before {
                    content: '';
                    width: 150%;
                    padding-bottom: 150%;
                    border-radius: 50%;
                    position: absolute;
                    left: 50%;
                    bottom: 55%;
                    filter: blur(35px);
                    opacity: var(--card-shine-opacity);
                    transform: translateX(-50%);
                    background-image: var(--card-shine-gradient);
                }
            }

            .background {
                border-radius: inherit;
                position: absolute;
                inset: 0;
                overflow: hidden;
                -webkit-mask-image: radial-gradient(circle at 60% 5%, black 0%, black 15%, transparent 60%);
                mask-image: radial-gradient(circle at 60% 5%, black 0%, black 15%, transparent 60%);

                .tiles {
                    opacity: 0;
                    transition: opacity .25s;

                    .tile {
                        position: absolute;
                        background-color: var(--card-tile-color);
                        animation-duration: 8s;
                        animation-iteration-count: infinite;
                        opacity: 0;

                        &.tile-4,
                        &.tile-6,
                        &.tile-10 {
                            animation-delay: -2s;
                        }

                        &.tile-3,
                        &.tile-5,
                        &.tile-8 {
                            animation-delay: -4s;
                        }

                        &.tile-2,
                        &.tile-9 {
                            animation-delay: -6s;
                        }

                        &.tile-1 {
                            top: 0;
                            left: 0;
                            height: 10%;
                            width: 22.5%;
                        }

                        &.tile-2 {
                            top: 0;
                            left: 22.5%;
                            height: 10%;
                            width: 27.5%;
                        }

                        &.tile-3 {
                            top: 0;
                            left: 50%;
                            height: 10%;
                            width: 27.5%;
                        }

                        &.tile-4 {
                            top: 0;
                            left: 77.5%;
                            height: 10%;
                            width: 22.5%;
                        }

                        &.tile-5 {
                            top: 10%;
                            left: 0;
                            height: 22.5%;
                            width: 22.5%;
                        }

                        &.tile-6 {
                            top: 10%;
                            left: 22.5%;
                            height: 22.5%;
                            width: 27.5%;
                        }

                        &.tile-7 {
                            top: 10%;
                            left: 50%;
                            height: 22.5%;
                            width: 27.5%;
                        }

                        &.tile-8 {
                            top: 10%;
                            left: 77.5%;
                            height: 22.5%;
                            width: 22.5%;
                        }

                        &.tile-9 {
                            top: 32.5%;
                            left: 50%;
                            height: 22.5%;
                            width: 27.5%;
                        }

                        &.tile-10 {
                            top: 32.5%;
                            left: 77.5%;
                            height: 22.5%;
                            width: 22.5%;
                        }
                    }
                }

                @keyframes tile {

                    0%,
                    12.5%,
                    100% {
                        opacity: 1;
                    }

                    25%,
                    82.5% {
                        opacity: 0;
                    }
                }

                .line {
                    position: absolute;
                    inset: 0;
                    opacity: 0;
                    transition: opacity .35s;

                    &:before,
                    &:after {
                        content: '';
                        position: absolute;
                        background-color: var(--card-line-color);
                        transition: transform .35s;
                    }

                    &:before {
                        left: 0;
                        right: 0;
                        height: 1px;
                        transform-origin: 0 50%;
                        transform: scaleX(0);
                    }

                    &:after {
                        top: 0;
                        bottom: 0;
                        width: 1px;
                        transform-origin: 50% 0;
                        transform: scaleY(0);
                    }

                    &.line-1 {
                        &:before {
                            top: 10%;
                        }

                        &:after {
                            left: 22.5%;
                        }

                        &:before,
                        &:after {
                            transition-delay: .3s;
                        }
                    }

                    &.line-2 {
                        &:before {
                            top: 32.5%;
                        }

                        &:after {
                            left: 50%;
                        }

                        &:before,
                        &:after {
                            transition-delay: .15s;
                        }
                    }

                    &.line-3 {
                        &:before {
                            top: 55%;
                        }

                        &:after {
                            right: 22.5%;
                        }
                    }
                }
            }

            &:hover {
                box-shadow: 0px 3px 6px var(--card-hover-box-shadow-1), 0px var(--card-hover-box-shadow-2-y) var(--card-hover-box-shadow-2-blur) var(--card-hover-box-shadow-2), 0 0 0 1px var(--card-hover-border-color);


                .icon {
                    &::after {
                        background-color: var(--card-hover-icon-background-color);
                        border-color: var(--card-hover-icon-border-color);
                    }

                    svg {
                        color: var(--card-hover-icon-color);
                    }
                }

                .shine {
                    opacity: 1;
                    transition-duration: .5s;
                    transition-delay: 0s;
                }

                .background {

                    .tiles {
                        opacity: 1;
                        transition-delay: .25s;

                        .tile {
                            animation-name: tile;
                        }
                    }

                    .line {
                        opacity: 1;
                        transition-duration: .15s;

                        &:before {
                            transform: scaleX(1);
                        }

                        &:after {
                            transform: scaleY(1);
                        }

                        &.line-1 {

                            &:before,
                            &:after {
                                transition-delay: .0s;
                            }
                        }

                        &.line-2 {

                            &:before,
                            &:after {
                                transition-delay: .15s;
                            }
                        }

                        &.line-3 {

                            &:before,
                            &:after {
                                transition-delay: .3s;
                            }
                        }
                    }
                }
            }
        }

        .day-night {
            cursor: pointer;
            position: absolute;
            right: 20px;
            top: 20px;
            opacity: .3;

            input {
                display: none;

                &+div {
                    border-radius: 50%;
                    width: 20px;
                    height: 20px;
                    position: relative;
                    box-shadow: inset 8px -8px 0 0 var(--text-color);
                    transform: scale(1) rotate(-2deg);
                    transition: box-shadow .5s ease 0s, transform .4s ease .1s;

                    &:before {
                        content: '';
                        width: inherit;
                        height: inherit;
                        border-radius: inherit;
                        position: absolute;
                        left: 0;
                        top: 0;
                        transition: background-color .3s ease;
                    }

                    &:after {
                        content: '';
                        width: 6px;
                        height: 6px;
                        border-radius: 50%;
                        margin: -3px 0 0 -3px;
                        position: absolute;
                        top: 50%;
                        left: 50%;
                        box-shadow: 0 -23px 0 var(--text-color), 0 23px 0 var(--text-color), 23px 0 0 var(--text-color), -23px 0 0 var(--text-color), 15px 15px 0 var(--text-color), -15px 15px 0 var(--text-color), 15px -15px 0 var(--text-color), -15px -15px 0 var(--text-color);
                        transform: scale(0);
                        transition: all .3s ease;
                    }
                }

                &:checked+div {
                    box-shadow: inset 20px -20px 0 0 var(--text-color);
                    transform: scale(.5) rotate(0deg);
                    transition: transform .3s ease .1s, box-shadow .2s ease 0s;

                    &:before {
                        background: var(--text-color);
                        transition: background-color .3s ease .1s;
                    }

                    &:after {
                        transform: scale(1);
                        transition: transform .5s ease .15s;
                    }
                }
            }
        }

        html {
            box-sizing: border-box;
            -webkit-font-smoothing: antialiased;
        }

        * {
            box-sizing: inherit;

            &:before,
            &:after {
                box-sizing: inherit;
            }
        }

        // Center
        body {
            min-height: 100vh;
            display: flex;
            font-family: 'Inter', Arial;
            justify-content: center;
            align-items: center;
            background-color: var(--background-color);
            overflow: hidden;

            &:before {
                content: '';
                position: absolute;
                inset: 0 -60% 65% -60%;
                background-image: radial-gradient(ellipse at top, #10B981 0%, var(--background-color) 50%);
                opacity: var(--blur-opacity);
            }

        }

        .custom-export-btn {
            margin-bottom: 1%;
            margin-left: 1%;
            /* Elimina márgenes */
        }

        #table-historias th,
        #table-historias td {
            min-width: 100px;
            /* Establece un ancho mínimo para las columnas */
            word-wrap: break-word;
            /* Asegura que el contenido se ajuste dentro del ancho */
            table-layout: fixed;
        }
    </style>


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-gray-100 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap 4 y 5 (Elige una versión, usualmente no se usan ambas juntas) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <!-- jQuery UI -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <!-- ChartJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>

    <!-- Sparkline -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sparklines/0.4.1/sparkline.js"></script>

    <!-- JQVMap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqvmap/1.5.1/jquery.vmap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqvmap/1.5.1/maps/jquery.vmap.usa.js"></script>

    <!-- jQuery Knob Chart -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-knob/1.2.13/jquery.knob.min.js"></script>

    <!-- Daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/daterangepicker/3.1.0/daterangepicker.js"></script>

    <!-- Tempusdominus Bootstrap 4 -->
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js">
    </script>

    <!-- Summernote -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>

    <!-- overlayScrollbars -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.13.1/js/jquery.overlayScrollbars.min.js">
    </script>

    <!-- AdminLTE -->
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/js/adminlte.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/demo.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/pages/dashboard.js"></script>

    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

    <!-- List.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js" crossorigin="anonymous"
        referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>

    <!-- DataTables Buttons -->
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>

    <!-- JSZip (Necesario para la exportación a Excel) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.7.1/jszip.min.js"></script>

    <footer>
        <script>
            $(document).ready(function() {

                $("#table").DataTable({
                    "responsive": true,
                    "lengthChange": true,
                    "autoWidth": true,
                    "language": {
                        "decimal": "",
                        "emptyTable": "No hay datos disponibles en la tabla",
                        "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                        "infoEmpty": "Mostrando 0 a 0 de 0 entradas",
                        "infoFiltered": "(filtrado de _MAX_ entradas totales)",
                        "infoPostFix": "",
                        "thousands": ",",
                        "lengthMenu": " _MENU_ ",
                        "loadingRecords": "Cargando...",
                        "processing": "Procesando...",
                        "search": "Buscar:",
                        "zeroRecords": "No se encontraron registros coincidentes",
                        "paginate": {
                            "first": "Primero",
                            "last": "Último",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        },
                        "aria": {
                            "sortAscending": ": activar para ordenar la columna ascendente",
                            "sortDescending": ": activar para ordenar la columna descendente"
                        }
                    }
                });

                $('.dataTables_length').prepend(
                    '<button id="addButton" class="btn btn-dark mr-2" data-bs-toggle="modal" data-bs-target="#addModal">' +
                    '<i class="fas fa-plus"></i> Agregar' +
                    '</button>'
                );

                var comp_table = $("#table_componentes").DataTable({
                    initComplete: function() {
                        var api = this.api();
                        // Añadir el botón después de que DataTables se haya inicializado
                        $('.dataTables_length').prepend(
                            '<div>' +
                            '<button id="addButton" class="btn btn-dark " data-bs-toggle="modal" data-bs-target="#addModal">' +
                            '<i class="fas fa-plus"></i> Nuevo Componente' +
                            '</button>' +
                            '<button id="addButton" class="btn btn-dark " data-bs-toggle="modal" data-bs-target="#addStockModal">' +
                            '<i class="fas fa-box"></i> Agregar stock' +
                            '</button>' +
                            '<button id="addButton" class="btn btn-dark " data-bs-toggle="modal" data-bs-target="#removeStockModal">' +
                            '<i class="fas fa-box-archive"></i> Eliminar stock' +
                            '</button>' +
                            '<div style="margin-top: 2%">' +
                            '<button id="addButton" class="btn btn-dark " data-bs-toggle="modal" data-bs-target="#TransferModal">' +
                            '<i class="fa-solid fa-arrow-up-from-bracket"></i> Transferir a deposito' +
                            '</button>' +
                            '<button id="addButton" class="btn btn-dark " data-bs-toggle="modal" data-bs-target="#TransferStateModal">' +
                            '<i class="fa-solid fa-chart-column"></i> Cambiar estado' +
                            '</button>' +
                            '</div>' +
                            '</div>'
                        );
                    },
                    "responsive": true,
                    "lengthChange": true,
                    "autoWidth": true,
                    "language": {
                        "decimal": "",
                        "emptyTable": "No hay datos disponibles en la tabla",
                        "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                        "infoEmpty": "Mostrando 0 a 0 de 0 entradas",
                        "infoFiltered": "(filtrado de _MAX_ entradas totales)",
                        "infoPostFix": "",
                        "thousands": ",",
                        "lengthMenu": " _MENU_ ",
                        "loadingRecords": "Cargando...",
                        "processing": "Procesando...",
                        "search": "Buscar:",
                        "zeroRecords": "No se encontraron registros coincidentes",
                        "paginate": {
                            "first": "Primero",
                            "last": "Último",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        },
                        "aria": {
                            "sortAscending": ": activar para ordenar la columna ascendente",
                            "sortDescending": ": activar para ordenar la columna descendente"
                        }
                    }
                });

                $('#filtro-deposito').on('change', function() {
                    comp_table.column(2).search(this.value).draw();
                });

                $('#filtro-estado').on('change', function() {
                    comp_table.column(4).search(this.value).draw();
                });

                $('#filtro-categoria').on('change', function() {
                    comp_table.column(0).search(this.value).draw();
                });

                // Función para extraer el número del string "Stock: XX" en formato HTML
                function extractStockValue(stockHtml) {
                    var match = stockHtml.match(/Stock:\s*(\d+)/);
                    return match ? parseInt(match[1], 10) : 0;
                }

                // Filtros personalizados
                $.fn.dataTable.ext.search.push(
                    function(settings, data, dataIndex) {
                        var stockHtml = data[3]; // Índice de la columna de stock (asegúrate de que sea el correcto)
                        var stock = extractStockValue(stockHtml);
                        var filterValue = $('#filtro-stock').val();

                        if (filterValue === 'poco-stock') {
                            return stock > 0 && stock <= 20;
                        } else if (filterValue === 'sin-stock') {
                            return stock === 0;
                        }
                        return true; // Sin filtro
                    }
                );

                // Evento de cambio del filtro
                $('#filtro-stock').on('change', function() {
                    comp_table.draw(); // Redibuja la tabla para aplicar el filtro
                });


                $("#table_historias").DataTable({
                    "order": [
                        [3, 'desc']
                    ],
                    "responsive": true,
                    "lengthChange": true,
                    "autoWidth": true,
                    "language": {
                        "decimal": "",
                        "emptyTable": "No hay datos disponibles en la tabla",
                        "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                        "infoEmpty": "Mostrando 0 a 0 de 0 entradas",
                        "infoFiltered": "(filtrado de _MAX_ entradas totales)",
                        "infoPostFix": "",
                        "thousands": ",",
                        "lengthMenu": " _MENU_ ",
                        "loadingRecords": "Cargando...",
                        "processing": "Procesando...",
                        "search": "Buscar:",
                        "zeroRecords": "No se encontraron registros coincidentes",
                        "paginate": {
                            "first": "Primero",
                            "last": "Último",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        },
                        "aria": {
                            "sortAscending": ": activar para ordenar la columna ascendente",
                            "sortDescending": ": activar para ordenar la columna descendente"
                        }
                    }
                });
                
                $("#table_historias_pc").css("min-width","100%");

                $('#editModal').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget); // Botón que abrió el modal
                    var Id = button.data('id'); // Extraer ID del atributo 'data-id'
                    var Identificador = button.data('identificador');
                    var Nombre = button.data('nombre'); // Extraer nombre del atributo 'data-nombre'
                    var Tipo = button.data('tipo');

                    var modal = $(this);

                    modal.find('#editNombre').val(Nombre);
                    modal.find('#editId').val(Id);
                    modal.find('#editIdentificador').val(Identificador);
                    modal.find('#editTipo').val(Tipo);


                });

                $('#editPcModal').on('show.bs.modal', function(event) {
                    var modal = $(this);
                    var container = modal.find('#input-container-2');
                    var inputs = container.find(
                        '.select'); // o 'div', 'select', etc., dependiendo de tu estructura

                    // Mantener al menos uno
                    if (inputs.length > 1) {
                        // Aquí estamos eliminando todos los inputs excepto el primero
                        inputs.not(':first').remove();
                    }

                    var materialContainer = modal.find('#material-container-2');
                    var materials = materialContainer.find(
                        '.select'); // o 'div', 'select', etc., dependiendo de tu estructura

                    // Mantener al menos uno
                    if (materials.length > 1) {
                        // Aquí estamos eliminando todos los inputs excepto el primero
                        materials.not(':first').remove();
                    }

                    var button = $(event.relatedTarget); // Botón que abrió el modal
                    var Id = button.data('id'); // Extraer ID del atributo 'data-id'
                    var Identificador = button.data('identificador');
                    var Nombre = button.data('nombre'); // Extraer nombre del atributo 'data-nombre'
                    var Stock = button.data('stock');
                    var Deposito = button.data('deposito');
                    var Tipo = button.data('tipo');
                    var Ip = button.data('ip');
                    var Area_id = button.data('area');
                    var Deposito_id = button.data('deposito');
                    var enUso = button.data('enuso');
                    var Motherboard = button.data('mother');
                    var Procesador = button.data('proce');
                    var Fuente = button.data('fuente');
                    var Placavid = button.data('placavid');

                    var discosIds = button.data('discosids') ? button.data('discosids').toString().split(', ') :
                        [];
                    var DiscosObj = button.data('discosobj');
                    var DiscosArray = Object.values(DiscosObj);
                    var cant_discos = discosIds.length;

                    var ramsIds = button.data('ramsids') ? button.data('ramsids').toString().split(', ') : [];
                    var RamsObj = button.data('ramsobj');
                    var RamsArray = Object.values(RamsObj);
                    var cant_rams = ramsIds.length;

                    modal.find('#editEn-uso').prop('checked', enUso);
                    if (!enUso) {
                        modal.find('#editDeposito').prop('disabled', false);
                        modal.find('#editArea').prop('disabled', true);
                    } else {
                        modal.find('#editDeposito').prop('disabled', true);
                        modal.find('#editArea').prop('disabled', false);
                    }
                    modal.find('#editNombre').val(Nombre);
                    modal.find('#editId').val(Id);
                    modal.find('#editIdentificador').val(Identificador);
                    modal.find('#editStock').val(Stock);
                    modal.find('#editTipo').val(Tipo);
                    modal.find('#editDeposito').val(Deposito);
                    modal.find('#editIp').val(Ip);
                    modal.find('#editArea').val(Area_id);
                    modal.find('#editDeposito').val(Deposito_id);

                    var motherboardToRemove = Motherboard.nombre;
                    var procesadorToRemove = Procesador.nombre;
                    var fuenteToRemove = Fuente.nombre;
                    var placavidToRemove = Placavid.nombre;

                    // Busca y elimina las opciones con el nombre especificado
                    modal.find('#editMotherboard option').each(function() {
                        if ($(this).text() === motherboardToRemove + " - Actual") {
                            $(this).remove();
                        }
                    });

                    modal.find('#editProcesador option').each(function() {
                        if ($(this).text() === procesadorToRemove + " - Actual") {
                            $(this).remove();
                        }
                    });

                    modal.find('#editFuente option').each(function() {
                        if ($(this).text() === fuenteToRemove + " - Actual") {
                            $(this).remove();
                        }
                    });

                    modal.find('#editPlacavid option').each(function() {
                        if ($(this).text() === placavidToRemove + " - Actual") {
                            $(this).remove();
                        }
                    });

                    if (Motherboard.stock == 0 || Motherboard.estado_id == 5) {
                        modal.find('#editMotherboard').append(
                            '<option value="' + Motherboard.id + '"  selected>' + Motherboard.nombre +
                            " - Actual" +
                            '</option>');
                    } else {
                        modal.find('#editMotherboard').val(Motherboard.id);
                    }
                    if (Procesador.stock == 0 || Procesador.estado_id == 5) {
                        modal.find('#editProcesador').append(
                            '<option value="' + Procesador.id + '" selected>' + Procesador.nombre +
                            " - Actual" +
                            '</option>');
                    } else {
                        modal.find('#editProcesador').val(Procesador.id);
                    }

                    if (Fuente.stock == 0 || Fuente.estado_id == 5) {
                        modal.find('#editFuente').append(
                            '<option value="' + Fuente.id + '" selected>' + Fuente.nombre + " - Actual" +
                            '</option>');
                    } else {
                        modal.find('#editFuente').val(Fuente.id);
                    }

                    if (Placavid.stock == 0 || Placavid.estado_id == 5) {
                        modal.find('#editPlacavid').append(
                            '<option value="' + Placavid.id + '" selected>' + Placavid.nombre +
                            " - Actual" +
                            '</option>');
                    } else {
                        modal.find('#editPlacavid').val(Placavid.id);
                    }

                    for (i = 0; i < cant_discos - 1; i++) {
                        addInputDisc(modal.find('.add-input-disc'));
                    }

                    for (i = 0; i < cant_rams - 1; i++) {
                        addInputRam(modal.find('.add-input-ram'));
                    }

                    container.find('.input-group').each(function(index) {
                        var select = $(this).find('select');

                        // Elimina solo las opciones con la clase deleteable-option
                        select.find('option.deleteable-option').remove();

                        if (index < cant_discos) {
                            if (DiscosArray[index].stock == 0 || DiscosArray[index].estado_id == 5) {
                                // Añade la nueva opción
                                select.append('<option value="' + DiscosArray[index].id +
                                    '" class="deleteable-option" selected>' + DiscosArray[index]
                                    .nombre + " - " + DiscosArray[index].tipo.nombre +
                                    '</option>');
                            } else {
                                select.val(discosIds[index]);
                            }
                        }
                    });

                    materialContainer.find('.input-group').each(function(index) {
                        // Selecciona el <select> dentro del input-group actual
                        var select = $(this).find('select');

                        // Elimina solo las opciones con la clase deleteable-option
                        select.find('option.deleteable-option2').remove();

                        if (index < cant_rams) {
                            if (RamsArray[index].stock == 0 || RamsArray[index].estado_id == 5) {
                                // Añade la nueva opción con la clase deleteable-option
                                select.append('<option value="' + RamsArray[index].id +
                                    '" class="deleteable-option2" selected>' + RamsArray[index]
                                    .nombre + " " + RamsArray[index].tipo.nombre +
                                    '</option>');
                            } else {
                                // Selecciona el valor actual para el select
                                select.val(ramsIds[index]);
                            }
                        }
                    });

                    updateDiscos();
                    updateRams();

                });


                function addInputDisc(button) {
                    var $button = $(button);
                    var $inputGroup = $button.closest('.input-group').clone();

                    // Limpia los valores y actualiza el botón en el nuevo grupo
                    $inputGroup.find('select').val('');
                    $inputGroup.find('.add-input-disc').removeClass('add-input-disc btn-outline-secondary')
                        .addClass('remove-input-disc btn-outline-danger').text('-');

                    // Encuentra el contenedor más cercano
                    var $container = $button.closest('#input-container-1, #input-container-2');

                    // Agrega el nuevo grupo al contenedor
                    $container.append($inputGroup);
                }

                function removeInputDisc() {
                    $(this).closest('.input-group').remove();
                }

                function addInputRam(button) {
                    var $button = $(button);
                    var $inputGroup = $button.closest('.input-group').clone();

                    // Limpia los valores y actualiza el botón en el nuevo grupo
                    $inputGroup.find('select').val('');
                    $inputGroup.find('.add-input-ram').removeClass('add-input-ram btn-outline-secondary')
                        .addClass('remove-input-ram btn-outline-danger').text('-');

                    // Encuentra el contenedor más cercano
                    var $container = $button.closest('#material-container-1, #material-container-2');

                    // Agrega el nuevo grupo al contenedor
                    $container.append($inputGroup);
                }

                function removeInputRam() {
                    $(this).closest('.input-group').remove();
                }

                $(document).on('click', '.add-input-disc', function() {
                    addInputDisc(this);
                });

                $(document).on('click', '.add-input-ram', function() {
                    addInputRam(this);
                });

                $(document).on('click', '.add-input-ram', addInputRam);
                $(document).on('click', '.remove-input-ram', removeInputRam);


                $('#editEn-uso').on('change', function() {
                    var modal = $('#editPcModal');
                    var isChecked = $(this).is(':checked');

                    // Ajustar habilitación/deshabilitación en función del estado del checkbox
                    if (!isChecked) {
                        modal.find('#editDeposito').prop('disabled', false);
                        modal.find('#editArea').prop('disabled', true);
                        modal.find('#editDeposito').val(null);
                        modal.find('#editArea').val(null);
                    } else {
                        modal.find('#editDeposito').prop('disabled', true);
                        modal.find('#editArea').prop('disabled', false);
                        modal.find('#editArea').val(null);
                        modal.find('#editDeposito').val(null);
                    }
                });

                $('#deleteModal').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget); // Botón que abrió el modal
                    var Id = button.data('id'); // Extraer ID del atributo 'data-id'

                    var modal = $(this);
                    modal.find('#deleteId').val(Id);
                });

                $('#infoPcModal').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget); // Botón que abrió el modal
                    var Id = button.data('id');
                    var Ip = button.data('ip');
                    var Identificador = button.data('identificador');
                    var Nombre = button.data('nombre');
                    var Area = button.data('area');
                    var Deposito = button.data('deposito');
                    var enUso = button.data('enuso');
                    var motherboard = button.data('mother');
                    var procesador = button.data('proce');
                    var fuente = button.data('fuente');
                    var placavid = button.data('placavid');
                    var discos = button.data('discos');
                    var rams = button.data('rams');

                    var modal = $(this);
                    modal.find('#idenInfo').text(Identificador);
                    modal.find('#ipInfo').text(Ip);
                    modal.find('#nombreInfo').text(Nombre);
                    if (enUso == true) {
                        modal.find('#titleAsig').text("Area:");
                        modal.find('#infoAsig').text(Area);
                    } else {
                        modal.find('#titleAsig').text("Deposito:");
                        modal.find('#infoAsig').text(Deposito);
                    }
                    modal.find('#motherInfo').text(motherboard);
                    modal.find('#proceInfo').text(procesador);
                    modal.find('#fuenteInfo').text(fuente);
                    modal.find('#placavidInfo').text(placavid);
                    modal.find('#discosInfo').text(discos);
                    modal.find('#ramsInfo').text(rams);
                });




                const checkbox = document.getElementById('en-uso');
                const areaSelect = document.getElementById('area-select');
                const depositoSelect = document.getElementById('deposito-select');

                checkbox.addEventListener('change', function() {
                    depositoSelect.querySelector('select').selectedIndex = 0;
                    areaSelect.querySelector('select').selectedIndex = 0;
                    if (checkbox.checked) {
                        areaSelect.querySelector('select').disabled = false;
                        depositoSelect.querySelector('select').disabled = true;
                    } else {
                        areaSelect.querySelector('select').disabled = true;
                        depositoSelect.querySelector('select').disabled = false;
                    }
                });


                // Inicializa el estado del contenido basado en el estado del checkbox al cargar
                if (checkbox.checked) {
                    areaSelect.querySelector('select').disabled = false;
                    depositoSelect.querySelector('select').disabled = true;
                } else {
                    areaSelect.querySelector('select').disabled = true;
                    depositoSelect.querySelector('select').disabled = false;
                }

            });
        </script>
    </footer>
</body>

</html>
