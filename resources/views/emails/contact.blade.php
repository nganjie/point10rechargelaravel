<x-mail::message>
# Nouveau message de contact

Nouveau message envoyer avec les information :<br>
Nom : {{$message->nom}}<br>
Numero :{{$message->numero}}<br>
Email :{{$message->email}}<br>
Message : {{$message->content}}<br>
date :{{$message->created_at}}<br>

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
