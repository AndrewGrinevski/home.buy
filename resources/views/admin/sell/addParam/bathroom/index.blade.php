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
                                <h4>Тип балкона</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <a href="{{ route('admin.addParam.balcony.create') }}" class="btn mb-1 btn-rounded btn-info">Добавить тип балкона</a>
                                    <tr>
                                        <th>#</th>
                                        <th>Тип балкона</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($balconies as $balcony)
                                    <tr>
                                        <th>{{ $balcony->id }}</th>
                                        <td>{{ $balcony->type_of_balcony }}</td>
                                        <td> <a href="{{ route('admin.addParam.balcony.edit', ['balcony'=>$balcony->id ]) }}" class="btn mb-1 btn-rounded btn-info">Редактировать</a> </td>

                                        <td>
                                            <form action="{{ route('admin.addParam.balcony.destroy', ['balcony'=>$balcony->id ])}}" method="post">
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
