@extends('layouts.main')
@section('content')

    <div class="content-body">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('home.addRentFlat.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
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
                                        <input type="text" class="form-control input-flat"  name="address">
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
                                                <option value="{{ $room->id }}">{{ $room->number_of_rooms }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mx-sm-3 mb-2 form-inline">
                                        <label class="mb-1">Площадь, м2</label>
                                        <input type="number" class="form-control form-inline" placeholder="Общаяя" name="total_area">
                                        @error('total_area')
                                        <br>
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <input type="number" class="form-control form-inline" placeholder="Жилая" name="living_area">
                                        @error('living_area')
                                        <br>
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <input type="number" class="form-control form-inline" placeholder="Кухня" name="kitchen_area">
                                        @error('kitchen_area')
                                        <br>
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mx-sm-3 mb-2 form-inline">
                                        <label class="mb-1">Этаж</label>
                                        <input type="number" class="form-control form-inline" placeholder="3" name="floor">
                                        @error('floor')
                                        <br>
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <label class="mb-1">из</label>
                                        <input type="number" class="form-control form-inline" placeholder="9" name="total_floors">
                                        @error('total_floors')
                                        <br>
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <br>
                                    <h4 class="card-title">Дополнительные опции</h4>
                                    <br>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1"
                                               name="fridge">
                                        <label class="form-check-label">
                                            Холодильник
                                        </label>
                                    </div>
                                    <br>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1"
                                                name="elevator">
                                        <label class="form-check-label">
                                            Лифт
                                        </label>
                                    </div>
                                    <br>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1"
                                               name="internet">
                                        <label class="form-check-label">
                                            Интернет
                                        </label>
                                    </div>
                                    <br>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1"
                                                name="furniture">
                                        <label class="form-check-label">
                                            Мебель
                                        </label>
                                    </div>
                                    <br>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1"
                                                name="washer">
                                        <label class="form-check-label">
                                            Стиральная машина
                                        </label>
                                    </div>
                                    <br>
                                    <h4 class="card-title">Фотографии</h4>
                                    <br>
                                    <div class="form-group">
                                        <input type="file" name="images[]" multiple class="btn btn-default btn-file" required>
                                    </div>
                                    <br>
                                    <h4 class="card-title">Описание объекта</h4>
                                    <div class="form-group">
                                        <textarea class="form-control h-150px" rows="6" id="comment" name="description"></textarea>
                                        @error('description')
                                        <br>
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1">Видео</label>
                                        <br>
                                        <label class="mb-1">(Не обязательно)</label>
                                        <input type="text" class="form-control input-flat" placeholder="Ссылка на видео в Youtube" name="youtube_video">
                                    </div>
                                    <br>
                                    <h4 class="card-title">Цена и условия сделки</h4>
                                    <br>
                                    <div class="form-group">
                                        <label class="mb-1">Стоимость аренды в месяц</label>
                                        <input type="number" class="form-control input-flat" name="rent_per_month">
                                        @error('rent_per_month')
                                        <br>
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <br>
                                    <h5 class="card-title">Кому сдаётся</h5>
                                    <br>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1"
                                               name="students">
                                        <label class="form-check-label">
                                            Студентам
                                        </label>
                                    </div>
                                    <br>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1"
                                               name="with_animals">
                                        <label class="form-check-label">
                                            С животными
                                        </label>
                                    </div>
                                    <br>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1"
                                               name="with_kids">
                                        <label class="form-check-label">
                                            С детьми
                                        </label>
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
                                    <button type="submit" class="btn mb-1 btn-rounded btn-info"> Создать </button>
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
