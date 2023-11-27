<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Facture de votre commande</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans">
    <div class="mx-auto max-w-2xl bg-white p-8 shadow-md">
        <h1 class="mb-4 text-2xl font-bold">Facture de votre commande</h1>

        <p class="mb-6">Bonjour {{ $order->consumer->getFullName() }},</p>

        <p class="mb-6">Nous vous remercions pour votre commande. Voici les détails de votre facture :</p>

        {{-- Display invoice details --}}
        <table class="mb-6 w-full table-auto">
            <thead class="border border-solid border-black dark:border-white">
                <tr>
                    <th class="border border-solid border-black px-4 py-2 dark:border-white">Produit</th>
                    <th class="border border-solid border-black px-4 py-2 dark:border-white">Quantité</th>
                    <th class="border border-solid border-black px-4 py-2 dark:border-white">Prix unitaire</th>
                    <th class="border border-solid border-black px-4 py-2 dark:border-white">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoice->items->all() as $item)
                    <tr>
                        <td class="border border-solid border-black px-4 py-2 dark:border-white">{{ $item->title }}
                        </td>
                        <td class="border border-solid border-black px-4 py-2 dark:border-white">{{ $item->quantity }}
                        </td>
                        <td class="border border-solid border-black px-4 py-2 dark:border-white">
                            {{ $item->price_per_unit }}</td>
                        <td class="border border-solid border-black px-4 py-2 dark:border-white">
                            {{ $item->sub_total_price }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <p class="mb-4 text-lg font-bold">Montant total: {{ $invoice->total_amount }}</p>

        <p class="mb-6">Vous pouvez régler cette facture dans les 7 jours suivant la date d'émission.</p>

        <p class="mb-6">Merci encore pour votre achat.</p>

        <p>Cordialement,</p>
        <p>{{ $order->artisan->getFullName() }}</p>
    </div>
</body>

</html>
