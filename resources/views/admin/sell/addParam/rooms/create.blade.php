@extends('layouts.admin')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="#" method="POST">
                                    @csrf
                                    <h4 class="card-title">Параметры помещения</h4>
                                    <br>
                                    <div class="form-group">
                                        <label class="mb-1">Количество комнат</label>
                                        <input type="text" class="form-control input-flat" name="number_of_rooms">
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1">Кол-во отдельных комнат</label>
                                        <br>
                                        <input type="text" class="form-control input-flat" name="number_of_separated_rooms">
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1">Количество спальных мест(аренда квартиры на сутки)</label>
                                        <br>
                                        <input type="text" class="form-control input-flat" name="number_of_berths">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label class="mb-1">Тип балкона</label>
                                        <br>
                                        <input type="text" class="form-control input-flat" name="type_of_balcony">
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1">Тип сан. узла</label>
                                        <br>
                                        <input type="text" class="form-control input-flat" name="type_of_bathrooms">
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1">Тип ремонта</label>
                                        <br>
                                        <input type="text" class="form-control input-flat" name="type_of_repairs">
                                    </div>
                                    <br>
                                    <h4 class="card-title">Параметры здания</h4>
                                    <br>
                                    <div class="form-group">
                                        <label class="mb-1">Тип стен</label>
                                        <br>
                                        <input type="text" class="form-control input-flat" name="type_of_walls">
                                    </div>
                                    <br>
                                    <h4 class="card-title">Цена и условия сделки</h4>
                                    <br>
                                    <div class="form-group">
                                        <label class="mb-1">Условия сделки</label>
                                        <br>
                                        <input type="text" class="form-control input-flat" name="type_of_transaction">
                                    </div>
                                    <br>
                                    <button type="submit" class="btn mb-1 btn-rounded btn-info"> Создать </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
