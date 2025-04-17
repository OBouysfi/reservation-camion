@component('mail::message')
    # ✅ Réservation Confirmée

    Bonjour **{{ $reservation->chauffeur }}**,

    Nous avons le plaisir de vous informer que votre réservation **n°{{ $reservation->id }}** a bien été **confirmée**.

    Si vous avez des questions ou besoin d’assistance, n'hésitez pas à nous contacter.

    Merci de votre confiance,
    **{{ config('app.name') }}**
@endcomponent
