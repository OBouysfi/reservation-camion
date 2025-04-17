

<div id="updateReservationModal" class="fixed inset-0  bg-opacity-40 hidden items-center justify-center z-50 transition-all">
        <div class="bg-white rounded-xl w-full max-w-2xl shadow-xl overflow-hidden">

            <div class="flex justify-between items-center px-6 py-4 ">
                <h2 class="text-xl font-semibold text-gray-800">Update Réservation</h2>
                <button onclick="closeModal('newReservationModal')"
                    class="text-2xl text-gray-400 hover:text-black">&times;</button>
            </div>


            <div class="p-6">
                <form id="updateReservationForm" class="grid grid-cols-1 md:grid-cols-2 gap-4" method="POST"
                    action="{{ route('reservations.store') }}">
                    @csrf

                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">



                    <div class="col-span-2">
                        <label class="block text-sm font-medium mb-1">Chauffeur</label>
                        <input type="text" name="chauffeur" class="input input-bordered w-full" value="" required>
                    </div>
                    <div class="col-span-2">
                        <label class="block text-sm font-medium mb-1">Numéro de Camion</label>
                        <input type="text" name="numero_camion" class="input input-bordered w-full" required>
                    </div>



                    <div class="col-span-2 md:col-span-1">
                        <label class="block text-sm font-medium mb-1">Type de Camion</label>
                        <select name="type_camion" class="select select-bordered w-full" required>
                            <option value="Plateau">Plateau</option>
                            <option value="Rideau coulissant">Rideau coulissant</option>
                        </select>
                    </div>

                    <div class="col-span-2 md:col-span-1">
                        <label class="block text-sm font-medium mb-1">Arrivée Prévue</label>
                        <input type="datetime-local" name="arrivee_prevue" class="input input-bordered w-full" required>
                    </div>
                </form>
            </div>

            <div class="flex justify-end items-center px-6 py-4 space-x-2">
                <button onclick="closeModal('newReservationModal')" class="btn btn-ghost">Annuler</button>
                <button form="newReservationForm" class="btn btn-primary">Enregistrer</button>
            </div>
        </div>
    </div>