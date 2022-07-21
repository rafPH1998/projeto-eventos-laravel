@extends('layouts.app')

@section('title', 'HDC Events')

@section('content')

<div id="search-container" class="col-md-12">
    <h1>Busque um evento</h1>
    <form action="#" method="GET">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
    </form>
</div>
<div id="events-container" class="col-md-12">
    @if($search)
        <h2>Buscando por: {{$search}}</h2>
    @endif

    <div id="cards-container" class="row">
        @foreach($events as $event)
            <div class="card col-md-3 shadow bg-white">
                @if ($event->image) 
                    <img src="{{ url ("storage/{$event->image}")}}" alt="{{ $event->title }}">
                @else
                    <img src="/images/event_placeholder.jpg" alt="{{ $event->title }}">
                @endif
                <div class="card-body">
                    <p class="card-date">Criado em: {{ $event->created_at }}</p>
                    <h5 class="card-title">{{ $event->title }}</h5>
                    @if (count($event->users) == 1)
                        <p class="events-participants"><ion-icon class="mr-1" name="people-outline"></ion-icon> {{ count($event->users)}} Participante</p>
                    @elseif(count($event->users) > 1)
                        <p class="events-participants"><ion-icon class="mr-1" name="people-outline"></ion-icon> {{ count($event->users)}} Participantes</p>
                    @else
                        <p class="events-participants"><ion-icon class="mr-1" name="people-outline"></ion-icon>Nenhum participante</p>
                    @endif
                    <a href="{{route('event.show', $event->id)}}" class="btn btn-primary mt-2">Saber mais</a>
                </div>
            </div>
        @endforeach
    </div>
    @if(count($events) == 0 && $search)
        <p>Não foi possível encontrar nenhum evento com {{ $search }}! <a href="{{route('event.index')}}">Ver todos</a></p>
    @elseif(count($events) == 0)
        <p>Não há eventos disponíveis!</p>
    @endif
</div>

@endsection
