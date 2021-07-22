@php
 $event = $details['event'];
@endphp

<!DOCTYPE html>
<html>
    <head>
        <title>CritiCalendar</title>
    </head>
    <body>
    <p>
        Une nouvelle session a été planifiée par <b>{{ $event->campaign->owner->name }}</b> pour la campagne <b>"{{ $event->campaign->name }}"</b>.
    </p>
    <p>
        <b>Détails de la campagne : </b> {{ $event->campaign->description }}
    </p>
    <p>
        <b>Détails de la session : </b><br>
        <b>Titre : </b> {{ $event->title }}
        <b>Date : </b> {{ $event->start }}
        <b>Lieu : </b> {{ $event->place }}
        @if(empty($event->URL))
            <b>Lien url : </b> {{ $event->URL }}
        @endif 

    </p>
    <p>
        Connectez-vous pour voir la session plus en détail.
    </p>
    <p>
        L'équipe CritiCalendar
    </p>
    </body>
</html>
