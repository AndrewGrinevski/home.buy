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
                                <h4>Населенный пункт</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <a href="{{ route('admin.addParam.town.create') }}" class="btn mb-1 btn-rounded btn-info">Добавить Н.п.</a>
                                    <tr>
                                        <th>#</th>
                                        <th>Город</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($towns as $town)
                                    <tr>
                                        <th>{{ $town->id }}</th>
                                        <td>{{ $town->town }}</td>
                                        <td> <a href="{{ route('admin.addParam.town.edit', ['town'=>$town->id ]) }}" class="btn mb-1 btn-rounded btn-info">Редактировать</a> </td>

                                        <td>
                                            <form action="{{ route('admin.addParam.town.destroy', ['town'=>$town->id ])}}" method="post">
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
                        {{ $towns->links() }}
                    </div>
                    <!-- /# card -->
                </div>

            </div>
        </div>
        <!-- #/ container -->
    </div>
@endsection
