<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Vous avez une nouvelle commande</title>
</head>

<body style="background-color: #f0f4f8; font-family: sans-serif;">
    <div
        style="margin: 0 auto; max-width: 32rem; background-color: #fff; padding: 2rem; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        <h1 style="margin-bottom: 1rem; font-size: 1.5rem; font-weight: bold;">Vous avez une nouvelle commande</h1>

        <p style="margin-bottom: 1.5rem;">Bonjour {{ $order->artisan->getFullName() }},</p>

        <p style="margin-bottom: 1.5rem;">Vous avez une nouvelle commande:</p>

        <table style="margin-bottom: 1.5rem; width: 100%; border-collapse: collapse;">
            <thead style="border: 1px solid #000;">
                <tr>
                    <th style="border: 1px solid #000; padding: 0.5rem;">Produit</th>
                    <th style="border: 1px solid #000; padding: 0.5rem;">Quantité</th>
                    <th style="border: 1px solid #000; padding: 0.5rem;">Prix Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->orderItems as $item)
                    <tr>
                        <td style="border: 1px solid #000; padding: 0.5rem;">{{ $item->product->nom }}</td>
                        <td style="border: 1px solid #000; padding: 0.5rem;">{{ $item->quantity }}</td>
                        <td style="border: 1px solid #000; padding: 0.5rem;">{{ $order->getTotalPrice() }} DA</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <p style="margin-bottom: 1rem; font-size: 1.125rem; font-weight: bold;">Montant total:
            {{ $order->getTotalPrice() }} DA</p>
        <p>Cordialement,</p>
        <p>Algeria Eats</p>
    </div>
</body>

</html>
