@extends('layouts.app')

@section('content')

    <body class="g-sidenav-show bg-gray-100">
        <style>
            .dataTables_wrapper .dataTables_filter {
                display: none;
            }

            .dataTables_wrapper .dataTables_length {
                display: none;
            }

            .dataTables_wrapper #tableReservation_paginate .paginate_button.current {
                border-radius: 10px
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
                                        <select id="statusFilter" class="form-select">
                                            <option value="">Tous les statuts</option>
                                            <option value="Confirmée">Confirmée</option>
                                            <option value="En attente">En attente</option>
                                            <option value="Annulée">Annulée</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="datetime-local" name="arrivee_prevue" class="form-control">
                                    </div>
                                    <div class="col-md-5">
                                        <div class="d-flex gap-2 mt-3">
                                            {{-- <a href="{{ route('reservations.export.pdf') }}"
                                                class="btn btn-danger shadow-sm d-flex align-items-center gap-2">
                                                <i class="bx bxs-file-pdf fs-5"></i>
                                                <span>PDF</span>
                                            </a> --}}
                                            <a href="{{ route('reservations.export.excel') }}"
                                                class="btn btn-success shadow-sm d-flex align-items-center gap-2">
                                                <i class="bx bxs-file-export fs-5"></i>
                                                <span>Excel</span>
                                            </a>
                                            <button id="export-selected-pdf"
                                                class="btn btn-warning shadow-sm d-flex align-items-center gap-2">
                                                <i class="bx bxs-file-pdf fs-5"></i>
                                                <span>PDF</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div x-data="{ showModal: false }" class="z-50"
                    style="display: flex; justify-content: flex-end; margin-bottom: 10px;">
                    <button @click="showModal = true" class="bg-primary text-sm text-white px-4 py-2 rounded">
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
                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
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
                                                <th><input type="checkbox" id="select-all"></th> {{-- Master checkbox --}}

                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    USER_ID</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Email</th>
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
                // Initialize DataTable
                var table = $('#tableReservation').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '{{ route('reservations.index') }}',
                        data: function(d) {
                            d.status = $('#statusFilter').val();
                            d.arrivee_prevue = $('input[name="arrivee_prevue"]').val();
                        }
                    },
                    paging: true,
                    pageLength: 10,
                    language: {
                        "lengthMenu": "Afficher _MENU_ entrées",
                        "zeroRecords": "Aucun enregistrement trouvé",
                        "info": "Affichage de _START_ à _END_ sur _TOTAL_ entrées",
                        "infoEmpty": "Affichage de 0 à 0 sur 0 entrées",
                        "infoFiltered": "(filtré à partir de _MAX_ entrées totales)",
                        "search": "Rechercher :",
                        "paginate": {
                            "first": "Premier",
                            "last": "Dernier",
                            "next": "Suivant",
                            "previous": "Précédent"
                        }
                    },
                    columnDefs: [{
                        // Setup the checkbox column
                        targets: 0,
                        searchable: false,
                        orderable: false,
                        className: 'dt-body-center',
                        render: function(data, type, full) {
                            return '<input type="checkbox" class="reservation-checkbox" value="' +
                                full.id + '">';
                        }
                    }],
                    columns: [{
                            data: null,
                            defaultContent: ''
                        }, // Checkbox column
                        {
                            data: 'user_id',
                            name: 'user_id',
                            title: 'Reference',
                        },
                        {
                            data: 'email',
                            name: 'email',

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
                                const options = ['Confirmée', 'En attente', 'Annulée'];
                                const bgClass = {
                                    'Confirmée': 'green-400',
                                    'En attente': 'yellow-400',
                                    'Annulée': 'red-400'
                                };

                                const optionTags = options.map(status => {
                                    const selected = data === status ? 'selected' : '';
                                    return `<option value="${status}" ${selected}>${status}</option>`;
                                }).join('');

                                return `
                    <select class="status-dropdown bg-${bgClass[data]} text-white font-semibold p-1 rounded" data-id="${row.id}" style="padding: 7px !important; border-radius: 5px; border: none;">
                        ${optionTags}
                    </select>`;
                            }
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false,

                        }
                    ]
                });

                // Handle "select all" checkbox
                $('#select-all').on('click', function() {
                    $('.reservation-checkbox').prop('checked', this.checked);
                });

                // When individual checkboxes change, update the "select all" checkbox
                $('#tableReservation tbody').on('change', '.reservation-checkbox', function() {
                    // If any checkbox is unchecked, uncheck the "select all" checkbox
                    if (!this.checked) {
                        $('#select-all').prop('checked', false);
                    }
                    // If all checkboxes are checked, check the "select all" checkbox
                    else if ($('.reservation-checkbox:checked').length === $('.reservation-checkbox').length) {
                        $('#select-all').prop('checked', true);
                    }
                });

                // Filter handlers
                $('#statusFilter').on('change', function() {
                    table.ajax.reload();
                });

                $('input[name="arrivee_prevue"]').on('change', function() {
                    table.ajax.reload();
                });

                $('#tableReservation').on('change', '.status-dropdown', function() {
                    const reservationId = $(this).data('id');
                    const newStatus = $(this).val();
                    const $dropdown = $(this);

                    // Show SweetAlert confirmation
                    Swal.fire({
                            title: 'Êtes‑vous sûr ?',
                            text: `Voulez‑vous changer le statut en ${newStatus} ?`,
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Oui, changer',
                            cancelButtonText: 'Annuler',
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33'
                        })
                        .then((result) => {
                            if (result.isConfirmed) {
                                // Afficher une alerte de chargement pendant la requête AJAX
                                Swal.fire({
                                    title: 'Modification en cours...',
                                    text: 'Veuillez patienter pendant la mise à jour du statut',
                                    allowOutsideClick: false,
                                    allowEscapeKey: false,
                                    didOpen: () => {
                                        Swal.showLoading();
                                    }
                                });

                                $.ajax({
                                    url: "{{ route('reservations.updateStatus', '') }}/" +
                                        reservationId,
                                    type: 'PUT',
                                    data: {
                                        status: newStatus,
                                        _token: '{{ csrf_token() }}'
                                    },
                                    success: function(response) {
                                        // Define the colors again
                                        const bgClassMap = {
                                            'Confirmée': 'green-400',
                                            'En attente': 'yellow-400',
                                            'Annulée': 'red-400'
                                        };

                                        // Remove old bg classes
                                        $dropdown.removeClass(
                                            'bg-green-400 bg-yellow-400 bg-red-400');

                                        // Add the new one
                                        $dropdown.addClass(`bg-${bgClassMap[newStatus]}`);

                                        // Afficher une notification de succès
                                        Swal.fire({
                                            title: 'Statut modifié!',
                                            text: `Le statut a été changé en "${newStatus}" avec succès`,
                                            icon: 'success',
                                            timer: 2500,
                                            timerProgressBar: true,
                                            showConfirmButton: false
                                        });
                                    },
                                    error: function(xhr, status, error) {
                                        // Afficher une notification d'erreur avec plus de détails
                                        Swal.fire({
                                            title: 'Erreur!',
                                            text: `Impossible de modifier le statut: ${xhr.responseText || error}`,
                                            icon: 'error',
                                            confirmButtonColor: '#3085d6',
                                            confirmButtonText: 'OK'
                                        });
                                    }
                                });
                            }
                        });
                });


                $('#customSearchBox').on('input', function() {
                    table.search(this.value).draw();
                });

                $('#export-selected-pdf').on('click', function() {
                    const selectedIds = [];

                    $('.reservation-checkbox:checked').each(function() {
                        selectedIds.push($(this).val());
                    });

                    if (selectedIds.length === 0) {
                        alert('Veuillez sélectionner au moins une réservation à exporter');
                        return;
                    }

                    const form = $('<form action="/export-selected-pdf" method="POST"></form>');
                    form.append('<input type="hidden" name="_token" value="{{ csrf_token() }}">');

                    selectedIds.forEach(function(id) {
                        form.append('<input type="hidden" name="ids[]" value="' + id + '">');
                    });

                    $('body').append(form);
                    form.submit();
                    form.remove();
                });
            });

            function openModal(id) {
                document.getElementById(id).classList.remove('hidden');
                document.getElementById(id).classList.add('flex');
            }

            function closeModal(id) {
                document.getElementById(id).classList.add('hidden');
                document.getElementById(id).classList.remove('flex');
            }

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
                            }
                        });
                    }
                });

            }
        </script>
        @if (session('success'))
            <script>
                window.onload = function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Succès !',
                        text: {{ Js::from(session('success')) }},
                        timer: 2500,
                        showConfirmButton: false
                    });
                };
            </script>
        @endif
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    </body>
@endsection
