@extends('layouts.fo')

@section('content')
    <h1>Adicionar prenda</h1>
    <form method="POST" action="{{route('gifts.store')}}">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nome da prenda</label>
            <input required type="text" name="name" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
        </div>
        @error('name')
            <p>Nome inválido</p>
        @enderror
        <div class="mb-3">
            <label for="exampleInputEmail2" class="form-label">Valor previsto
            </label>
            <input required type="text" name="expected_value" class="form-control" id="exampleInputEmail2"
                aria-describedby="emailHelp">
        </div>
        @error('expected_value')
            <p>Valor previsto inválido</p>
        @enderror
        <div class="mb-3">
            <label for="exampleInputEmail3" class="form-label">Valor gasto
            </label>
            <input type="text" name="spent_value" class="form-control" id="exampleInputEmail3"
                aria-describedby="emailHelp">
        </div>
        @error('spent_value')
            <p>Valor gasto inválido</p>
        @enderror
        <select name="user_id" class="form-select" aria-label="Default select example">
            <option selected>Open this select menu</option>
            @foreach ($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach


        </select>
        @error('user_id')
            <p>Pessoa inválida</p>
        @enderror


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
