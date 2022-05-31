@component('mail::message')
@component('mail::panel')
<h1>{{$evenement->intitule}}</h1>
@endcomponent

@component('mail::panel')
<p>Bonjour {{$name}}</p>
<p>Vous avez été convié à la reunion intitulée : {{$evenement->intitule}}</p>
<p>qui se tiendra le {{$evenement->date_evenement}}</p>
@component('mail::button', ['url' => route('reunions.space',['id' => $evenement->id]), 'color' => 'success'])
    Voir
@endcomponent
@endcomponent

{{ config('app.name') }}
@endcomponent
