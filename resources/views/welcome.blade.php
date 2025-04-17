<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Nouvelle Réservation - Camaway</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Toastify CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <!-- Toastify JS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    @vite('resources/css/app.css') <!-- Tailwind -->
</head>
<style>
    :root {
        --primary-orange: #FF6B35;
        --light-orange: #FF8C5A;
        --dark-orange: #E05A2B;
        --pure-white: #FFFFFF;
        --medium-gray: #E0E0E0;
    }

    header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        border-bottom: 2px solid var(--medium-gray);
    }

    .logo-container {
        display: flex;
        align-items: center;
        background-image:
    }



    .brand-name {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--primary-black);

    }

    .auth-buttons {
        display: flex;
        gap: 15px;
    }

    .btn {
        padding: 10px 25px;
        border-radius: 30px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        border: none;
        font-size: 1rem;
    }

    .btn-outline {
        background-color: transparent;
        border: 2px solid var(--primary-orange);
        color: var(--primary-orange);
    }

    .btn-outline:hover {
        background-color: var(--primary-orange);
        color: var(--pure-white);
    }

    .btn-solid {
        background-color: var(--primary-orange);
        color: var(--pure-white);
    }

    .btn-solid:hover {
        background-color: var(--dark-orange);
    }

    /* Responsive Design for Header */
    @media (max-width: 768px) {
        header {
            flex-direction: column;
            align-items: flex-start;
            gap: 20px;
        }

        .auth-buttons {
            width: 100%;
            justify-content: flex-end;
        }
    }

    /* Update the carousel styles */
    .carousel-container {
        position: relative;
        overflow: hidden;
        padding: 2rem 0;
        max-width: 100%;
        margin: 0 auto;
    }

    .carousel-track {
        display: flex;
        justify-content: center;
        gap: 1rem;
        position: relative;
        transition: all 0.5s ease;
        padding: 0 60px;
        /* Make room for arrows */
    }

    .carousel-item {
        min-width: calc((100% - 240px) / 6);
        /* Divide remaining space by 6 */
        transition: all 0.5s ease;
        transform: scale(0.7);
        opacity: 0.7;
    }

    .carousel-item.active {
        transform: scale(1);
        opacity: 1;
        z-index: 10;
    }


    .carousel-nav {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 40px;
        height: 40px;
        background-color: var(--primary-orange);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        z-index: 20;
        transition: all 0.3s ease;
        border: none;
    }

    .carousel-nav:hover {
        background-color: var(--dark-orange);
    }

    .carousel-nav.prev {
        left: 10px;
    }

    .carousel-nav.next {
        right: 10px;
    }

    /* Add to your existing styles */
    .contact-section {
        background-size: cover;
        background-position: center;
        position: relative;
    }

    .contact-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .contact-content {
        position: relative;
        z-index: 10;
    }

    /* Add to your existing styles */
    body {
        overflow-x: hidden;
        /* Prevent horizontal scrollbar */
    }

    .contact-section {
        width: 100vw;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
</style>

<body class="bg-gray-50">
    @if (session('success'))
        <script>
            Toastify({
                text: "{{ session('success') }}",
                className: "info",
                gravity: "bottom",
                position: "left",
                style: {
                    background: '#B3D8A8',
                    border: '1px solid #fff'
                }
            }).showToast();
        </script>
    @endif

    <!-- Header -->
    <header class="px-6">
        <div class="logo-container">
            <div class="logo">
                <img src="{{ asset('Logo4.png') }}" class="navbar-brand-img size-26 h-20  " alt="main_logo">
            </div>
            <h1 class=" !text-lg font-bold">Camaway</h1>
        </div>
        <div class="auth-buttons">
            @if (!Auth::check())
                <a href="{{ route('login') }}" class="btn btn-outline">Se connecter</a>
                <a href="{{ route('register') }}" class="btn btn-solid">S'inscrire</a>
            @else
                <a href="{{ route('dashboard') }}" class="btn btn-solid">Dashboard</a>
            @endif
        </div>
    </header>


    <section class="relative bg-cover bg-center h-[400px]" style="background-image: url('{{ asset('truck5.jpg') }}');">
        <div class="flex flex-col items-center gap-4 justify-center h-full bg-black bg-opacity-15">
            <div class="w-20 h-20 md:w-28 md:h-28">

            </div>
            <div class="text-center">
                <h2 class="text-4xl md:text-5xl font-bold drop-shadow text-white">Nouvelle Réservation</h2>
                <p class="text-lg mt-2 drop-shadow text-white">Louez un camion pour votre prochaine mission</p>
            </div>
        </div>
    </section>

    <section class="max-w-6xl mx-auto px-4 mt-[-80px] z-10 relative">
        <div class="carousel-container">
            <div class="carousel-track">
                <div class="carousel-item">
                    <img src="{{ asset('truck1.jpg') }}" class="w-full h-64 object-cover rounded-xl shadow-lg"
                        alt="Truck 1">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('truck2.jpg') }}" class="w-full h-64 object-cover rounded-xl shadow-lg"
                        alt="Truck 2">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('truck3.jpg') }}" class="w-full h-64 object-cover rounded-xl shadow-lg"
                        alt="Truck 3">
                </div>
            </div>
        </div>
    </section>


    <section class="max-w-4xl mx-auto mt-12 px-4">
        <div class="bg-white rounded-xl shadow-2xl overflow-hidden border border-orange-100">
            <div class="p-6 border-b border-gray-200">
                <h2 class="text-2xl font-semibold text-gray-800">Formulaire de Réservation</h2>
                <p class="text-sm text-gray-500 mt-1">Veuillez remplir tous les champs requis ci-dessous.</p>
            </div>

            <form class="p-6 space-y-6" method="POST" action="{{ route('reservations.reslog') }}">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

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
                        <label class="block text-sm font-medium text-gray-700 mb-2">Numéro de Camion</label>
                        <input type="text" name="numero_camion"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition"
                            required>
                    </div>


                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Type de Camion</label>
                        <select name="type_camion"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition"
                            required>
                            <option value="">Sélectionnez un type</option>
                            <option value="Plateau">Plateau</option>
                            <option value="Rideau coulissant">Rideau coulissant</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Arrivée Prévue</label>
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
        <br>
        <br>


        <section class="relative w-screen left-[50%] right-[50%] ml-[-50vw] mr-[-50vw] bg-cover bg-center py-20"
            style="background-image: url('{{ asset('truck9.jpg') }}');">
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>
            <div class="container mx-auto px-4 relative z-10">
                <div class="max-w-4xl mx-auto bg-white/30 backdrop-sm rounded-xl shadow-xl p-8 md:p-12">
                    <h2 class="text-3xl font-bold text-center text-white mb-2">N'hésitez pas à dire bonjour !</h2>
                    <h3 class="text-xl text-orange-500 text-center font-semibold mb-8">PRENEZ CONTACT AVEC NOUS</h3>

                    <form action="https://formsubmit.co/pijori4753@mobilesm.com"
                        class="grid grid-cols-1 md:grid-cols-2 gap-8" method="POST">

                        <div class="space-y-6">
                            <div>
                                <label class="block text-lg font-semibold text-white mb-2">Votre nom</label>
                                <input type="text"
                                    class="w-full px-4 py-2 bg-white/20 border border-white/30 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 text-white placeholder-white/70"
                                    placeholder="Entrez votre nom" required>
                            </div>

                            <div>
                                <label class="block text-lg font-semibold text-white mb-2">Adresse e-mail</label>
                                <input type="email"
                                    class="w-full px-4 py-2 bg-white/20 border border-white/30 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 text-white placeholder-white/70"
                                    placeholder="Entrez votre adresse e-mail" required>
                            </div>

                            <div>
                                <label class="block text-lg font-semibold text-white mb-2">Numéro de téléphone</label>
                                <input type="tel"
                                    class="w-full px-4 py-2 bg-white/20 border border-white/30 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 text-white placeholder-white/70"
                                    placeholder="Entrez votre numéro de téléphone">
                            </div>
                        </div>


                        <div>
                            <label class="block text-lg font-semibold text-white mb-2">Message</label>
                            <textarea rows="8"
                                class="w-full px-4 py-2 bg-white/20 border border-white/30 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 text-white placeholder-white/70"
                                placeholder="Écrivez votre message ici..." required></textarea>
                        </div>


                        <div class="mt-8 text-center">
                            <button type="submit"
                                class="px-8 py-3 bg-orange-500 hover:bg-orange-600 text-white rounded-lg font-bold text-lg transition duration-300">
                                ENVOYER LE MESSAGE
                            </button>
                        </div>


                        <div class="grid grid-cols-2 items-end space-y-6 text-white">
                            <div class="text-center">
                                <h4 class="font-semibold mb-2">Address</h4>
                                <p>TGIC Pennsylvania Ave NW</p>
                            </div>
                            <div class="text-center">
                                <h4 class="font-semibold mb-2">Contact</h4>
                                <p>Phone: +1 200 818 9178<br>Support: 91984 319383</p>
                            </div>
                            <div class="text-center">
                                <h4 class="font-semibold mb-2">Email</h4>
                                <p>info@example.com</p>
                            </div>
                        </div>
                </div>
            </div>
        </section>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const items = document.querySelectorAll('.carousel-item');
                let currentIndex = 0;

                function updateCarousel(newIndex) {
                    items.forEach((item, index) => {
                        item.classList.remove('active', 'prev', 'next');

                        if (index === newIndex) {
                            item.classList.add('active');
                        } else if (index === ((newIndex - 1 + items.length) % items.length)) {
                            item.classList.add('prev');
                        } else if (index === ((newIndex + 1) % items.length)) {
                            item.classList.add('next');
                        }
                    });

                    currentIndex = newIndex;
                }


                updateCarousel(currentIndex);


                setInterval(() => {
                    currentIndex = (currentIndex + 1) % items.length;
                    updateCarousel(currentIndex);
                }, 2000);
            });
        </script>
</body>

</html>
