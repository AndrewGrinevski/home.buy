@extends('layouts.main')
@section('content')



    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('home.addSellFlat.store') }}" method="POST" enctype="multipart/form-data">
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
                                    <div id="map"></div>
                                    <br>
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
                                    <div class="form-group">
                                        <label class="mb-1">Кол-во отдельных комнат</label>
                                        <br>
                                        <label class="mb-1">(Не обязательно)</label>
                                        <select class="form-control" name="number_of_separated_rooms_id">
                                            <option value=""></option>
                                            @foreach($separatedRooms as $separatedRoom)
                                                <option value="{{ $separatedRoom->id }}">{{ $separatedRoom->number_of_separated_rooms }}</option>
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
                                    <div class="form-group">
                                        <label class="mb-1">Балкон</label>
                                        <br>
                                        <select class="form-control" name="balcony_id">
                                            @foreach($balconies as $balcony)
                                            <option value="{{ $balcony->id }}">{{ $balcony->type_of_balcony }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1">Сан. узел</label>
                                        <br>
                                        <select class="form-control" name="bathroom_id">
                                            @foreach($bathrooms as $bathroom)
                                            <option value="{{ $bathroom->id }}">{{ $bathroom->type_of_bathrooms }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1">Ремонт</label>
                                        <br>
                                        <select class="form-control" name="apartment_renovation_id">
                                            @foreach($repairs as $repair)
                                                <option value="{{ $repair->id }}">{{ $repair->type_of_repairs }}</option>
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
                                                <option value="{{ $wall->id }}">{{ $wall->type_of_walls }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1">Год постройки</label>
                                        <br>
                                        <label class="mb-1">(Не обязательно)</label>
                                        <input type="number" class="form-control input-flat" name="year_of_construction">
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1">Год кап. ремонта</label>
                                        <br>
                                        <label class="mb-1">(Не обязательно)</label>
                                        <input type="number" class="form-control input-flat" name="year_of_overhaul">
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
                                        <label class="mb-1">Общая цена</label>
                                        <input type="number" class="form-control input-flat" name="price">
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
                                                <option value="{{ $transaction->id }}">{{ $transaction->type_of_transaction }}</option>
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
                                    <button type="submit" class="btn mb-1 btn-rounded btn-info"> Создать </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfHZ-HzPD0c1Rxq9fZCSZuvzXcZ_oFGvA&callback=initMap&libraries=&v=weekly"
        async
    ></script>

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

    <script>
        let map;
        let markers = [];
        function initMap() {
            const Minsk = { lat: 53.900, lng: 27.566 };
            map = new google.maps.Map(document.getElementById("map"), {
                zoom: 14,
                center: Minsk,
                mapTypeId: "terrain",
            });
            // This event listener will call addMarker() when the map is clicked.
            map.addListener("click", (event) => {
                addMarker(event.latLng);
            });

            // Adds a marker at the center of the map.
            addMarker(haightAshbury);
        }
        // Adds a marker to the map and push to the array.
        function addMarker(location) {
            const marker = new google.maps.Marker({
                position: location,
                map: map,
            });
            clearMarkers();
            markers.push(marker);
            document.getElementById('location').value = location.lat()+" , "+location.lng();
        }
        // Sets the map on all markers in the array.
        function setMapOnAll(map) {
            for (let i = 0; i < markers.length; i++) {
                markers[i].setMap(map);
            }
        }
        // Removes the markers from the map, but keeps them in the array.
        function clearMarkers() {
            setMapOnAll(null);
        }
    </script>

@endsection
