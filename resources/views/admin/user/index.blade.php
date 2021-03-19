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
                                <h4>Список пользователей</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Имя</th>
                                        <th>Email</th>
                                        <th>Дата добавления</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <th>{{$user->id}}</th>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->created_at}}</td>
                                        <td> <a href="{{ route('admin.showUsers.show', ['show_user'=>$user->id ]) }}" class="btn mb-1 btn-rounded btn-info">Просмотреть</a> </td>
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
                    {{ $users->links() }}
                </div>
            </div>
        </div>
        <!-- #/ container -->
    </div>
@endsection
