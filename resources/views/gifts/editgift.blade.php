@extends('layouts.fo')

@section('content')
    <h6>Detalhes da prenda {{ $giftInfo->name }}</h6>

    <form method="POST" action="{{ route('gifts.update') }}">
        @csrf

        <input type="hidden" name="id" value="{{ $giftInfo->id }}">

        @method('PUT')
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nome da prenda</label>
            <input value="{{ $giftInfo->name }}" required type="text" name="name" class="form-control"
                id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        @error('name')
            <p>Nome inválido</p>
        @enderror
        <div class="mb-3">
            <label for="exampleInputEmail2" class="form-label">Valor previsto</label>
            <input value="{{ $giftInfo->expected_value }}" required type="text" name="expected_value" class="form-control"
                id="exampleInputEmail2" aria-describedby="emailHelp">
        </div>
        @error('expected_value')
            <p>Valor previsto inválido</p>
        @enderror
        <div class="mb-3">
            <label for="exampleInputEmail3" class="form-label">Valor gasto</label>
            <input value="{{ $giftInfo->spent_value }}" type="text" name="spent_value" class="form-control"
                id="exampleInputEmail3" aria-describedby="emailHelp">
        </div>
        @error('spent_value')
            <p>Valor gasto inválido</p>
        @enderror
        <select name="user_id" class="form-select" aria-label="Default select example">
            @foreach ($users as $user)
                <option value="{{ $user->id }}" @if ($user->id == $giftInfo->user_id) selected @endif>{{ $user->name }}</option>
            @endforeach
        </select>
        @error('user_id')
            <p>Pessoa inválida</p>
        @enderror

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection