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
                                <h2>Продажа</h2>
                                <br>
                                <h3>Продажа квартиры</h3>
                            </div>
                            @if($sellFlats->count())
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                        <br>
                                        <br>
                                        <tr>
                                            <th>#</th>
                                            <th>Пользователь</th>
                                            <th>Город</th>
                                            <th>Адрес</th>
                                            <th>Кол-во комнат</th>
                                            <th>Стоимость</th>
                                            <th>Дата добавления</th>
                                            <th>Дата редактирования</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($sellFlats as $flat)
                                            <tr>
                                                <th>{{ $a+=1 }}</th>
                                                <td>{{ $flat->user->name }}</td>
                                                <td>{{ $flat->town->town }}</td>
                                                <td>{{ $flat->address }}</td>
                                                <td>{{ $flat->room->number_of_rooms }}</td>
                                                <td class="color-primary">${{ $flat->price }}</td>
                                                <td class="color-primary">{{ $flat->created_at }}</td>
                                                <td class="color-primary">{{ $flat->updated_at }}</td>
                                                <td> <a href="{{ route('main.allFlats.show', ['slug'=>$flat->slug ]) }}" class="btn mb-1 btn-rounded btn-info">Посмотреть</a></td>
                                                <td>
                                                    <form action="{{ route('admin.showUsers.destroy', ['show_user'=>$flat->id ])}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" type="submit">Удалить</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @else
                                            <h5>Ничего не найдено...</h5>
                                        @endif
                                        </tbody>
                                    </table>
                                    <h2>Аренда</h2>
                                    <br>
                                    <h3>Аренда квартиры на сутки</h3>
                                    @if($rentFlatsPerDay->count())
                                        <table class="table table-hover">
                                            <thead>
                                            <br>
                                            <br>
                                            <tr>
                                                <th>#</th>
                                                <th>Пользователь</th>
                                                <th>Город</th>
                                                <th>Адрес</th>
                                                <th>Кол-во комнат</th>
                                                <th>Цена на сутки</th>
                                                <th>Дата добавления</th>
                                                <th>Дата редактирования</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($rentFlatsPerDay as $flat)
                                                <tr>
                                                    <th>{{ $b+=1 }}</th>
                                                    <td>{{ $flat->user->name }}</td>
                                                    <td>{{ $flat->town->town }}</td>
                                                    <td>{{ $flat->address }}</td>
                                                    <td>{{ $flat->room->number_of_rooms }}</td>
                                                    <td class="color-primary">${{ $flat->rent_per_day }}</td>
                                                    <td class="color-primary">{{ $flat->created_at }}</td>
                                                    <td class="color-primary">{{ $flat->updated_at }}</td>
                                                    <td> <a href="{{ route('main.allRentApartments.show', ['slug'=>$flat->slug ]) }}" class="btn mb-1 btn-rounded btn-info">Посмотреть</a> </td>
                                                    @if($flat->is_fixed)
                                                        <td> <button disabled class="btn btn-warning">Исправлено</button> </td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                            @else
                                                <h5>Ничего не найдено...</h5>
                                            @endif
                                            </tbody>
                                        </table>
                                        <h3>Аренда квартиры</h3>
                                        @if($rentFlats->count())
                                            <table class="table table-hover">
                                                <thead>
                                                <br>
                                                <br>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Пользователь</th>
                                                    <th>Город</th>
                                                    <th>Адрес</th>
                                                    <th>Кол-во комнат</th>
                                                    <th>Стоимость аренды в месяц</th>
                                                    <th>Дата добавления</th>
                                                    <th>Дата редактирования</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($rentFlats as $flat)
                                                    <tr>
                                                        <th>{{ $c+=1 }}</th>
                                                        <td>{{ $flat->user->name }}</td>
                                                        <td>{{ $flat->town->town }}</td>
                                                        <td>{{ $flat->address }}</td>
                                                        <td>{{ $flat->room->number_of_rooms }}</td>
                                                        <td class="color-primary">${{ $flat->rent_per_month }}</td>
                                                        <td class="color-primary">{{ $flat->created_at }}</td>
                                                        <td class="color-primary">{{ $flat->updated_at }}</td>
                                                        <td> <a href="{{ route('main.allRentFlats.show', ['slug'=>$flat->slug ]) }}" class="btn mb-1 btn-rounded btn-info">Посмотреть</a> </td>
                                                        @if($flat->is_fixed)
                                                            <td> <button disabled class="btn btn-warning">Исправлено</button> </td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                                @else
                                                    <h5>Ничего не найдено...</h5>
                                                @endif
                                                </tbody>
                                            </table>
                                </div>
                        </div>
                    </div>
                    <!-- /# card -->
                </div>
                <div>
                </div>
            </div>
        </div>
        <!-- #/ container -->
    </div>
@endsection

