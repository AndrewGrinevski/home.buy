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
                                <h4>Роли пользователей</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Пользователь</th>
                                        <th>Роль</th>
                                        <th>Email</th>
                                        <th>Дата добавления</th>
                                        <th>Дата изменения</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($userRoles as $userRole)
                                    <tr>
                                        <th>{{ $id+=1}}</th>
                                        <td>{{$userRole->name}}</td>
                                        <td>{{$userRole->role_name}}</td>
                                        <td>{{$userRole->email}}</td>
                                        <td>{{$userRole->created_at}}</td>
                                        <td class="color-primary">{{$userRole->updated_at}}</td>
                                        <td> <a href="{{ route('admin.addRole.edit', ['add_role'=>$userRole->user_id ]) }}" class="btn mb-1 btn-rounded btn-info">Редактировать</a> </td>
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
                    {{--{{ $userRoles->links() }}--}}
                </div>
            </div>
        </div>
        <!-- #/ container -->
    </div>
@endsection
