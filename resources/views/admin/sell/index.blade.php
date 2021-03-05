@extends('layouts.admin')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">

                <!-- /# column -->
                <div class="col-lg-77">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h4>Список недвижимости</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <a href="{{ route('admin.sellFlats.create') }}" class="btn mb-1 btn-rounded btn-info">Добавить недвижимость</a>
                                    <tr>
                                        <th>#</th>
                                        <th>Город</th>
                                        <th>Адрес</th>
                                        <th>Кол-во комнат</th>
                                        <th>email пользователя</th>
                                        <th>Стоимость</th>
                                        <th>Дата добавления</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($flats as $flat)
                                    <tr>
                                        <th>{{$flat->id}}</th>
                                        <td>{{$flat->town}}</td>
                                        <td>{{$flat->address}}</td>
                                        <td>{{$flat->room->number_of_rooms}}</td>
                                        <td>{{$flat->user->email}}</td>
                                        <td class="color-primary">${{$flat->price}}</td>
                                        <td class="color-primary">{{$flat->created_at}}</td>
                                        <td> <a href="{{ route('admin.sellFlats.edit', ['flat'=>$flat->id ]) }}" class="btn mb-1 btn-rounded btn-info">Редактировать</a> </td>
                                        <td>
                                            <form action="{{ route('admin.sellFlats.destroy', ['flat'=>$flat->id ])}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">Удалить</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    <!-- /# card -->
                </div>
                <div>
                    {{ $flats->links() }}
                </div>
            </div>
        </div>
        <!-- #/ container -->
    </div>
@endsection
