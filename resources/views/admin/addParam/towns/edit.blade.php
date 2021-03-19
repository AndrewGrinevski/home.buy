@extends('layouts.admin')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('admin.addParam.town.update', ['town'=>$town->id]) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label class="mb-1">Населенный пункт</label>
                                        <input type="text" class="form-control input-flat" name="town" value="{{$town->town}}">
                                    </div>
                                    <button type="submit" class="btn mb-1 btn-rounded btn-info"> Сохранить </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
