@extends('layouts.app')

@section('title', "Editar Evento de: {$event->title}")

@section('content')

    <div id="event-create-container" class="col-md-6 offset-md-3">
        <a href="{{route('event.index')}}">
            <img src="/images/back.png" alt="back" title="Voltar">
        </a>
        <h1>Edite o seu evento de: {{ $event->title }}</h1>
        
        <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            {{-- chamando os alerts de succeso e erro para exibir no formulario --}}
            @include('includes-bootstrap.validations-form')
                    
            <div class="form-group">
                <label for="image">Imagem do Evento:</label><br/>
                <input type="file" id="image" name="image" class="from-control"> 
                @if ($event->image) 
                    <img src="{{ url ("storage/{$event->image}")}}" alt="{{ $event->title }}" class="mt-2">
                @else
                    <img src="/images/event_placeholder.jpg" alt="{{ $event->title }}" class="mt-2 shadow-2xl p-md-2">
                @endif
            </div>

            <div class="form-group">
                <label for="title">Evento:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Nome do evento" value="{{$event->title}}">
            </div>
            <div class="form-group">
                <label for="title">Cidade:</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Local do evento" value="{{$event->city}}">
            </div>
            <div class="form-group">
                <label for="title">O evento é privado?</label>
                <select name="private" id="private" class="form-control">
                    <option value="0" {{ $event->private == 0 ? "selected='selected'" : '' }}>Não</option>
                    <option value="1" {{ $event->private == 1 ? "selected='selected'" : '' }}>Sim</option>
                </select>
            </div>
            <div class="form-group">
                <label for="title">Descrição:</label>
                <textarea name="description" id="description" class="form-control" placeholder="O que vai acontecer no evento?">{{$event->description}}</textarea>
            </div>
            <div class="form-group">
                <label for="title">Adicione itens de infraestrutura:</label>
                <div class="form-group">	
                  <input type="checkbox" name="items[]" value="Cadeiras" {{(in_array("Cadeiras", $event->items)) ? "checked='checked'" : ''}}> Cadeiras
                </div>
                <div class="form-group">	
                  <input type="checkbox" name="items[]" value="Palco" {{(in_array("Palco", $event->items)) ? "checked='checked'" : ''}}> Palco
                </div>
                <div class="form-group">	
                  <input type="checkbox" name="items[]" value="Cerveja grátis" {{(in_array("Cerveja grátis", $event->items)) ? "checked='checked'" : ''}}> Cerveja grátis
                </div>
                <div class="form-group">	
                  <input type="checkbox" name="items[]" value="Open Food" {{(in_array("Open Food", $event->items)) ? "checked='checked'" : ''}}> Open food
                </div>
                <div class="form-group">	
                  <input type="checkbox" name="items[]" value="Brindes" {{(in_array("Brindes", $event->items)) ? "checked='checked'" : ''}}> Brindes
                </div>
            </div>
            <input type="submit" class="btn btn-primary" value="Criar Evento">
        </form>
    </div>
@endsection