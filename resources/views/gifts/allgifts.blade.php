@extends('layouts.fo')

@section('content')
    <h1>Prendas de Natal</h1>

    <a href="{{ route('gifts.add') }}" class="btn btn-primary mb-3">Adicionar prenda</a>

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Prenda</th>
                <th scope="col">Pessoa</th>
                <th scope="col">Valor previsto</th>
                <th scope="col">Valor gasto</th>
                <th scope="col">Diferença</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gifts as $gift)
                <tr>
                    <th scope="row">{{$gift->id}}</th>
                    <td>{{$gift->name}}</td>
                    <td>{{$gift->user_name}}</td>
                    <td>{{$gift->expected_value}} €</td>
                    <td>
                        @if ($gift->spent_value !== null)
                            {{$gift->spent_value}} €
                        @endif
                    </td>
                    <td>
                        @if ($gift->spent_value > $gift->expected_value)
                            <span class="text-danger">+{{$gift->spent_value - $gift->expected_value}} €</span>
                        @elseif ($gift->spent_value !== null && $gift->spent_value < $gift->expected_value)
                            <span class="text-success">{{$gift->spent_value - $gift->expected_value}} €</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('gifts.edit', $gift->id)}}" class="btn btn-info">Ver / Editar</a>
                        <a href="{{route('gifts.delete', $gift->id)}}" class="btn btn-danger">Apagar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
