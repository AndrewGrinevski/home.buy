@extends('layouts.main')
@section('content')
    <div class="test">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 ">
                </div>
            </div>
        </div>
    </div>
    <div @if($sellFlat->is_banned) style="  background-image: url({{ asset('main/images/block.png') }} );" @endif>
    <div class="ps-product--detail pt-60">
        <div class="ps-container">
            <div class="row">
                <div class="col-lg-10 col-md-12 col-lg-offset-1">
                    <div class="ps-product__thumbnail">
                        <div class="ps-product__preview">
                            <div class="ps-product__variants">
                                <div class="item"><img
                                        src="{{ \Illuminate\Support\Facades\Storage::url(\App\Http\Controllers\Controller::PATH_IMG.$sellFlat->image->first_img_name) }}"
                                        alt=""></div>
                                <div class="item"><img
                                           src="{{ \Illuminate\Support\Facades\Storage::url(\App\Http\Controllers\Controller::PATH_IMG.$sellFlat->image->second_img_name) }}"
                                        alt=""></div>
                                <div class="item"><img
                                        src="{{ \Illuminate\Support\Facades\Storage::url(\App\Http\Controllers\Controller::PATH_IMG.$sellFlat->image->third_img_name) }}"
                                        alt=""></div>
                                <div class="item"><img
                                        src="{{ \Illuminate\Support\Facades\Storage::url(\App\Http\Controllers\Controller::PATH_IMG.$sellFlat->image->four_img_name) }}"
                                        alt=""></div>
                                <div class="item"><img
                                        src="{{ \Illuminate\Support\Facades\Storage::url(\App\Http\Controllers\Controller::PATH_IMG.$sellFlat->image->five_img_name) }}"
                                        alt=""></div>
                            </div>
                            <a class="popup-youtube ps-product__video" href="{{ $sellFlat->youtube_video }}"><img
                                    src="{{asset('main/images/hd-youtube-logo-png-transparent-background-20.png')}}"
                                    alt=""><i class="fa fa-play"></i></a>
                        </div>
                        <div class="ps-product__image">
                            <div class="item"><img class="zoom"
                                                   src="{{ \Illuminate\Support\Facades\Storage::url(\App\Http\Controllers\Controller::PATH_IMG.$sellFlat->image->first_img_name) }}"
                                                   alt=""></div>
                            <div class="item"><img class="zoom"
                                                   src="{{ \Illuminate\Support\Facades\Storage::url(\App\Http\Controllers\Controller::PATH_IMG.$sellFlat->image->second_img_name) }}"
                                                   alt=""></div>
                            <div class="item"><img class="zoom"
                                                   src="{{ \Illuminate\Support\Facades\Storage::url(\App\Http\Controllers\Controller::PATH_IMG.$sellFlat->image->third_img_name) }}"
                                                   alt=""></div>
                            <div class="item"><img class="zoom"
                                                   src="{{ \Illuminate\Support\Facades\Storage::url(\App\Http\Controllers\Controller::PATH_IMG.$sellFlat->image->fourd_img_name) }}"
                                                   alt=""></div>
                            <div class="item"><img class="zoom"
                                                   src="{{ \Illuminate\Support\Facades\Storage::url(\App\Http\Controllers\Controller::PATH_IMG.$sellFlat->image->five_img_name) }}"
                                                   alt=""></div>
                        </div>
                    </div>
                    <div class="ps-product__thumbnail--mobile">
                        <div class="ps-product__main-img"><img src="{{asset('main/images/shoe/1.jpg')}}" alt=""></div>
                        <div class="ps-product__preview owl-slider" data-owl-auto="true" data-owl-loop="true"
                             data-owl-speed="5000" data-owl-gap="20" data-owl-nav="true" data-owl-dots="false"
                             data-owl-item="3" data-owl-item-xs="3" data-owl-item-sm="3" data-owl-item-md="3"
                             data-owl-item-lg="3" data-owl-duration="1000" data-owl-mousedrag="on"><img
                                src="{{asset('main/images/shoe/1.jpg')}}" alt=""><img
                                src="{{asset('main/images/shoe/2.jpg')}}" alt=""><img
                                src="{{asset('main/images/shoe/3.jpg')}}" alt=""></div>
                    </div>
                    <div class="ps-product__info">
                        <form action="{{ route('flats.flat') }}" method="POST">
                            @csrf
                            <div class="ps-product__rating">
                                <div class="rating">
                                    <input id="input-1" name="rate" class="rating rating-loading"
                                           data-min="0" data-max="5" data-step="1"
                                           value="{{ $sellFlat->averageRating }}" data-size="xs" @if(is_null(auth()->user())) disabled>
                                    <p>(Только зарегистрированные пользователи могут оставлять отзыв)</p> @endif
                                    <input type="hidden" name="id" required="" value="{{ $sellFlat->id }}">
                                    <span class="review-no">{{ $sellFlat->usersRated() }} отзыва</span>
                                    <br/>
                                    <button class="btn btn-success">добавить отзыв</button>
                                </div>
                                <input type="hidden" name="id" required="" value="{{ $sellFlat->id }}">
                            </div>
                        </form>
                        <h3>{{$sellFlat->room->number_of_rooms.'-комнатная квартира'.', '.$sellFlat->town->town.', '.$sellFlat->address}}</h3>
                        <p>{{ $sellFlat->total_area.' м' }}<sup>2</sup>, &emsp; {{' ' .$sellFlat->floor.' этаж' }}</p>

                        <h3 style="color: #CF6A4C">$ {{ $sellFlat->rent_per_month }}</h3>
                        <p>{{ round(($sellFlat->rent_per_month)/($sellFlat->total_area)).' $/м'}}<sup>2</sup></p>
                        <div class="ps-product__block ps-product__quickview">
                            <h3>Контакты</h3>
                            <br>
                            <h4>Email:{{ $sellFlat->user->email }}</h4>
                            <h4>Телефон:{{ $sellFlat->user->phone }}({{ $sellFlat->user->name }})</h4>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <br>
                    <br>
                    <br>
                    <div class="hidden"
                         data-lat="{{ $location[0] }}"
                         data-lng="{{ $location[1] }}"
                         data-address="{{ $sellFlat->address }}"
                    ></div>
                    <div id="map"></div>
                    <div class="ps-content pt-80 pb-80">
                        <div class="ps-cart-listing ps-table--compare">
                            <table class="table ps-cart__table">
                                <tbody>
                                <tr>
                                    <td style="color: #CF6A4C">Дом</td>
                                </tr>
                                <tr>
                                    <td>Город</td>
                                    <td>{{ $sellFlat->town->town }}</td>
                                </tr>
                                <tr>
                                    <td>Адрес</td>
                                    <td>{{ $sellFlat->address }}</td>
                                </tr>
                                <tr>
                                    <td>Этажность</td>
                                    <td>{{ $sellFlat->total_floors }}</td>
                                </tr>
                                <tr>
                                    <td style="color: #CF6A4C">Квартира</td>
                                </tr>
                                <tr>
                                    <td>Общая площадь</td>
                                    <td>{{ $sellFlat->total_area .' м'}}<sup>2</sup></td>
                                </tr>
                                <tr>
                                    <td>Жилая площадь</td>
                                    <td>{{ $sellFlat->living_area .' м'}}<sup>2</sup></td>
                                </tr>
                                <tr>
                                    <td>Кухня</td>
                                    <td>{{ $sellFlat->kitchen_area .' м'}}<sup>2</sup></td>
                                </tr>
                                <tr>
                                    <td>Комнат</td>
                                    <td>{{ $sellFlat->room->number_of_rooms }}</td>
                                </tr>
                                <tr>
                                    <td>Этаж</td>
                                    <td>{{ $sellFlat->floor }}</td>
                                </tr>
                                <tr>
                                    <td>Студентам</td>
                                    <td>{{ $sellFlat->students?'Да': 'Нет' }}</td>
                                </tr>
                                <tr>
                                    <td>С животными</td>
                                    <td>{{ $sellFlat->with_animals?'Да': 'Нет' }}</td>
                                </tr>
                                <tr>
                                    <td>С детьми</td>
                                    <td>{{ $sellFlat->with_kids?'Да': 'Нет' }}</td>
                                </tr>
                                <tr>
                                    <td style="color: #CF6A4C">Удобства</td>
                                </tr>
                                <tr>
                                <td>Холодильник</td>
                                <td>{{ $sellFlat->fridge?'В наличии': 'Нет' }}</td>
                                </tr>
                                <tr>
                                <td>Лифт</td>
                                <td>{{ $sellFlat->elevator?'В наличии': 'Нет' }}</td>
                                </tr>
                                <tr>
                                <td>Интернет</td>
                                <td>{{ $sellFlat->internet?'В наличии': 'Нет' }}</td>
                                </tr>
                                <tr>
                                <td>Мебель</td>
                                <td>{{ $sellFlat->furniture?'В наличии': 'Нет' }}</td>
                                </tr>
                                <tr>
                                <td>Стиральная машина</td>
                                <td>{{ $sellFlat->washer?'В наличии': 'Нет' }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-content mb-60">
                        <div class="tab-pane active" role="tabpanel" id="tab_01">
                            <h3>Описание</h3>
                            <br>
                            <p>{{ $sellFlat->description }}</p>
                        </div>
                    </div>
                        @role('moderator')
                        <form action="{{ route('blockUnblock.moderator') }}" method="POST">
                            @csrf
                            <input type="hidden" name="block" value="1">
                            <input type="hidden" name="id" value="{{ $sellFlat->id }}">
                            <button type="submit" class="btn btn-danger">Заблокировать</button>
                        </form>
                        <br>
                        <form action="{{ route('blockUnblock.moderator') }}" method="POST">
                            @csrf
                            <input type="hidden" name="unblock" value="1">
                            <input type="hidden" name="id" value="{{ $sellFlat->id }}">
                            <button type="submit" class="btn btn-info">Разблокировать</button>
                        </form>
                        @endrole
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ps-section ps-section--top-sales ps-owl-root pt-40 pb-80">
        <div class="ps-container">
            <div class="ps-section__header mb-50">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
                        <h3 class="ps-section__title" data-mask="Другие предложения">- Похожие объекты</h3>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                        <div class="ps-owl-actions"><a class="ps-prev" href="#"><i class="ps-icon-arrow-right"></i>Prev</a><a
                                class="ps-next" href="#">Next<i class="ps-icon-arrow-left"></i></a></div>
                    </div>
                </div>
            </div>
            <div class="ps-section__content">
                <div class="ps-owl--colection owl-slider" data-owl-auto="true" data-owl-loop="true"
                     data-owl-speed="5000" data-owl-gap="30" data-owl-nav="false" data-owl-dots="false"
                     data-owl-item="4" data-owl-item-xs="1" data-owl-item-sm="2" data-owl-item-md="3"
                     data-owl-item-lg="4" data-owl-duration="1000" data-owl-mousedrag="on">
                    @if($sellFlats->count())
                        @foreach($sellFlats as $flat)
                            <div class="ps-shoes--carousel">
                                <div class="panel ps-product__column" data-id="{{ $flat->id }}">
                                    <div class="ps-shoe mb-30">
                                        <input id="input-1" name="rate" class="rating rating-loading"
                                               data-min="0" data-max="5" data-step="1"
                                               value="{{ $flat->averageRating }}" data-size="xs" disabled>
                                        <div class="ps-shoe__thumbnail">
                                            <img
                                                src="{{ \Illuminate\Support\Facades\Storage::url(\App\Http\Controllers\Controller::PATH_IMG.$flat->image->first_img_name) }}"
                                                alt="">
                                            <a class="ps-shoe__overlay"
                                               href="{{ route('main.allRentFlats.show', ['slug' => $flat->slug]) }}"></a>
                                        </div>
                                        <div class="ps-shoe__content">
                                            <div class="ps-shoe__variants">
                                                <div class="col-md-7 col-lg-9 black s-bold fs-14 sm-mb-10">
                                                    <div class="autopaddings mb-5">
                                            <span>{{ $flat->floor.' этаж из '.$flat->total_floors.' ; '.$flat->total_area.'/'.$flat->living_area.'/'.$flat->kitchen_area.' м' }}
                                                <sup>2</sup></span>
                                                    </div>
                                                    <div class="autopaddings mb-5">
                                            <span>Тип стен:&ensp;{{ $flat->type_of_walls_id ? $flat->wall->type_of_walls : 'Не указана' }}
                                                </span>
                                                        <br>
                                                        <span>Год постройки:&ensp;{{ $flat->year_of_construction ? $flat->year_of_construction . ' г.' : 'Не указан' }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ps-shoe__detail"><a class="ps-shoe__name"
                                                                            href="{{ route('main.allRentFlats.show', ['slug' => $flat->slug]) }}">
                                                    <br>{{$flat->room->number_of_rooms.'-комнатная квартира'.', '.$flat->town->town.', '.$flat->address}} </a>
                                                <span class="ps-shoe__price">${{ $flat->rent_per_month }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
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
        $("#input-id").rating();
    </script>
    <script>
        let map;
        let markers = [];

        function initMap() {
            var myLat = $('div.hidden').data('lat');
            var myLng = $('div.hidden').data('lng');
            var address = $('div.hidden').data('address');
            const myLatLnsg = { lat: 54, lng:27 };
            const myLatLng = { lat: myLat, lng: myLng };
            map = new google.maps.Map(document.getElementById("map"), {
                zoom: 14,
                center: myLatLng,
                mapTypeId: "terrain",
            });

            new google.maps.Marker({
                map,

                position: myLatLng,
                title: address,
            });
        }
    </script>
@endsection
