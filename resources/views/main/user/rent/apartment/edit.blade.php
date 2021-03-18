@extends('layouts.main')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('home.addRentApartment.update', ['rent'=>$sellRoom->id ]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <h4 class="card-title">Местоположение</h4>
                                    <br>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control input-default" name="location" id="location">
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
                                        <label class="mb-1">Кол-во спальных мест</label>
                                        <select class="form-control" name="number_of_berths_id">
                                            @foreach($berths as $berth)
                                                <option value="{{ $berth->id }}"
                                                        @if($berth->id == $sellRoom->number_of_berths_id) selected @endif>
                                                    {{ $berth->number_of_berths }}</option>
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
                                    <br>
                                    <h4 class="card-title">Дополнительные опции</h4>
                                    <br>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1"
                                               name="fridge" {{$sellRoom->fridge?'checked':''}}>
                                        <label class="form-check-label">
                                            Холодильник
                                        </label>
                                    </div>
                                    <br>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1"
                                               name="elevator" {{$sellRoom->elevator?'checked':''}}>
                                        <label class="form-check-label">
                                            Лифт
                                        </label>
                                    </div>
                                    <br>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1"
                                               name="internet" {{$sellRoom->internet?'checked':''}}>
                                        <label class="form-check-label">
                                            Интернет
                                        </label>
                                    </div>
                                    <br>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1"
                                               name="furniture" {{$sellRoom->furniture?'checked':''}}>
                                        <label class="form-check-label">
                                            Мебель
                                        </label>
                                    </div>
                                    <br>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1"
                                               name="washer" {{$sellRoom->washer?'checked':''}}>
                                        <label class="form-check-label">
                                            Стиральная машина
                                        </label>
                                    </div>
                                    <br>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1"
                                               name="dishes" {{$sellRoom->dishes?'checked':''}}>
                                        <label class="form-check-label">
                                            Посуда
                                        </label>
                                    </div>
                                    <br>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1"
                                               name="microwave" {{$sellRoom->microwave?'checked':''}}>
                                        <label class="form-check-label">
                                            Микроволновая печь
                                        </label>
                                    </div>
                                    <br>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1"
                                               name="tv" {{$sellRoom->tv?'checked':''}}>
                                        <label class="form-check-label">
                                            Телевизор
                                        </label>
                                    </div>
                                    <br>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1"
                                               name="wifi" {{$sellRoom->wifi?'checked':''}}>
                                        <label class="form-check-label">
                                            Wi-fi
                                        </label>
                                    </div>
                                    <br>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1"
                                               name="jacuzzi" {{$sellRoom->jacuzzi?'checked':''}}>
                                        <label class="form-check-label">
                                            Джакузи
                                        </label>
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
                                        <label class="mb-1">Цена на сутки</label>
                                        <input type="number" class="form-control input-flat" name="rent_per_day" value="{{ $sellRoom->rent_per_day }}">
                                        @error('rent_per_day')
                                        <br>
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1">Цена на ночь</label>
                                        <br>
                                        <label class="mb-1">(Не обязательно)</label>
                                        <input type="number" class="form-control input-flat" name="rent_per_night" value="{{ $sellRoom->rent_per_night }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1">Цена на часы</label>
                                        <br>
                                        <label class="mb-1">(Не обязательно)</label>
                                        <input type="number" class="form-control input-flat" name="rent_per_hour" value="{{ $sellRoom->rent_per_hour }}">
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
                                    <br>
                                    <p></p>
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
