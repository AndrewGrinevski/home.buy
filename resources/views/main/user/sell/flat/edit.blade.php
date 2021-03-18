@extends('layouts.main')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('home.addSellFlat.update', ['sell'=>$sellRoom->id ]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <h4 class="card-title">Местоположение</h4>
                                    <br>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control input-default" name="location" id="location" value="{{ $sellRoom->location }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1">Город</label>
                                        <select class="livesearch form-control" name="town_id"></select>
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1">Адрес</label>
                                        <input type="text" class="form-control input-flat"  name="address" value="{{ $sellRoom->address }}">
                                        @error('address')
                                        <br>
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <h4 class="card-title">Параметры помещения</h4>
                                    <br>
                                    <div class="form-group">
                                        <label class="mb-1">Количество комнат</label>
                                        <select class="form-control" name="number_of_rooms_id">
                                            @foreach($rooms as $room)
                                                <option value="{{ $room->id }}"
                                                        @if($room->id == $sellRoom->number_of_rooms_id) selected @endif>
                                                    {{ $room->number_of_rooms }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1">Кол-во отдельных комнат</label>
                                        <br>
                                        <label class="mb-1">(Не обязательно)</label>
                                        <select class="form-control" name="number_of_separated_rooms_id">
                                            <option value=""></option>
                                            @foreach($separatedRooms as $separatedRoom)
                                                <option value="{{ $separatedRoom->id }}"
                                                        @if($separatedRoom->id == $sellRoom->number_of_separated_rooms_id) selected @endif>
                                                    {{ $separatedRoom->number_of_separated_rooms }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mx-sm-3 mb-2 form-inline">
                                        <label class="mb-1">Площадь, м2</label>
                                        <input type="number" class="form-control form-inline" placeholder="Общаяя" name="total_area" value="{{ $sellRoom->total_area }}">
                                        @error('total_area')
                                        <br>
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <input type="number" class="form-control form-inline" placeholder="Жилая" name="living_area" value="{{ $sellRoom->living_area }}">
                                        @error('living_area')
                                        <br>
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <input type="number" class="form-control form-inline" placeholder="Кухня" name="kitchen_area" value="{{ $sellRoom->kitchen_area }}">
                                        @error('kitchen_area')
                                        <br>
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mx-sm-3 mb-2 form-inline">
                                        <label class="mb-1">Этаж</label>
                                        <input type="number" class="form-control form-inline" placeholder="3" name="floor" value="{{ $sellRoom->floor }}">
                                        @error('floor')
                                        <br>
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <label class="mb-1">из</label>
                                        <input type="number" class="form-control form-inline" placeholder="9" name="total_floors" value="{{ $sellRoom->total_floors }}">
                                        @error('total_floors')
                                        <br>
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1">Балкон</label>
                                        <br>
                                        <select class="form-control" name="balcony_id">
                                            @foreach($balconies as $balcony)
                                                <option value="{{ $balcony->id }}"
                                                        @if($balcony->id == $sellRoom->balcony_id) selected @endif>
                                                    {{ $balcony->type_of_balcony }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1">Сан. узел</label>
                                        <br>
                                        <select class="form-control" name="bathroom_id">
                                            @foreach($bathrooms as $bathroom)
                                                <option value="{{ $bathroom->id }}"
                                                        @if($bathroom->id == $sellRoom->bathroom_id) selected @endif>
                                                    {{ $bathroom->type_of_bathrooms }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1">Ремонт</label>
                                        <br>
                                        <select class="form-control" name="apartment_renovation_id">
                                            @foreach($repairs as $repair)
                                                <option value="{{ $repair->id }}"
                                                        @if($repair->id == $sellRoom->apartment_renovation_id) selected @endif>
                                                    {{ $repair->type_of_repairs }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <br>
                                    <h4 class="card-title">Параметры здания</h4>
                                    <br>
                                    <div class="form-group">
                                        <label class="mb-1">Тип стен</label>
                                        <br>
                                        <label class="mb-1">(Не обязательно)</label>
                                        <select class="form-control" name="type_of_walls_id">
                                            <option value=""></option>
                                            @foreach($walls as $wall)
                                                <option value="{{ $wall->id }}"
                                                        @if($wall->id == $sellRoom->type_of_walls_id) selected @endif>
                                                    {{ $wall->type_of_walls }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1">Год постройки</label>
                                        <br>
                                        <label class="mb-1">(Не обязательно)</label>
                                        <input type="number" class="form-control input-flat" name="year_of_construction" value="{{ $sellRoom->year_of_construction }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1">Год кап. ремонта</label>
                                        <br>
                                        <label class="mb-1">(Не обязательно)</label>
                                        <input type="number" class="form-control input-flat" name="year_of_overhaul" value="{{ $sellRoom->year_of_overhaul }}">
                                    </div>
                                    <br>
                                    <h4 class="card-title">Фотографии</h4>
                                    <br>
                                    <div class="form-group">
                                        <input type="file" name="images[]" multiple class="btn btn-default btn-file">
                                    </div>
                                    <br>
                                    <h4 class="card-title">Описание объекта</h4>
                                    <div class="form-group">
                                        <textarea class="form-control h-150px" rows="6" id="comment" name="description" >{{ $sellRoom->description }}</textarea>
                                        @error('description')
                                        <br>
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1">Видео</label>
                                        <br>
                                        <label class="mb-1">(Не обязательно)</label>
                                        <input type="text" class="form-control input-flat" placeholder="Ссылка на видео в Youtube" name="youtube_video" value="{{ $sellRoom->youtube_video }}">
                                    </div>
                                    <br>
                                    <h4 class="card-title">Цена и условия сделки</h4>
                                    <br>
                                    <div class="form-group">
                                        <label class="mb-1">Общая цена</label>
                                        <input type="number" class="form-control input-flat" name="price" value="{{ $sellRoom->price }}">
                                        @error('price')
                                        <br>
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1">Условия сделки</label>
                                        <br>
                                        <label class="mb-1">(Не обязательно)</label>
                                        <select class="form-control" name="terms_of_a_transaction_id">
                                            <option value=""></option>
                                            @foreach($transactions as $transaction)
                                                <option value="{{ $transaction->id }}"
                                                        @if($transaction->id == $sellRoom->terms_of_a_transaction_id) selected @endif>
                                                    {{ $transaction->type_of_transaction }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <br>
                                    <h4 class="card-title">Контактная информация</h4>
                                    <label class="mb-1">(Можно изменить в личном кабинете)</label>
                                    <br>
                                    <div class="form-group">
                                        <label class="mb-1">Имя контактного лица</label>
                                        <br>
                                        <input type="text" class="form-control input-flat" name="name" value="{{ $user->name }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1">Мобильный телефон</label>
                                        <br>
                                        <input type="text" class="form-control input-flat" name="phone" value="{{ $user->phone }}" disabled>
                                    </div>
                                    @if(!($sellRoom->is_fixed))
                                        <br>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1"
                                                   name="is_fixed">
                                            <label class="form-check-label">
                                                Отредактировано
                                            </label>
                                        </div>
                                        <br>
                                        <br>
                                        <br>
                                    @endif
                                    <button type="submit" class="btn mb-1 btn-rounded btn-danger"> Изменить </button>
                                    <a href="{{ route('home', ['id' =>auth()->id()]) }}" class="btn mb-1 btn-rounded btn-info">Назад</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('.livesearch').select2({
            placeholder: 'Выберите город',
            ajax: {
                url: '/ajax-autocomplete-search',
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.town,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });
    </script>
@endsection
