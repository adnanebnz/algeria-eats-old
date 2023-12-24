<x-mail::message>
    # Commande traitée avec succès!

    Votre commande sera livrée dans les plus brefs délais.

    <x-mail::button :url="$url">
        Voir la commande
    </x-mail::button>

    Merci,<br>
    {{ config('app.name') }}
</x-mail::message>
