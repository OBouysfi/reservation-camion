<style>
    /* ——— paste your entire style block here ——— */
    /* Base Styles */
    .detail-card {
        border-radius: 18px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1);

        margin: 0 auto;
        border: none;
        background: linear-gradient(135deg, #ffffff 0%, #f9fafb 100%);
        overflow: hidden;
        position: relative;
    }

    .detail-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 8px;
        background: linear-gradient(90deg, #ff5e00 0%, #ffd900 100%);
    }

    .detail-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
    }

    /* Section Styling */
    .section-divider {
        margin: 2rem 0;
        border: none;
        height: 1px;
        background: linear-gradient(90deg, transparent, rgba(209, 213, 219, 0.6), transparent);
        position: relative;
    }

    .section-divider::after {
        content: '';
        position: absolute;
        top: -2px;
        left: 50%;
        transform: translateX(-50%);
        width: 40px;
        height: 3px;
        background: linear-gradient(90deg, #9be546, #10b981);
        border-radius: 3px;
    }

    /* Typography */
    .info-label {
        color: #6b7280;
        font-size: 0.85rem;
        margin-bottom: 6px;
        letter-spacing: 0.03em;
        font-weight: 500;
    }

    .info-value {
        font-weight: 600;
        font-size: 1.05rem;
        color: #111827;
        letter-spacing: 0.01em;
    }

    .section-title {
        font-size: 0.8rem;
        color: #6b7280;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        margin-bottom: 1.25rem;
        position: relative;
        display: inline-block;
        padding-bottom: 8px;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 2px;
        background: linear-gradient(90deg, rgba(79, 70, 229, 0.3), transparent);
    }

    /* Layout */
    .content-container {
        padding: 2.5rem;
    }

    /* Driver Info */
    .driver-info {
        display: flex;
        align-items: center;
        margin-bottom: 2rem;
        position: relative;
    }

    .driver-avatar {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1.5rem;
        color: rgb(76, 69, 69);
        font-size: 1.75rem;
        font-weight: 600;
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.2);
        overflow: hidden;
    }

    .driver-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
    }

    .driver-info h4 {
        font-size: 1.5rem;
        color: #1f2937;
        font-weight: 700;
        margin-bottom: 0.25rem;
        letter-spacing: -0.01em;
    }

    .driver-info span {
        color: #4b5563;
        font-size: 0.95rem;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    /* Badges */
    .badge-custom {
        padding: 6px 14px;
        border-radius: 9999px;
        font-weight: 600;
        font-size: 0.75rem;
        letter-spacing: 0.03em;
    }

    .status-badge {
        background: linear-gradient(135deg, #f59e0b 0%, #f97316 100%);
        color: white;
        box-shadow: 0 2px 6px rgba(245, 158, 11, 0.2);
    }

    /* Stats */
    .stats-container {
        background: linear-gradient(135deg, rgba(79, 70, 229, 0.05) 0%, rgba(16, 185, 129, 0.05) 100%);
        border-radius: 12px;
        padding: 1.5rem;
        margin-top: 1rem;
        border: 1px solid rgba(209, 213, 219, 0.3);
        display: flex;
        align-items: center;
    }

    .stats-value {
        font-size: 2rem;
        font-weight: 700;
        background: linear-gradient(90deg, #ffbb00 0%, #ff7300 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-right: 1rem;
    }

    /* Back Button */
    .back-btn {
        transition: all 0.3s ease;
        border-radius: 8px;
        padding: 8px 16px;
        border: 1px solid #e5e7eb;
        background-color: white;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #4b5563;
        font-weight: 500;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.03);
    }

    .back-btn:hover {
        background-color: #f9fafb;
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        color: #1f2937;
        border-color: #d1d5db;
    }

    /* Animation */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in {
        animation: fadeIn 0.6s ease forwards;
    }

    .delay-1 {
        animation-delay: 0.1s;
    }

    .delay-2 {
        animation-delay: 0.2s;
    }

    .delay-3 {
        animation-delay: 0.3s;
    }
</style>





<div x-data="{ showView: false, showEdit: false }" class="mt-2">
    {{-- Reservation Details --}}
    {{-- Action Buttons --}}
    <div class="flex justify-center items-center gap-2">
        {{-- Voir --}}
        <button class="btn btn-sm" @click="showView = true">
            <svg fill="#000000" width="20px" height="20px" version="1.1" id="Capa_1"
                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="800px"
                height="800px" viewBox="0 0 442.04 442.04" xml:space="preserve">
                <g>
                    <g>
                        <path
                            d="M221.02,341.304c-49.708,0-103.206-19.44-154.71-56.22C27.808,257.59,4.044,230.351,3.051,229.203
                   c-4.068-4.697-4.068-11.669,0-16.367c0.993-1.146,24.756-28.387,63.259-55.881c51.505-36.777,105.003-56.219,154.71-56.219
                   c49.708,0,103.207,19.441,154.71,56.219c38.502,27.494,62.266,54.734,63.259,55.881c4.068,4.697,4.068,11.669,0,16.367
                   c-0.993,1.146-24.756,28.387-63.259,55.881C324.227,321.863,270.729,341.304,221.02,341.304z M29.638,221.021
                   c9.61,9.799,27.747,27.03,51.694,44.071c32.83,23.361,83.714,51.212,139.688,51.212s106.859-27.851,139.688-51.212
                   c23.944-17.038,42.082-34.271,51.694-44.071c-9.609-9.799-27.747-27.03-51.694-44.071
                   c-32.829-23.362-83.714-51.212-139.688-51.212s-106.858,27.85-139.688,51.212C57.388,193.988,39.25,211.219,29.638,221.021z" />
                    </g>
                    <g>
                        <path d="M221.02,298.521c-42.734,0-77.5-34.767-77.5-77.5c0-42.733,34.766-77.5,77.5-77.5c18.794,0,36.924,6.814,51.048,19.188
                   c5.193,4.549,5.715,12.446,1.166,17.639c-4.549,5.193-12.447,5.714-17.639,1.166c-9.564-8.379-21.844-12.993-34.576-12.993
                   c-28.949,0-52.5,23.552-52.5,52.5s23.551,52.5,52.5,52.5c28.95,0,52.5-23.552,52.5-52.5c0-6.903,5.597-12.5,12.5-12.5
                   s12.5,5.597,12.5,12.5C298.521,263.754,263.754,298.521,221.02,298.521z" />
                    </g>
                    <g>
                        <path
                            d="M221.02,246.021c-13.785,0-25-11.215-25-25s11.215-25,25-25c13.786,0,25,11.215,25,25S234.806,246.021,221.02,246.021z" />
                    </g>
                </g>
            </svg>

        </button>
        
        {{-- Modifier --}}
        <button class="btn btn-sm  " @click="showEdit = true"><i class='bx bxs-edit-alt text-lg'></i></button>

        {{-- Supprimer --}}
        <button type="button" class="btn btn-error btn-sm" onclick="confirmDelete({{ $reservation->id }})">
            <i class='bx bxs-trash-alt text-lg text-red-500'></i>
        </button>

        {{-- Hidden Delete Form --}}
        <form id="delete-form-{{ $reservation->id }}" method="POST"
            action="{{ route('reservations.destroy', $reservation->id) }}" class="hidden">
            @csrf
            @method('DELETE')
        </form>
    </div>

    {{-- SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Confirmation',
                text: 'Êtes-vous sûr ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Oui, supprimer',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>

    {{-- View Modal --}}
    <div x-show="showView" x-cloak @keydown.escape.window="showView = false" @click.self="showView = false"
        class="fixed inset-0  flex items-center justify-center bg-transparent bg-opacity-50 z-40">
        <div @click.stop class="detail-card animate-fade-in delay-1">
            <div class="content-container">

                <!-- Driver Header -->
                <div class="driver-info ">
                    <div class="driver-avatar !border-[1px]">
                        <img src="/Logo4.png" class="border-[1px]" alt="">
                    </div>
                    <hr />
                    <div>
                        <h4 class="text-start">{{ $reservation->chauffeur }}</h4>
                        <span>


                            <i class='bx bxs-envelope text-lg text-primary'></i>
                            {{-- Email Icon --}}
                            {{ $reservation->email }}
                        </span>
                    </div>
                </div>
                <hr class="section-divider my-5" />
                <!-- Two-column Info -->
                <div class="flex flex-wrap gap-8">
                    <div class="flex-1 min-w-[280px]">
                        <h3 class="section-title">Information du camion</h3>
                        <p class="info-label">Numéro de camion :</p>
                        <p class="info-value">{{ $reservation->numero_camion }}</p>
                        <p class="info-label">Type de camion :</p>
                        <p class="info-value">{{ $reservation->type_camion }}</p>
                    </div>
                    <div class="flex-1 min-w-[280px]">
                        <h3 class="section-title">Détails de réservation</h3>
                        <p class="info-label">Référence :</p>
                        <p class="info-value">{{ $reservation->reference }}</p>
                        <p class="info-label">
                            <span><i class='bx bxs-calendar text-primary'></i></span>
                            Arrivée prévue :
                        </p>
                        <p class="info-value">
                            <!-- Calendar Icon -->
                            {{ \Carbon\Carbon::parse($reservation->arrival)->translatedFormat('d/m/Y H:i') }}
                        </p>
                        <p class="info-label">Statut :</p>
                        <span class="badge-custom status-badge">{{ ucfirst($reservation->status) }}</span>
                    </div>
                </div>




                <!-- Close Button -->
                <div class="text-right mt-6">
                    <button @click="showView = false" class="back-btn">
                        <!-- Back Icon --> Fermer
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Edit Modal --}}

    <div x-show="showEdit" x-cloak x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95" @keydown.escape.window="showEdit = false"
        class="fixed inset-0 flex items-center justify-center bg-transparent bg-opacity-60 backdrop-blur-sm z-40"
        @click.self="showEdit = false">
        <div @click.stop
            class="bg-white dark:bg-gray-800 rounded-xl shadow-2xl max-w-xl w-full p-0 overflow-hidden transform transition-all">
            <!-- Header with decorative accent -->
            <div class="bg-gradient-to-r from-orange-500 to-yellow-600 h-2"></div>

            <div class="p-6">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Modifier la réservation</h2>
                    <button @click="showEdit = false"
                        class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 transition-colors">
                       
                    </button>
                </div>

                <form method="POST" action="{{ route('reservations.update', $reservation->id) }}" class="space-y-5">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <!-- Email -->
                        <div class="col-span-2">
                            <x-input-label for="email-{{ $reservation->id }}" value="Email"
                                class="text-gray-700 dark:text-gray-300 font-medium" />
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>


                                <input id="email-{{ $reservation->id }}" name="email" type="email"
                                    value="{{ $reservation->email }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition"
                                    required>
                            </div>
                            <x-input-error :messages="$errors->get('email')" class="mt-1 text-sm" />
                        </div>

                        <!-- Chauffeur -->
                        <div>
                            <x-input-label for="chauffeur-{{ $reservation->id }}" value="Chauffeur"
                                class="text-gray-700 dark:text-gray-300 font-medium" />
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>


                                <input type="text" name="chauffeur" id="chauffeur-{{ $reservation->id }}"
                                    value="{{ $reservation->chauffeur }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition"
                                    required>


                            </div>
                            <x-input-error :messages="$errors->get('chauffeur')" class="mt-1 text-sm" />
                        </div>

                        <!-- Numéro de camion -->
                        <div>
                            <x-input-label for="numero_camion-{{ $reservation->id }}" value="Numéro de camion"
                                class="text-gray-700 dark:text-gray-300 font-medium" />
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>


                                <input type="text" id="numero_camion-{{ $reservation->id }}" name="numero_camion"
                                    value="{{ $reservation->numero_camion }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition"
                                    required>
                            </div>
                            <x-input-error :messages="$errors->get('numero_camion')" class="mt-1 text-sm" />
                        </div>

                        <!-- Type de camion -->
                        <div>
                            <x-input-label for="type_camion-{{ $reservation->id }}" value="Type de camion"
                                class="text-gray-700 dark:text-gray-300 font-medium" />
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                                    </svg>
                                </div>

                                <select id="type_camion-{{ $reservation->id }}" name="type_camion"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition"
                                    required>
                                    <option value="Plateau"
                                        {{ $reservation->type_camion === 'Plateau' ? 'selected' : '' }}>
                                        Plateau
                                    </option>
                                    <option value="Rideau coulissant"
                                        {{ $reservation->type_camion === 'Rideau coulissant' ? 'selected' : '' }}>
                                        Rideau coulissant
                                    </option>
                                </select>
                            </div>
                            <x-input-error :messages="$errors->get('type_camion')" class="mt-1 text-sm" />
                        </div>

                        <!-- Date d'arrivée -->
                        <div class="col-span-2">
                            <x-input-label for="arrivee_prevue-{{ $reservation->id }}" value="Arrivée prévue"
                                class="text-gray-700 dark:text-gray-300 font-medium" />
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>


                                <input type="datetime-local" name="arrivee_prevue"
                                    value="{{ $reservation->arrivee_prevue }}"
                                    id="arrivee_prevue-{{ $reservation->id }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition"
                                    required>
                            </div>
                            <x-input-error :messages="$errors->get('arrivee_prevue')" class="mt-1 text-sm" />
                        </div>
                    </div>

                    <div class="pt-5 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex justify-end !space-x-3">
                            <button type="button"
                                class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg border border-gray-300 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors duration-200 font-medium dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 dark:hover:bg-gray-600"
                                @click="showEdit = false">
                                Annuler
                            </button>
                            <button type="submit"
                                class="px-4 py-2 bg-primary text-white rounded-lg  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200 font-medium shadow-sm">
                                Enregistrer
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
