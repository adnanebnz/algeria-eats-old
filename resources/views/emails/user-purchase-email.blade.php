<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Facture de votre commande</title>
</head>

<body style="background-color: #f0f4f8; font-family: sans-serif;">
    <div
        style="margin: 0 auto; max-width: 32rem; background-color: #fff; padding: 2rem; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        <h1 style="margin-bottom: 1rem; font-size: 1.5rem; font-weight: bold;">Facture de votre commande</h1>

        <p style="margin-bottom: 1.5rem;">Bonjour {{ $order->buyer->getFullName() }},</p>

        <p style="margin-bottom: 1.5rem;">Nous vous remercions pour votre commande. Voici les détails de votre facture :
        </p>

        <table style="margin-bottom: 1.5rem; width: 100%; border-collapse: collapse;">
            <thead style="border: 1px solid #000;">
                <tr>
                    <th style="border: 1px solid #000; padding: 0.5rem;">Produit</th>
                    <th style="border: 1px solid #000; padding: 0.5rem;">Quantité</th>
                    <th style="border: 1px solid #000; padding: 0.5rem;">Prix unitaire</th>
                    <th style="border: 1px solid #000; padding: 0.5rem;">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->orderItems as $item)
                    <tr>
                        <td style="border: 1px solid #000; padding: 0.5rem;">{{ $item->title }}</td>
                        <td style="border: 1px solid #000; padding: 0.5rem;">{{ $item->quantity }}</td>
                        <td style="border: 1px solid #000; padding: 0.5rem;">{{ $item->product->prix }} DA</td>
                        <td style="border: 1px solid #000; padding: 0.5rem;">
                            {{ $item->quantity * $item->product->prix }} DA</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <p style="margin-bottom: 1rem; font-size: 1.125rem; font-weight: bold;">Montant total:
            {{ $order->getTotalPrice() }} DA</p>

        <p style="margin-bottom: 1.5rem;">Vous pouvez régler cette facture dans les 7 jours suivant la date d'émission.
        </p>

        <p style="margin-bottom: 1.5rem;">Merci encore pour votre achat.</p>

        <p>Cordialement,</p>
        <p>Algeria Eats</p>
    </div>
</body>

</html>
