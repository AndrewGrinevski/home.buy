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
                                <h4>Тип ремонта</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <a href="{{ route('admin.addParam.repair.create') }}" class="btn mb-1 btn-rounded btn-info">Добавить тип ремонта</a>
                                    <tr>
                                        <th>#</th>
                                        <th>Тип ремонта</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($repairs as $repair)
                                    <tr>
                                        <th>{{ $repair->id }}</th>
                                        <td>{{ $repair->type_of_repairs}}</td>
                                        <td> <a href="{{ route('admin.addParam.repair.edit', ['repair'=>$repair->id ]) }}" class="btn mb-1 btn-rounded btn-info">Редактировать</a> </td>

                                        <td>
                                            <form action="{{ route('admin.addParam.repair.destroy', ['repair'=>$repair->id ])}}" method="post">
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
