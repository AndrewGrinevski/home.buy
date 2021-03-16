@extends('layouts.main')
@section('content')
    <form action="{{ route('profile.update', ['id'=>$user->id ]) }}" method="POST">
        @csrf
    <h4 class="card-title">Контактная информация</h4>
    <label class="mb-1">(Можно изменить в личном кабинете)</label>
    <br>
    <div class="form-group">
        <label class="mb-1">Имя контактного лица</label>
        <br>
        <input type="text" class="form-control input-flat" name="name" value="{{ $user->name }}">
    </div>
    <div class="form-group">
        <label class="mb-1">Мобильный телефон</label>
        <br>
        <input type="text" class="form-control input-flat" name="phone" value="{{ $user->phone }}">
    </div>
    <button type="submit" class="btn mb-1 btn-rounded btn-danger"> Изменить </button>
    <a href="{{ route('home', ['id' =>auth()->id()]) }}" class="btn mb-1 btn-rounded btn-info">Назад</a>
    </form>
@endsection
