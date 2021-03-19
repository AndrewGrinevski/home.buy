@extends('layouts.main')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="{{ asset('main/css/custom.css') }}" rel="stylesheet">

    <div class="ps-products-wrap pt-80 pb-80">
        <div class="ps-products" data-mh="product-listing">
            <div class="ps-product-action">
                <div>
                    {{ $sellFlats->links() }}
                </div>
            </div>
            <div class="ps-product__columns">
                @if($sellFlats->count())
                @foreach($sellFlats as $flat)
                    <div class="panel ps-product__column" data-id="{{ $flat->id }}">
                        <div class="ps-shoe mb-30">
                            <input id="input-1" name="rate" class="rating rating-loading"
                                   data-min="0" data-max="5" data-step="1"
                                   value="{{ $flat->averageRating }}" data-size="xs" disabled>
                            <div class="ps-shoe__thumbnail">
                                @auth()
                                    @if($user->hasFavorited($flat))
                                        <button class="ps-shoe__favorite">
                                            <i id="like{{$flat->id}}"
                                               class="glyphicon glyphicon-heart {{ $flat->favoriters()->count() > 0  ? 'like-post' : '' }}"></i>
                                        </button>
                                    @else
                                        <button class="ps-shoe__favorite">
                                            <i id="like{{$flat->id}}"
                                               class="glyphicon glyphicon-heart"></i>
                                        </button>
                                    @endif
                                @endauth
                                <img src="{{ \Illuminate\Support\Facades\Storage::url(\App\Http\Controllers\Controller::PATH_IMG.$flat->image->first_img_name) }}" alt="">
                                <a class="ps-shoe__overlay"
                                   href="{{ route('main.allRentApartments.show', ['slug' => $flat->slug]) }}"></a>
                            </div>
                            <div class="ps-shoe__content">

                                <div class="ps-shoe__variants">
                                    <div class="col-md-7 col-lg-9 black s-bold fs-14 sm-mb-10">
                                        <div class="autopaddings mb-5">
                                            <span>{{ $flat->floor.' этаж из '.$flat->total_floors.' ; '.$flat->total_area.'/'.$flat->living_area.'/'.$flat->kitchen_area.' м' }}
                                                <sup>2</sup></span>
                                        </div>
                                        <div class="autopaddings mb-5">
                                            <span>Цена на ночь: {{ $flat->rent_per_night ? '$'. $flat->rent_per_night:'не указана'}}</span>
                                            <span>&ensp;&ensp;Кол-во спальных мест: {{ $flat->berth->number_of_berths }}</span>
                                        </div>
                                        <div class="autopaddings mb-5">
                                            <span>Цена на часы: {{ $flat->rent_per_hour ? '$'. $flat->rent_per_hour:'не указана'}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-shoe__detail"><a class="ps-shoe__name"
                                                                href="{{ route('main.allRentApartments.show', ['slug' => $flat->slug]) }}">
                                        {{$flat->room->number_of_rooms.'-комнатная квартира'.', '.$flat->town->town.', '.$flat->address}}</a>
                                    <span class="ps-shoe__price">${{ $flat->rent_per_day }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @else
                    <div>
                        <h3 class="bold-header">Ничего не найдено</h3>
                    </div>
                @endif
            </div>
            <div class="ps-product-action">
                <div>
                    {{ $sellFlats->links() }}
                </div>
            </div>
        </div>
        <form method="GET" action="{{ route('main.rentApartmentsSearch') }}">
            <div class="ps-sidebar" data-mh="product-listing">
                <aside class="ps-widget--sidebar ps-widget--category">
                    <div class="ps-widget__header">
                        <h1>Фильтры</h1>
                        <br>
                    </div>
                    <div class="ps-widget__content">
                        <div class="ps-widget__header">
                            <h4>Населенный пункт</h4>
                        </div>
                        <ul class="ps-list--checked">
                            <select class="livesearch form-control" name="town_id"></select>
                        </ul>
                    </div>
                </aside>
                <aside class="ps-widget--sidebar ps-widget--filter">
                    <div class="ps-widget__header">
                        <h4>Количество комнат</h4>
                    </div>
                    <div class="form-group">
                        <p>От</p>
                        <select class="form-control searchFlats" name="min_rooms">
                            <option value=""></option>
                            @foreach($rooms as $room)
                                <option value="{{ $room->id }}">{{ $room->number_of_rooms }}</option>
                            @endforeach
                        </select>
                        <p>До</p>
                        <select class="form-control searchFlats" name="max_rooms">
                            <option value=""></option>
                            @foreach($rooms as $room)
                                <option value="{{ $room->id }}">{{ $room->number_of_rooms }}</option>
                            @endforeach
                        </select>
                    </div>
                </aside>
                <aside class="ps-widget--sidebar ps-widget--filter">
                    <div class="ps-widget__header">
                        <h4>Количество спальных мест</h4>
                    </div>
                    <div class="form-group">
                        <p>От</p>
                        <select class="form-control searchFlats" name="min_berths">
                            <option value=""></option>
                            @foreach($berths as $berth)
                                <option value="{{ $berth->id }}">{{ $berth->number_of_berths }}</option>
                            @endforeach
                        </select>
                        <p>До</p>
                        <select class="form-control searchFlats" name="max_berths">
                            <option value=""></option>
                            @foreach($berths as $berth)
                                <option value="{{ $berth->id }}">{{ $berth->number_of_berths }}</option>
                            @endforeach
                        </select>
                    </div>
                </aside>
                <aside class="ps-widget--sidebar ps-widget--filter">
                    <div class="ps-widget__header">
                        <h5>Цена</h5>
                    </div>
                    <div class="col">
                        <input type="number" class="form-control searchFlats" name="min_rent_per_day" placeholder="От" value="{{ request()->min_rent_per_day }}">
                    </div>
                    <div class="col">
                        <input type="number" class="form-control searchFlats" name="max_rent_per_day" placeholder="До" value="{{ request()->max_rent_per_day }}">
                    </div>
                </aside>
                <aside class="ps-widget--sidebar ps-widget--filter">
                    <div class="ps-widget__header">
                        <h5>Общая площадь, м<sup>2</sup></h5>
                    </div>
                    <div class="col">
                        <input type="number" class="form-control searchFlats" name="min_total_area" placeholder="От" value="{{ request()->min_total_area }}">
                    </div>
                    <div class="col">
                        <input type="number" class="form-control searchFlats" name="max_total_are" placeholder="До" value="{{ request()->max_total_are }}">
                    </div>
                </aside>
                <aside class="ps-widget--sidebar ps-widget--filter">
                    <div class="ps-widget__header">
                        <h5>Жилая площадь, м<sup>2</sup></h5>
                    </div>
                    <div class="col">
                        <input type="number" class="form-control searchFlats" name="min_living_area" placeholder="От" value="{{ request()->min_living_area }}">
                    </div>
                    <div class="col">
                        <input type="number" class="form-control searchFlats" name="max_living_area" placeholder="До" value="{{ request()->max_living_area }}">
                    </div>
                </aside>
                <aside class="ps-widget--sidebar ps-widget--filter">
                    <div class="ps-widget__header">
                        <h5>Площадь кухни, м<sup>2</sup></h5>
                    </div>
                    <div class="col">
                        <input type="number" class="form-control searchFlats" name="min_kitchen_area" placeholder="От" value="{{ request()->min_kitchen_area }}">
                    </div>
                    <div class="col">
                        <input type="number" class="form-control searchFlats" name="max_kitchen_area" placeholder="До" value="{{ request()->max_kitchen_area }}">
                    </div>
                </aside>
                <aside class="ps-widget--sidebar ps-widget--filter">
                    <div class="ps-widget__header">
                        <h5>Этаж</h5>
                    </div>
                    <div class="col">
                        <input type="number" class="form-control searchFlats" name="min_floor" placeholder="От" value="{{ request()->min_floor }}">
                    </div>
                    <div class="col">
                        <input type="number" class="form-control searchFlats" name="max_floor" placeholder="До" value="{{ request()->max_floor }}">
                    </div>
                </aside>

                <button type="submit" class="btn mb-1 btn-rounded btn-info">Найти</button>
                <a href="{{ route('main.allRentApartments') }}" class="btn btn-warning">Сброс</a>
                <!--aside.ps-widget--sidebar-->
                <!--    .ps-widget__header: h3 Ads Banner-->
                <!--    .ps-widget__content-->
                <!--        a(href='product-listing'): img(src="images/offer/sidebar.jpg" alt="")-->
                <!---->
                <!--aside.ps-widget--sidebar-->
                <!--    .ps-widget__header: h3 Best Seller-->
                <!--    .ps-widget__content-->
                <!--        - for (var i = 0; i < 3; i ++)-->
                <!--            .ps-shoe--sidebar-->
                <!--                .ps-shoe__thumbnail-->
                <!--                    a(href='#')-->
                <!--                    img(src="images/shoe/sidebar/"+(i+1)+".jpg" alt="")-->
                <!--                .ps-shoe__content-->
                <!--                    if i == 1-->
                <!--                        a(href='#').ps-shoe__title Nike Flight Bonafide-->
                <!--                    else if i == 2-->
                <!--                        a(href='#').ps-shoe__title Nike Sock Dart QS-->
                <!--                    else-->
                <!--                        a(href='#').ps-shoe__title Men's Shoe-->
                <!--                    p <del> £253.00</del> £152.00-->
                <!--                    a(href='#').ps-btn PURCHASE-->
            </div>
        </form>
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
    <script type="text/javascript">
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('i.glyphicon-heart, i.glyphicon-heart-empty').click(function(){
                var id = $(this).parents(".panel").data('id');
                var cObjId = this.id;
                var cObj = $(this);

                $.ajax({
                    type:'POST',
                    url:'/ajaxRequest',
                    data:{id:id},
                    success:function(data){
                        if(jQuery.isEmptyObject(data.success.attached)){
                            $('#'+cObjId+'-bs3').html(parseInt(c)-1);
                            $(cObj).removeClass("like-post");
                        }else{
                            $('#'+cObjId+'-bs3').html(parseInt(c)+1);
                            $(cObj).addClass("like-post");
                        }
                    }
                });


            });
        });
    </script>
@endsection
