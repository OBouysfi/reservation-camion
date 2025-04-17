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
{{-- 
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <div
                                    class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <svg width="12px" height="12px" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24"
                                        style="fill:#000;transform: ;msFilter:;">
                                        <path
                                            d="M20 3H4c-1.103 0-2 .897-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V5c0-1.103-.897-2-2-2zm-1 9h-3.142c-.446 1.722-1.997 3-3.858 3s-3.412-1.278-3.858-3H4V5h16v7h-1z">
                                        </path>
                                    </svg>
                                </div>
                                <span class="nav-link-text ms-1">Boîte de réception</span>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('profile.edit') ? 'active' : '' }}"
                                href="{{ route('profile.edit') }}">
                                <div
                                    class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                        viewBox="0 0 24 24"
                                        style="fill: {{ request()->routeIs('profile.edit') ? '#ffff' : 'rgba(0, 0, 0, 1)' }};transform: ;msFilter:;">
                                        <path
                                            d="m2.344 15.271 2 3.46a1 1 0 0 0 1.366.365l1.396-.806c.58.457 1.221.832 1.895 1.112V21a1 1 0 0 0 1 1h4a1 1 0 0 0 1-1v-1.598a8.094 8.094 0 0 0 1.895-1.112l1.396.806c.477.275 1.091.11 1.366-.365l2-3.46a1.004 1.004 0 0 0-.365-1.366l-1.372-.793a7.683 7.683 0 0 0-.002-2.224l1.372-.793c.476-.275.641-.89.365-1.366l-2-3.46a1 1 0 0 0-1.366-.365l-1.396.806A8.034 8.034 0 0 0 15 4.598V3a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v1.598A8.094 8.094 0 0 0 7.105 5.71L5.71 4.904a.999.999 0 0 0-1.366.365l-2 3.46a1.004 1.004 0 0 0 .365 1.366l1.372.793a7.683 7.683 0 0 0 0 2.224l-1.372.793c-.476.275-.641.89-.365 1.366zM12 8c2.206 0 4 1.794 4 4s-1.794 4-4 4-4-1.794-4-4 1.794-4 4-4z">
                                        </path>
                                    </svg>
                                </div>
                                <span class="nav-link-text ms-1">Paramètres</span>
                            </a>
                        </li>



                    </ul>
                </div>
            </div>
            {{-- footer --}}
            <div class="mx-4">
                <div class="w-full h-[1px] bg-gradient-to-r from-gray-100 via-gray-300 to-gray-100 mb-2"></div>

                <div style="display: flex; align-items: center; justify-content: space-between;" class="space-x-2">
                    <!-- Profile information -->
                    <div style="display: flex; align-items: center;" >

                        <img src="{{ Auth::user()->profile_photo
                            ? asset('storage/' . Auth::user()->profile_photo)
                            : 'https://avatar.iran.liara.run/public/9' }}"
                            id="profileImagePreview"  style="width: 40px; height: 40px; margin-right: 10px;" alt="Profile Image" />

                        <div class="profile-text" style="line-height: 10px">
                            <p class="profile-name" style="margin-bottom: 0;font-size:12px; font-weight: 600;">
                                {{ auth()->user()->name }}</p>
                            <span class="profile-role" style="font-size: 10px;">Admin</span>
                        </div>

                    </div>

                    <!-- Logout button -->
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="">
                            <i class='bx bx-log-out'></i>
                        </button>
                    </form>
                </div>


            </div>
        </div>
    </aside>