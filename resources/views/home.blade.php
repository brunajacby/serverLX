@extends('layouts.fo')

@section('content')
   <img class="foto-cachorro" src="{{ asset('images/dog.jpg') }}" alt="Cachorrinho">

    {{-- @if (isset($courseName))
        <h5>Olá {{ $courseName }}</h5>
    @else
        <h5>Olá user</h5>
    @endif --}}

    <h5>Olá {{ isset($courseName) ? $courseName : 'user' }}</h5>
    <h6>O contacto é o {{$contactInfo['name']}} - {{$contactInfo['contact']}}</h6>
    <h5>{{$cesaeInfo['name']}} - {{$cesaeInfo['address']}} - {{$cesaeInfo['email']}}</h5>

    <h1>Funcionalidades da nossa app</h1>

    <ul>
        <li><a href="{{route('welcome')}}">Welcome Page</a></li>
        <li><a href="{{route('users.all')}}">Utilizadores</a></li>
        <li><a href="{{route('users.add')}}">Adicionar Utilizador</a></li>
        <li><a href="{{route('tasks.all')}}">Todas as tarefas</a></li>
        <li><a href="{{route('gifts.all')}}">Todas as prendas</a></li>
    </ul>

    <h5>Alunos da turma</h5>
    <ul>
        @if (isset($students))
            @foreach ($students as $student)
                <li>{{ $student }}</li>
            @endforeach
        @endif
    </ul>
@endsection