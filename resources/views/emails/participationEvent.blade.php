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
        <b>Titre : </b> {{ $event->title }}<br>
        <b>Date : </b> {{ $event->start }}<br>
        <b>Lieu : </b> {{ $event->place }}<br>
        @if(empty($event->URL))
            <b>Lien url : </b> <a href="{{ $event->URL }}">{{ $event->URL }}</a><br>
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
