@extends('layouts.app')

@section('title', 'Meus eventos')

@section('content')

    <div class="col-md-10 offset-md-1">
        @if(count($user->events) > 0)

            <form action="" method="GET" class="py-5">
                <input type="text" name="search" placeholder="Pesquisar meus eventos" class="md:w-1/6 bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500">
                <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">Pesquisar</button>
            </form>

            @include('includes-bootstrap.validations-form')
            
            <table class="min-w-full leading-normal shadow-md rounded-lg overflow-hidden mt-4">
                <thead>
                    <tr>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            #
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Título
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Cidade
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Participantes
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Criado em
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Privado
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Editar
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Excluír
                        </th>
                    </tr>
                </thead>
                <tbody>
                @foreach($user->events as $users)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $users->id }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $users->title }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $users->city }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">0</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $users->created_at }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $users->private === 0 ? 'Sim' : 'Não'}}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <a href="{{route('events.edit', $users->id)}}" class="bg-green-200 rounded-full py-2 px-3 hover:bg-green-300"><ion-icon name="create-outline"></ion-icon></a> 
                            </td>
                           <td>
                                <form action="{{route('events.delete', $users->id)}}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button onclick="return confirm('Tem certeza que deseja sair do evento?')" class="bg-red-200 rounded-full py-2 px-3 hover:bg-red-300">
                                        <ion-icon name="trash-outline"></ion-icon>
                                    </button>
                                </form>
                           </td>
                        </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p>Você ainda não tem eventos, <a href="{{ route('event.create') }}">Criar evento</a></p>
        @endif
        
    </div>
@endsection




