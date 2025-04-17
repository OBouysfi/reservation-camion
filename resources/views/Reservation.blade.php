@extends('layouts.app')

@section('content')
    <!-- NEW RESERVATION MODAL (Bootstrap Only) -->



    {{-- ---------------------------------------------------------------------------------------------------------- --}}


    {{-- ----------------------------------------------------------------------------------------------------------- --}}

    <body class="g-sidenav-show bg-gray-100">
        <style>
            .dataTables_wrapper .dataTables_filter {
                display: none;
            }

            .dataTables_wrapper .dataTables_length {
                display: none;
            }

            .dataTables_wrapper #tableReservation_paginate {
                display: none;

            }

            thead th {
                padding: 30px !important;
                background: #f8f9fa !important;
            }

            tr td {
                border-bottom: 0.5px solid rgb(231, 231, 231) !important;
                color: #000 !important;
                padding-top: 30px !important;
                padding-bottom: 30px !important;
            }

            [x-cloak] {
                display: none !important;
            }
        </style>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg bg-gray-50">
            <!-- Navbar -->
            <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
                navbar-scroll="true">
                <div class="container-fluid py-1 px-3">
                    <nav aria-label="breadcrumb" class="w-full">
                        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                            </li>
                            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">reservations</li>
                        </ol>

                    </nav>
                </div>
            </nav>
            <!-- End Navbar -->

            <div class="container-fluid p-4">

                <!-- Filters Section -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row align-items-center">
                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bx bx-search"></i></span>
                                            <input type="text" class="form-control"
                                                placeholder="Rechercher une réservation..." id="customSearchBox">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <select class="form-select">
                                            <option value="">Tous les statuts</option>
                                            <option value="confirmed">Confirmée</option>
                                            <option value="pending">En Attente</option>
                                            <option value="cancelled">Annulée</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="date" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <div class="d-flex gap-2 mt-3">
                                            <a href="{{ route('reservations.export.pdf') }}"
                                                class="btn btn-danger shadow-sm d-flex align-items-center gap-2">
                                                <i class="bx bxs-file-pdf fs-5"></i>
                                                <span>PDF</span>
                                            </a>
                                            <a href="{{ route('reservations.export.excel') }}"
                                                class="btn btn-success shadow-sm d-flex align-items-center gap-2">
                                                <i class="bx bxs-file-export fs-5"></i>
                                                <span>Excel</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <div x-data="{ showModal: false }" class="z-50" style="display: flex; justify-content: flex-end; margin-bottom: 10px;">
                    <button @click="showModal = true" class="bg-primary text-sm  text-white px-4 py-2 rounded ">
                        Nouvelle reservation
                    </button>
                    <div x-cloak x-show="showModal" x-transition
                        class="fixed inset-0 flex items-center justify-center backdrop:blur-lg bg-opacity-50 z-50"
                        style="display: none;" @keydown.escape.window="showModal = false" @click.self="showModal = false">

                        <div class="bg-white rounded-lg w-full max-w-[800px] p-6">
                            <div class="flex justify-between items-center mb-4">
                                <h2 class="text-xl font-bold">Nouvelle reservations</h2>
                                <button @click="showModal = false"
                                    class="text-2xl text-gray-600 hover:text-red-500">&times;</button>
                            </div>
                            <p class="text-gray-600 mb-4">Remplissez le formulaire ci-dessous pour
                                créer une nouvelle réservation.</p>
                            <form class="" method="POST" action="{{ route('reservations.store') }}">
                                @csrf
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                                    <div class="col-span-2">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Chauffeur</label>
                                        <input type="text" name="chauffeur"
                                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition"
                                            required>
                                    </div>
                                    <div class="col-span-2">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                        <input type="email" name="email"
                                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition"
                                            required>
                                    </div>

                                    <div class="col-span-2">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Numéro
                                            de Camion</label>
                                        <input type="text" name="numero_camion"
                                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition"
                                            required>
                                    </div>


                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Type
                                            de Camion</label>
                                        <select name="type_camion"
                                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition"
                                            required>
                                            <option value="">Sélectionnez un type</option>
                                            <option value="Plateau">Plateau</option>
                                            <option value="Rideau coulissant">Rideau coulissant</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Arrivée
                                            Prévue</label>
                                        <input type="datetime-local" name="arrivee_prevue"
                                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition"
                                            required>
                                    </div>
                                </div>
                                <div class="flex justify-end space-x-3 pt-6 border-t border-gray-200 mt-6">
                                    <a href="{{ route('reservations.index') }}"
                                        class="px-6 py-2 border border-orange-500 text-orange-500 rounded-lg hover:bg-orange-50 transition font-medium">
                                        Annuler
                                    </a>
                                    <button type="submit"
                                        class="px-6 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition font-medium">
                                        Enregistrer
                                    </button>
                                </div>
                            </form>



                        </div>
                    </div>
                </div>
                <!-- Table Section -->
                <div class="row">
                    <div class="col-12">
                        <div class="card-header bg-white p-4 border-bottom-0">
                            <h5 class="mb-0 text-primary font-weight-bold">Réservations</h5>
                            <p class="text-muted text-sm mb-0">Liste des réservations de camions</p>
                        </div>
                        <div class="card mb-4">
                            <div class="card-body px-0 pt-0 pb-2">
                                <div class="table-responsive p-0">

                                    <table class="table align-items-center mb-0" id="tableReservation">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    #ID</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    USER_ID</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Chauffeur</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Numéro Camion</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Type Camion</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Arrivée Prévue</th>
                                                <th <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    status</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Actions</th>
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
            </div>


        </main>

        <!-- Core JS Files -->

        <script src="../assets/js/core/popper.min.js"></script>
        <script src="../assets/js/core/bootstrap.min.js"></script>
        <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
        <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
        <script>
            var win = navigator.platform.indexOf('Win') > -1;
            if (win && document.querySelector('#sidenav-scrollbar')) {
                var options = {
                    damping: '0.5'
                }
                Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
            }
        </script>
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-qY6nKdW9Xoj6VNj78j9nTu7vC1n1w2x+8RbtDhyyvqUmdOBg3L3dvJ9IB4sLP4I/" crossorigin="anonymous">
        </script>

        <script src="../assets/js/soft-ui-dashboard.min.js?v=1.1.0"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
        <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function() {
                let datatable = $('#tableReservation').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route('reservations.index') }}',
                    columns: [{
                            data: 'id',
                            name: 'id',
                        },
                        {
                            data: 'user_id',
                            name: 'user_id'
                        },
                        {
                            data: 'chauffeur',
                            name: 'chauffeur'
                        },
                        {
                            data: 'numero_camion',
                            name: 'numero_camion'
                        },
                        {
                            data: 'type_camion',
                            name: 'type_camion'
                        },
                        {
                            data: 'arrivee_prevue',
                            name: 'arrivee_prevue'
                        },
                        {
                            data: 'status',
                            name: 'status',
                            render: function(data, type, row) {
                                return `<span class="p-2 rounded-lg text-white font-semibold bg-${data == 'Confirmée' ? 'green-400' : data == 'En attente' ? 'yellow-400' : 'red-400'}">${data}</span>`;
                            }
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false,
                            dom: "p",
                            render: function(data, type, row) {
                                return `
<div class="d-flex justify-content-center">
    
   
    <button class="btn btn-link text-primary px-2 mb-0" title="Modifier" onclick="openModal('updateReservationModal')">
        <i class="bx bx-pencil fs-5"></i>
    </button>
    <button class="btn btn-link text-danger px-2 mb-0" title="Supprimer" onclick="confirmDelete(${row.id})">
        <i class="bx bx-trash fs-5"></i>
    </button>
     
</div>`;
                            }


                        },
                    ]
                });
                $('#customSearchBox').on('input', function() {
                    datatable.search(this.value).draw();
                });
            });
        </script>
        <script>
            function showViewModal(id) {
                $.get(`/reservations/${id}`, function(data) {
                    $('#viewReservationContent').html(data);
                    $('#viewReservationModal').modal('show');
                });
            }

            function showEditModal(id) {
                $.get(`/reservations/${id}/edit`, function(formHtml) {
                    $('#editReservationContent').html(formHtml);
                    $('#editReservationModal').modal('show');
                });
            }

            function confirmDelete(id) {
                $('#deleteReservationForm').attr('action', `/reservations/${id}`);
                $('#deleteReservationModal').modal('show');
            }
        </script>

        <script>
            function openModal(id) {
                document.getElementById(id).classList.remove('hidden');
                document.getElementById(id).classList.add('flex');
            }

            function closeModal(id) {
                document.getElementById(id).classList.add('hidden');
                document.getElementById(id).classList.remove('flex');
            }
        </script>


        <script>
            function confirmDelete(id) {
                Swal.fire({
                    title: 'Êtes-vous sûr de supprimée la reservations ?',
                    text: "Cette action est irréversible !",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#f97317',
                    cancelButtonColor: '#000',
                    confirmButtonText: 'Oui, supprimer !',
                    cancelButtonText: 'Annuler'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `/reservations/${id}`,
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Supprimé!',
                                    'La réservation a été supprimée.',
                                    'success'
                                )
                                $('#tableReservation').DataTable().ajax.reload();
                            },

                        });
                    }
                });
            }
        </script>



    </body>
@endsection
