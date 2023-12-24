<x-mail::message>
    # Commande livée avec succès!

    Votre commande a été livrée avec succès.

    <x-mail::button :url="$url">
        Voir la commande
    </x-mail::button>

    Merci,<br>
    {{ config('app.name') }}
</x-mail::message>
