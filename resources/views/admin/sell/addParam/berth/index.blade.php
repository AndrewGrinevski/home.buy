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
                                <h4>Кол-во отдельных комнат</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <a href="{{ route('admin.addParam.separatedRoom.create') }}" class="btn mb-1 btn-rounded btn-info">Добавить кол-во комнат</a>
                                    <tr>
                                        <th>#</th>
                                        <th>Кол-во отдельных комнат</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($separatedRooms as $separatedRoom)
                                    <tr>
                                        <th>{{ $separatedRoom->id }}</th>
                                        <td>{{ $separatedRoom->number_of_separated_rooms }}</td>
                                        <td> <a href="{{ route('admin.addParam.separatedRoom.edit', ['number_of_separated_room'=>$separatedRoom->id ]) }}" class="btn mb-1 btn-rounded btn-info">Редактировать</a> </td>

                                        <td>
                                            <form action="{{ route('admin.addParam.separatedRoom.destroy', ['number_of_separated_room'=>$separatedRoom->id ])}}" method="post">
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

            </div>
        </div>
        <!-- #/ container -->
    </div>
@endsection
