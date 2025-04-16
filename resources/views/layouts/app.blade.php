<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
    <link href="{{ asset('app.css') }}" rel="stylesheet">

    <title>
        Soft UI Dashboard 3 by Creative Tim
    </title>

    <link href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,800" rel="stylesheet" />
    <link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-svg.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link id="pagestyle" href="{{ asset('assets/css/soft-ui-dashboard.css') }}" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <style>
        .ps__rail-y {
            display: none !important;
        }

        .ps__rail-x {
            display: none !important;
        }

        .ps__scrollbar-y-rail {
            display: none !important;
        }

        .ps__scrollbar-x-rail {
            display: none !important;
        }

        .ps__scrollbar-y {
            display: none !important;
        }
    </style>
</head>

<body class="g-sidenav-show ">
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 ov"
        id="sidenav-main" style="height: 100vh; overflow: hidden;">
        <div style="display: flex; flex-direction: column; justify-content: space-between; height: 96vh;">
            <div>
                <div class="sidenav-header">
                    <i class="fas fa-times  cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                        aria-hidden="true" id="iconSidenav"></i>
                    <a class=" m-0 flex items-center"
                        href=" https://demos.creative-tim.com/soft-ui-dashboard/pages/dashboard.html " target="_blank">
                        <img src="{{ asset('Logo4.png') }}" class="navbar-brand-img " alt="main_logo">
                        <span class=" font-weight-bold">Camaway</span>
                    </a>
                </div>
                <hr class="horizontal dark  mt-0">
                <div class=" navbar-collapse  w-auto " id="sidenav-collapse-main">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                                href="{{ route('dashboard') }}">
                                <div
                                    class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <svg width="12px" height="12px" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24"
                                        style="fill: {{ request()->routeIs('dashboard') ? '#ffff' : 'rgba(0, 0, 0, 1)' }};transform: ;msFilter:;">
                                        <path
                                            d="M4 13h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1zm-1 7a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v4zm10 0a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v7zm1-10h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1z">
                                        </path>
                                    </svg>
                                </div>
                                <span class="nav-link-text ms-1">Tableau de bord</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('reservations.index') ? 'active' : '' }}"
                                href="{{ route('reservations.index') }}">
                                <div
                                    class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <svg width="12px" height="12px" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24"
                                        style="fill: {{ request()->routeIs('reservations.index') ? '#ffff' : 'rgba(0, 0, 0, 1)' }};transform: ;msFilter:;">
                                        <path
                                            d="M21 20V6c0-1.103-.897-2-2-2h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2zM9 18H7v-2h2v2zm0-4H7v-2h2v2zm4 4h-2v-2h2v2zm0-4h-2v-2h2v2zm4 4h-2v-2h2v2zm0-4h-2v-2h2v2zm2-5H5V7h14v2z">
                                        </path>
                                    </svg>
                                </div>
                                <span class="nav-link-text ms-1">Réservation</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('inbox') ? 'active' : '' }}" href="#">
                                <div
                                    class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <svg width="12px" height="12px" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24"
                                        style="fill: {{ request()->routeIs('inbox') ? '#ffff' : 'rgba(0, 0, 0, 1)' }};transform: ;msFilter:;">
                                        <path
                                            d="M20 3H4c-1.103 0-2 .897-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V5c0-1.103-.897-2-2-2zm-1 9h-3.142c-.446 1.722-1.997 3-3.858 3s-3.412-1.278-3.858-3H4V5h16v7h-1z">
                                        </path>
                                    </svg>
                                </div>
                                <span class="nav-link-text ms-1">Boîte de réception</span>
                            </a>
                        </li>



                    </ul>
                </div>
            </div>
            {{-- footer --}}
            <div style="margin: 10px;">
                <div style="display: flex; align-items: center; justify-content: space-between;" class="space-x-2">
                    <!-- Profile information -->
                    <div style="display: flex; align-items: center;" class="space-x-2">
                        <img src="https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?q=80&w=2080&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            alt="Profile" class="size-10 rounded-full" />
                        <div class="profile-text" style="line-height: 10px">
                            <p class="profile-name" style="margin-bottom: 0;font-size:12px; font-weight: 600;">{{auth()->user()->name}}</p>
                            <span class="profile-role" style="font-size: 10px;">Admin</span>
                        </div>
                    </div>

                    <!-- Dropdown menu -->
                    <div class="dropdown">
                        <button class="btn dropdown-toggle p-0 rounded-full hover:bg-gray-100 w-8 h-8 flex items-center justify-center transition-all duration-200" 
                            type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-ellipsis-v text-gray-600"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end right-37 -translate-y-37   border-0 rounded-xl min-w-full bg-white"
                            aria-labelledby="profileDropdown">
                            <li>
                                <a class="dropdown-item {{ request()->routeIs('settings') ? 'active bg-primary-50 text-primary' : 'text-gray-700' }} hover:bg-gray-50 px-4 py-2.5 transition-all duration-200"
                                    href="">
                                    <div class="flex items-center">
                                        <div class="rounded-md  mr-1 flex items-center justify-center">
                                            <i class='bx bxs-cog text-black text-md'></i>
                                        </div>
                                        <span class="font-medium text-xs text-black">Parametres</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider my-2 border-gray-100">
                            </li>
                            <li>
                                <a class="dropdown-item {{ request()->routeIs('logout') ? 'active bg-primary-50 text-primary' : 'text-gray-700' }} hover:bg-gray-50 hover:text-rose-600 px-4 py-2.5 transition-all duration-200"
                                    href="{{ route('logout') ?? '../pages/profile.html' }}">
                                    <div class="flex items-center">
                                        <div class="rounded-md mr-1 flex items-center justify-center">
                                            <i class='bx bx-log-out text-black text-md'></i>
                                        </div>
                                        <span class="font-medium text-xs">Se deconnecter</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="w-full h-[0.5px] bg-gray-300 my-3"></div>
            </div>
        </div>
    </aside>
    @yield('content')

    <!--   Core JS Files   -->
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
    <script>
        var ctx = document.getElementById("chart-bars").getContext("2d");

        new Chart(ctx, {
            type: "bar",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Sales",
                    tension: 0.4,
                    borderWidth: 0,
                    borderRadius: 4,
                    borderSkipped: false,
                    backgroundColor: "#fff",
                    data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
                    maxBarThickness: 6
                }, ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                        },
                        ticks: {
                            suggestedMin: 0,
                            suggestedMax: 500,
                            beginAtZero: true,
                            padding: 15,
                            font: {
                                size: 14,
                                family: "Inter",
                                style: 'normal',
                                lineHeight: 2
                            },
                            color: "#fff"
                        },
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false
                        },
                        ticks: {
                            display: false
                        },
                    },
                },
            },
        });


        var ctx2 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
        gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

        var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

        gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
        gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
        gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

        new Chart(ctx2, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                        label: "Reservations",
                        tension: 0.4,
                        borderWidth: 0,
                        pointRadius: 0,
                        borderColor: "#F97317",
                        borderWidth: 3,
                        backgroundColor: gradientStroke1,
                        fill: true,
                        data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                        maxBarThickness: 6

                    },
                    
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#b2b9bf',
                            font: {
                                size: 11,
                                family: "Inter",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#b2b9bf',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Inter",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('assets/js/soft-ui-dashboard.min.js?v=1.1.0') }}"></script>
</body>

</html>
