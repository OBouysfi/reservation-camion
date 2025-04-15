{{-- filepath: c:\Users\IMAD\Desktop\res-cam\resources\views\Reservation.blade.php --}}
@extends('layouts.app')

@section('content')

    <body class="g-sidenav-show bg-gray-100">
        <style>
            .dataTables_wrapper .dataTables_filter {
                display: none;
            }
            tr td{
                border-bottom: 0.5px solid rgb(231, 231, 231) !important;
                
                padding: 10px !important;
            }
        </style>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
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
                        <div class="flex items-center justify-between w-full mt-5">
                            <h6 class="font-weight-bolder text-2xl mb-0">Les Reservations</h6>
                        </div>
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
                                        <div class="btn-group mt-3">
                                            <button class="btn btn-sm btn-outline-secondary">
                                                <i class="bx bxs-file-pdf"></i> PDF
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary">
                                                <i class="bx bxs-file-export"></i> Excel
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary">
                                                <i class="bx bx-printer"></i> Imprimer
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-2 text-end">
                                        <button class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#newReservationModal">
                                            <i class="bx bx-plus"></i> Nouvelle Réservation
                                        </button>
                                        <div class="modal fade" id="newReservationModal" tabindex="-1">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Nouvelle Réservation</h5>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="newReservationForm">
                                                            <div class="row g-3">
                                                                <div class="col-md-6">
                                                                    <label class="form-label">Nom du Client</label>
                                                                    <input type="text" class="form-control" required>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="form-label">Email</label>
                                                                    <input type="email" class="form-control" required>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="form-label">Téléphone</label>
                                                                    <input type="tel" class="form-control" required>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="form-label">Date de Réservation</label>
                                                                    <input type="date" class="form-control" required>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="form-label">Type de Camion</label>
                                                                    <select class="form-select" required>
                                                                        <option value="">Sélectionner un type</option>
                                                                        <option value="petit">Petit</option>
                                                                        <option value="moyen">Moyen</option>
                                                                        <option value="grand">Grand</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="form-label">Durée (en jours)</label>
                                                                    <input type="number" class="form-control"
                                                                        min="1" required>
                                                                </div>
                                                                <div class="col-12">
                                                                    <label class="form-label">Adresse de livraison</label>
                                                                    <textarea class="form-control" rows="3" required></textarea>
                                                                </div>
                                                                <div class="col-12">
                                                                    <label class="form-label">Notes supplémentaires</label>
                                                                    <textarea class="form-control" rows="2"></textarea>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Annuler</button>
                                                        <button type="submit" form="newReservationForm"
                                                            class="btn btn-primary">Enregistrer</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Table Section -->
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-body px-0 pt-0 pb-2">
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0" id="tableReservation">
                                        <thead class="">
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
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
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
        <script src="../assets/js/soft-ui-dashboard.min.js?v=1.1.0"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
        <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script>
            $(function() {

                let datatable = $('#tableReservation').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route('reservations.index') }}',
                    columns: [{
                            data: 'id',
                            name: 'id'
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
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false,
                            dom: "p",
                            render: function(data, type, row) {
                                return `
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-link text-dark px-2 mb-0" title="View">
                                        <i class="bx bx-show fs-5"></i>
                                    </button>
                                    <button class="btn btn-link text-primary px-2 mb-0" title="Edit">
                                        <i class="bx bx-pencil fs-5"></i>
                                    </button>
                                    <button class="btn btn-link text-danger px-2 mb-0" title="Delete">
                                        <i class="bx bx-trash fs-5"></i>
                                    </button>
                                </div>
                            `;
                            }
                        },
                    ]
                });
                $('#customSearchBox').on('input', function() {
                    datatable.search(this.value).draw();
                });
            });
        </script>
    </body>
@endsection
