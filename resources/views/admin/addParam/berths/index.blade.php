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
                                <h4>Кол-во спальных мест</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <a href="{{ route('admin.addParam.berth.create') }}" class="btn mb-1 btn-rounded btn-info">Добавить кол-во спальных мест</a>
                                    <tr>
                                        <th>#</th>
                                        <th>Кол-во спальных мест</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($berths as $berth)
                                    <tr>
                                        <th>{{ $berth->id }}</th>
                                        <td>{{ $berth->number_of_berths }}</td>
                                        <td> <a href="{{ route('admin.addParam.berth.edit', ['berth'=>$berth->id ]) }}" class="btn mb-1 btn-rounded btn-info">Редактировать</a> </td>

                                        <td>
                                            <form action="{{ route('admin.addParam.berth.destroy', ['berth'=>$berth->id ])}}" method="post">
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
