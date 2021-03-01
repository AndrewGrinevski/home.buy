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
                                <h4>Тип стен здания</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <a href="{{ route('admin.addParam.wall.create') }}" class="btn mb-1 btn-rounded btn-info">Добавить тип стен</a>
                                    <tr>
                                        <th>#</th>
                                        <th>Тип стен</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($walls as $wall)
                                    <tr>
                                        <th>{{ $wall->id }}</th>
                                        <td>{{ $wall->type_of_walls}}</td>
                                        <td> <a href="{{ route('admin.addParam.wall.edit', ['wall'=>$wall->id ]) }}" class="btn mb-1 btn-rounded btn-info">Редактировать</a> </td>

                                        <td>
                                            <form action="{{ route('admin.addParam.wall.destroy', ['wall'=>$wall->id ])}}" method="post">
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

            </div>
        </div>
        <!-- #/ container -->
    </div>
@endsection
