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
                                    <a href="{{ route('admin.addParam.create') }}" class="btn mb-1 btn-rounded btn-info">Добавить недвижимость</a>
                                    <tr>
                                        <th>#</th>
                                        <th>Город</th>
                                        <th>Адрес</th>
                                        <th>Кол-во комнат</th>
                                        <th>Стоимость</th>
                                        <th>Дата добавления</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th>2</th>
                                        <td>3</td>
                                        <td>4</td>
                                        <td>5</td>
                                        <td class="color-primary">6</td>
                                        <td class="color-primary">7</td>
                                        <td> <a href="#" class="btn mb-1 btn-rounded btn-info">Редактировать</a> </td>
                                    </tr>
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
