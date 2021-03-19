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
                                <h4>Количество комнат</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <a href="{{ route('admin.addParam.room.create') }}" class="btn mb-1 btn-rounded btn-info">Добавить кол-во комнат</a>
                                    <tr>
                                        <th>#</th>
                                        <th>Кол-во комнат</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($rooms as $room)
                                    <tr>
                                        <th>{{ $room->id }}</th>
                                        <td>{{ $room->number_of_rooms }}</td>
                                        <td> <a href="{{ route('admin.addParam.room.edit', ['number_of_room'=>$room->id ]) }}" class="btn mb-1 btn-rounded btn-info">Редактировать</a> </td>

                                        <td>
                                            <form action="{{ route('admin.addParam.room.destroy', ['number_of_room'=>$room->id ])}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">Delete</button>
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
                    {{ $rooms->links() }}
                </div>
            </div>
        </div>
        <!-- #/ container -->
    </div>
@endsection
