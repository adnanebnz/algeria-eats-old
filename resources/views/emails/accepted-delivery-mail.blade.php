<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body style="background-color: #f0f4f8; font-family: sans-serif;">
    <div
        style="margin: 0 auto; max-width: 32rem; background-color: #fff; padding: 2rem; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        <h1 style="margin-bottom: 1rem; font-size: 1.5rem; font-weight: bold;">Acceptation de la livraison
        </h1>

        <p style="margin-bottom: 1.5rem;">Bonjour {{ $delivery->order->artisan->getFullName() }},</p>

        <p style="margin-bottom: 1.5rem;">Votre livraison a était accepté</p>
        <a href="{{ route('artisan.deliveries.show', $delivery) }}"
            style="display: inline-block; background-color: #1a202c; color: #fff; padding: 0.5rem 1rem; text-decoration: none; border-radius: 0.25rem;">Voir
            la livraison</a>
    </div>
</body>

</html>
