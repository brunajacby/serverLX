@extends('layouts.fo')

@section('content')
    <h1>Todas as tarefas</h1>

    <a href="{{ route('tasks.add') }}" class="btn btn-primary mb-3">Adicionar tarefa</a>

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Estado</th>
                <th scope="col">Data de conclusão</th>
                <th scope="col">Pessoa responsável</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <th scope="row">{{$task->id}}</th>
                    <td>{{$task->name}}</td>
                    <td>{{$task->status ? 'Concluída' : 'Por fazer'}}</td>
                    <td>{{$task->due_at}}</td>
                    <td>{{$task->user_name}}</td>
                    <td>
                        <a href="{{route('tasks.edit', $task->id)}}" class="btn btn-info">Ver</a>
                        <a href="{{route('tasks.delete', $task->id)}}" class="btn btn-danger">Apagar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection