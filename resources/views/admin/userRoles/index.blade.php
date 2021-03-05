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
                                <h4>Список недвижимости</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <a href="{{ route('admin.addRole.create') }}" class="btn mb-1 btn-rounded btn-info">Добавить недвижимость</a>
                                    <tr>
                                        <th>#</th>
                                        <th>Пользователь</th>
                                        <th>Роль</th>
                                        <th>Дата добавления</th>
                                        <th>Дата изменения</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($userRoles as $userRole)
                                    <tr>
                                        <th>{{$userRole->id}}</th>
                                        <td>{{$userRole->user_id}}</td>
                                        <td>{{$userRole->role_id}}</td>
                                        <td>{{$userRole->created_at}}</td>
                                        <td class="color-primary">{{$userRole->updated_at}}</td>
                                        <td> <a href="{{ route('admin.addRole.edit', ['add_role'=>$userRole->id ]) }}" class="btn mb-1 btn-rounded btn-info">Редактировать</a> </td>
                                        <td>
                                            <form action="{{ route('admin.addRole.destroy', ['add_role'=>$userRole->id ])}}" method="post">
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
                <div>
                    {{ $userRoles->links() }}
                </div>
            </div>
        </div>
        <!-- #/ container -->
    </div>
@endsection
