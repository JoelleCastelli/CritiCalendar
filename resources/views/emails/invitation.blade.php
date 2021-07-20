@php
 $campaign = $details['campaign'];
@endphp

<!DOCTYPE html>
<html>
    <head>
        <title>CritiCalendar</title>
    </head>
    <body>
    <p>
        Vous avez été invité(e) par <b>{{ $campaign->owner->name }}</b> à rejoindre la campagne <b>"{{ $campaign->name }}"</b>.
    </p>
    <p>
        <b>Détails de la campagne :</b> {{ $campaign->description }}
    </p>
    <p>
        Connectez-vous pour voir vos invitations.
    </p>
    <p>
        L'équipe CritiCalendar
    </p>
    </body>
</html>
