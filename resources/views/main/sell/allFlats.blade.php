@extends('layouts.main')
@section('content')
    <div class="ps-products-wrap pt-80 pb-80">
        <div class="ps-products" data-mh="product-listing">
            <div class="ps-product-action">
                <div>
                    {{ $sellFlats->links() }}
                </div>
            </div>
            <div class="ps-product__columns">
                @foreach($sellFlats as $flat)
                    <div class="ps-product__column">
                        <div class="ps-shoe mb-30">
                            <div class="ps-shoe__thumbnail"><a class="ps-shoe__favorite" href="#"><i
                                        class="ps-icon-heart"></i>
                                </a><img src="{{ \Illuminate\Support\Facades\Storage::url($flat->first_img_name) }}"
                                         alt="">
                                <a class="ps-shoe__overlay"
                                   href="{{ route('main.allFlats.show', ['slug' => $flat->slug]) }}"></a>
                            </div>
                            <div class="ps-shoe__content">

                                <div class="ps-shoe__variants">
                                    <select class="ps-rating ps-shoe__rating">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select>
                                    <div class="col-md-7 col-lg-9 black s-bold fs-14 sm-mb-10">
                                        <div class="autopaddings mb-5">
                                            <span>{{ $flat->floor.' этаж из '.$flat->total_floors.' ; '.$flat->total_area.'/'.$flat->living_area.'/'.$flat->kitchen_area.' м' }}
                                                <sup>2</sup></span>
                                        </div>
                                        <div class="autopaddings mb-5">
                                            <span>{{ $flat->wall->type_of_walls.', '.$flat->year_of_construction.' г.' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-shoe__detail"><a class="ps-shoe__name"
                                                                href="{{ route('main.allFlats.show', ['slug' => $flat->slug]) }}">
                                        {{$flat->number_of_rooms.', '.$flat->town.', '.$flat->address}}</a>
                                    <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#"> Nike</a>,
                                        <a href="#"> Jordan</a></p><span
                                        class="ps-shoe__price">${{ $flat->price }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="ps-product-action">

                <div>
                    {{ $sellFlats->links() }}
                </div>
            </div>
        </div>
        <form method="GET" action="{{ route('main.search') }}">
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
                            <div class="col">
                                <input type="text" class="form-control searchFlats" name="town" placeholder="Город">
                            </div>
                        </ul>
                    </div>
                </aside>
                <aside class="ps-widget--sidebar ps-widget--filter">
                    <div class="ps-widget__header">
                        <h4>Количество комнат</h4>
                    </div>
                    <div class="form-group">
                        <select class="form-control searchFlats" name="rooms">
                            <option value=""></option>
                            @foreach($rooms as $room)
                                <option value="{{ $room->id }}">{{ $room->number_of_rooms }}</option>
                            @endforeach
                        </select>
                    </div>
                </aside>
                <aside class="ps-widget--sidebar ps-widget--filter">
                    <div class="ps-widget__header">
                        <h5>Цена</h5>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control searchFlats" name="min_price" placeholder="От">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control searchFlats" name="max_price" placeholder="До">
                    </div>
                </aside>
                <aside class="ps-widget--sidebar ps-widget--filter">
                    <div class="ps-widget__header">
                        <h5>Общая площадь, м<sup>2</sup></h5>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control searchFlats" name="min_total_area" placeholder="От">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control searchFlats" name="max_total_are" placeholder="До">
                    </div>
                </aside>
                <aside class="ps-widget--sidebar ps-widget--filter">
                    <div class="ps-widget__header">
                        <h5>Жилая площадь, м<sup>2</sup></h5>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control searchFlats" name="min_living_area" placeholder="От">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control searchFlats" name="max_living_area" placeholder="До">
                    </div>
                </aside>
                <aside class="ps-widget--sidebar ps-widget--filter">
                    <div class="ps-widget__header">
                        <h5>Площадь кухни, м<sup>2</sup></h5>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control searchFlats" name="min_kitchen_area" placeholder="От">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control searchFlats" name="max_kitchen_area" placeholder="До">
                    </div>
                </aside>
                <aside class="ps-widget--sidebar ps-widget--filter">
                    <div class="ps-widget__header">
                        <h5>Этаж</h5>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control searchFlats" name="min_floor" placeholder="От">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control searchFlats" name="max_floor" placeholder="До">
                    </div>
                </aside>
                <aside class="ps-widget--sidebar ps-widget--filter">
                    <div class="ps-widget__header">
                        <h5>Этажность</h5>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control searchFlats" name="min_total_floor" placeholder="От">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control searchFlats" name="max_total_floor" placeholder="До">
                    </div>
                </aside>
                <aside class="ps-widget--sidebar ps-widget--filter">
                    <div class="ps-widget__header">
                        <h5>Год постройки</h5>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control searchFlats" name="min_year" placeholder="От">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control searchFlats" name="max_year" placeholder="До">
                    </div>
                </aside>
                <aside class="ps-widget--sidebar ps-widget--filter">
                    <div class="ps-widget__header">
                        <h5>Материал стен</h5>
                    </div>
                    <div class="form-group">
                        <select class="form-control searchFlats" name="type_of_walls">
                            <option value=""></option>
                            @foreach($walls as $wall)
                                <option value="{{ $wall->id }}">{{ $wall->type_of_walls }}</option>
                            @endforeach
                        </select>
                    </div>
                </aside>
                <aside class="ps-widget--sidebar ps-widget--filter">
                    <div class="ps-widget__header">
                        <h5>Тип балкона</h5>
                    </div>
                    <div class="form-group">
                        <select class="form-control searchFlats" name="balcony">
                            <option value=""></option>
                            @foreach($balconies as $balcony)
                                <option value="{{ $balcony->id }}">{{ $balcony->type_of_balcony }}</option>
                            @endforeach
                        </select>
                    </div>
                </aside>
                <button type="submit" class="btn mb-1 btn-rounded btn-info"> Найти </button>
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
    </div>
@endsection
