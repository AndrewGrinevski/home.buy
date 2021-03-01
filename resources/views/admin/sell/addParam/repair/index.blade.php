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
                                <h4>Тип сан. узла</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <a href="{{ route('admin.addParam.bathroom.create') }}" class="btn mb-1 btn-rounded btn-info">Добавить тип сан. узла</a>
                                    <tr>
                                        <th>#</th>
                                        <th>Тип сан. узла</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($bathrooms as $bathroom)
                                    <tr>
                                        <th>{{ $bathroom->id }}</th>
                                        <td>{{ $bathroom->type_of_bathrooms}}</td>
                                        <td> <a href="{{ route('admin.addParam.bathroom.edit', ['bathroom'=>$bathroom->id ]) }}" class="btn mb-1 btn-rounded btn-info">Редактировать</a> </td>

                                        <td>
                                            <form action="{{ route('admin.addParam.bathroom.destroy', ['bathroom'=>$bathroom->id ])}}" method="post">
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
