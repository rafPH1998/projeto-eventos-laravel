@extends('layouts.app')

@section('title', $event->title)

@section('content')

  <div class="col-md-10 offset-md-1">

    {{-- chamando os alerts de succeso e erro para exibir no formulario --}}
    <div class="mt-4">
      @include('includes-bootstrap.validations-form')
    </div>

    <div class="row">
      <div id="image-container" class="col-md-6">
        @if ($event->image) 
          <img src="{{ url ("storage/{$event->image}")}}" alt="{{ $event->title }}">
        @else
          <img id="img-default" src="/images/event_placeholder.jpg" alt="{{ $event->title }}">
        @endif
      </div>
      <div id="info-container" class="col-md-6">
        <h1>{{ $event->title }}</h1>
        <p class="event-city"><ion-icon name="location-outline"></ion-icon> {{ $event->city }}</p>
        @if (count($event->users) == 1)
          <p class="events-participants"><ion-icon name="people-outline"></ion-icon> {{ count($event->users)}} Participante</p>
        @elseif(count($event->users) > 1)
          <p class="events-participants"><ion-icon name="people-outline"></ion-icon> {{ count($event->users)}} Participantes</p>
        @endif
        <p class="event-owner"><ion-icon name="star-outline"></ion-icon> <strong>Dono do Evento</strong>({{ $event->user->name }})</p>

        <form action="{{route('events.confirm', $event->id)}}" method="POST">
          @csrf
          <a href="" class="btn btn-primary" id="event-submit" onclick="event.preventDefault(); this.closest('form').submit();">Confirmar participação</a>
        </form>

        @if (!empty($event->items))
          <h3 class="pb-3">O evento conta com:</h3>
          <ul id="items-list">
              @foreach ($event->items as $item)
                <li>
                  <ion-icon name="play-outline"></ion-icon> {{ $item }}
                </li>
              @endforeach
          </ul>
        @endif
      </div>
      <div class="col-md-12" id="description-container">
        <h3>Sobre o evento:</h3>
        <p class="event-description">{{ $event->description }}</p>
      </div>
    </div>
  </div>

@endsection
