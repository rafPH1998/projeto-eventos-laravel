@extends('layouts.app')

@section('title', 'Criar Evento')

@section('content')

    <div id="event-create-container" class="col-md-6 offset-md-3">

        <a href="{{route('event.index')}}">
            <img src="/images/back.png" alt="back" title="Voltar">
        </a>
        
        <form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- chamando os alerts de succeso e erro para exibir no formulario --}}
            @include('includes-bootstrap.validations-form')
                    
            <div class="form-group">
                <label for="image">Imagem do Evento:</label><br/>
                <input type="file" id="image" name="image" class="from-control">
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                    Evento:
                </label>
                <input class="form-control @error('title') is-invalid @enderror shadow rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  name="title" type="text" placeholder="Nome do evento" value="{{ old('title')}}">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="city">
                    Cidade:
                </label>
                <input class="form-control @error('city') is-invalid @enderror shadow rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="city" placeholder="Local do evento" value="{{ old('city')}}">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="private">
                    O evento é privado?
                </label>
                <select  class="block w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" name="private">
                    <option value="0">Não</option>
                    <option value="1">Sim</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                    Descrição:
                </label>
                <textarea class="form-control @error('description') is-invalid @enderror shadow rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="description" value="{{ old('city')}}" placeholder="O que vai acontecer no evento?"></textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="items">
                    Adicione itens de infraestrutura:
                </label>
                <div class="form-group">	
                <input type="checkbox" name="items[]" value="Cadeiras"> Cadeiras
                </div>
                <div class="form-group">	
                <input type="checkbox" name="items[]" value="Palco"> Palco
                </div>
                <div class="form-group">	
                <input type="checkbox" name="items[]" value="Cerveja grátis"> Cerveja grátis
                </div>
                <div class="form-group">	
                <input type="checkbox" name="items[]" value="Open Food"> Open food
                </div>
                <div class="form-group">	
                <input type="checkbox" name="items[]" value="Brindes"> Brindes
                </div>
            </div>

            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
                Criar Evento
            </button>

        </form>
    </div>
@endsection