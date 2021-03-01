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
    <div class="ps-product--detail pt-60">
        <div class="ps-container">
            <div class="row">
                <div class="col-lg-10 col-md-12 col-lg-offset-1">
                    <div class="ps-product__thumbnail">
                        <div class="ps-product__preview">
                            <div class="ps-product__variants">
                                <div class="item"><img
                                        src="{{ \Illuminate\Support\Facades\Storage::url($sellFlat->first_img_name) }}"
                                        alt=""></div>
                                <div class="item"><img
                                        src="{{ \Illuminate\Support\Facades\Storage::url($sellFlat->second_img_name) }}"
                                        alt=""></div>
                                <div class="item"><img
                                        src="{{ \Illuminate\Support\Facades\Storage::url($sellFlat->third_img_name) }}"
                                        alt=""></div>
                                <div class="item"><img
                                        src="{{ \Illuminate\Support\Facades\Storage::url($sellFlat->four_img_name) }}"
                                        alt=""></div>
                                <div class="item"><img
                                        src="{{ \Illuminate\Support\Facades\Storage::url($sellFlat->five_img_name) }}"
                                        alt=""></div>
                            </div>
                            <a class="popup-youtube ps-product__video" href="{{ $sellFlat->youtube_video }}"><img
                                    src="{{asset('main/images/hd-youtube-logo-png-transparent-background-20.png')}}"
                                    alt=""><i class="fa fa-play"></i></a>
                        </div>
                        <div class="ps-product__image">
                            <div class="item"><img class="zoom"
                                                   src="{{ \Illuminate\Support\Facades\Storage::url($sellFlat->first_img_name) }}"
                                                   alt=""></div>
                            <div class="item"><img class="zoom"
                                                   src="{{ \Illuminate\Support\Facades\Storage::url($sellFlat->second_img_name) }}"
                                                   alt=""></div>
                            <div class="item"><img class="zoom"
                                                   src="{{ \Illuminate\Support\Facades\Storage::url($sellFlat->third_img_name) }}"
                                                   alt=""></div>
                            <div class="item"><img class="zoom"
                                                   src="{{ \Illuminate\Support\Facades\Storage::url($sellFlat->fourd_img_name) }}"
                                                   alt=""></div>
                            <div class="item"><img class="zoom"
                                                   src="{{ \Illuminate\Support\Facades\Storage::url($sellFlat->five_img_name) }}"
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
                        <div class="ps-product__rating">
                            <select class="ps-rating">
                                <option value="1">1</option>
                                <option value="1">2</option>
                                <option value="1">3</option>
                                <option value="1">4</option>
                                <option value="2">5</option>
                            </select><a href="#">(Read all 8 reviews)</a>
                        </div>
                        <h3>{{$sellFlat->number_of_rooms.', '.$sellFlat->town.', '.$sellFlat->address}}</h3>
                        <p>{{ $sellFlat->total_area.' м' }}<sup>2</sup>, &emsp; {{' ' .$sellFlat->floor.' этаж' }}</p>

                        <h3 style="color: #CF6A4C">$ {{ $sellFlat->price }}</h3>
                        <p>{{ round(($sellFlat->price)/($sellFlat->total_area)).' р/м'}}<sup>2</sup></p>
                        <div class="ps-product__block ps-product__quickview">
                            <h3>Контакты</h3>
                            <h4>{{ $sellFlat->user->name }}</h4>
                            <p>{{ $sellFlat->user->email }}</p>
                        </div>
                    </div>
                    <div class="clearfix"></div>


                    <div class="ps-content pt-80 pb-80">
                        <div class="ps-cart-listing ps-table--compare">
                            <table class="table ps-cart__table">
                                <tbody>
                                <tr>
                                    <td style="color: #CF6A4C">Дом</td>
                                </tr>
                                <tr>
                                    <td>Город</td>
                                    <td>{{ $sellFlat->town }}</td>
                                </tr>
                                <tr>
                                    <td>Адрес</td>
                                    <td>{{ $sellFlat->address }}</td>
                                </tr>
                                <tr>
                                    <td>Этажность</td>
                                    <td>{{ $sellFlat->floor }}</td>
                                </tr>
                                <tr>
                                    <td>Материал стен</td>
                                    <td>{{ $sellFlat->wall->type_of_walls }}</td>
                                </tr>
                                <tr>
                                    <td>Год постройки</td>
                                    <td>{{ $sellFlat->year_of_construction }}</td>
                                </tr>
                                </tbody>
                            </table>
                            <table class="table ps-cart__table">
                                <tbody>
                                <tr>
                                    <td style="color: #CF6A4C">Квартира</td>
                                </tr>
                                <tr>
                                    <td>Общая площадь</td>
                                    <td>{{ $sellFlat->total_area }}</td>
                                </tr>
                                <tr>
                                    <td>Жилая площадь</td>
                                    <td>{{ $sellFlat->living_area }}</td>
                                </tr>
                                <tr>
                                    <td>Кухня</td>
                                    <td>{{ $sellFlat->kitchen_area }}</td>
                                </tr>
                                <tr>
                                    <td>Комнат</td>
                                    <td>{{ $sellFlat->room->number_of_rooms }}</td>
                                </tr>
                                <tr>
                                    <td>Комнат раздельных</td>
                                    <td>{{ $sellFlat->separatedRoom->number_of_separated_rooms }}</td>
                                </tr>
                                <tr>
                                    <td>Этаж</td>
                                    <td>{{ $sellFlat->floor }}</td>
                                </tr>
                                <tr>
                                    <td>Санузел</td>
                                    <td>{{ $sellFlat->bathroom->type_of_bathrooms }}</td>
                                </tr>
                                <tr>
                                    <td>Балкон</td>
                                    <td>{{ $sellFlat->balcony->type_of_balcony }}</td>
                                </tr>
                                <tr>
                                    <td>Ремонт</td>
                                    <td>{{ $sellFlat->repair->type_of_repairs }}</td>
                                </tr>
                                <tr>
                                    <td>Условия продажи</td>
                                    <td>{{ $sellFlat->transaction->type_of_transaction }}</td>
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
                        <div class="tab-pane" role="tabpanel" id="tab_02">
                            <p class="mb-20">1 review for <strong>Shoes Air Jordan</strong></p>
                            <div class="ps-review">
                                <div class="ps-review__thumbnail"><img src="{{asset('main/images/shoe/1.jpg')}}" alt="">
                                </div>
                                <div class="ps-review__content">
                                    <header>
                                        <select class="ps-rating">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="5">5</option>
                                        </select>
                                        <p>By<a href=""> Alena Studio</a> - November 25, 2017</p>
                                    </header>
                                    <p>Soufflé danish gummi bears tart. Pie wafer icing. Gummies jelly beans powder.
                                        Chocolate bar pudding macaroon candy canes chocolate apple pie chocolate cake.
                                        Sweet caramels sesame snaps halvah bear claw wafer. Sweet roll soufflé muffin
                                        topping muffin brownie. Tart bear claw cake tiramisu chocolate bar gummies
                                        dragée lemon drops brownie.</p>
                                </div>
                            </div>
                        </div>
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
                    <div class="ps-shoes--carousel">
                        <div class="ps-shoe">
                            <div class="ps-shoe__thumbnail">
                                <div class="ps-badge"><span>New</span></div>
                                <a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img
                                    src="images/shoe/1.jpg" alt=""><a class="ps-shoe__overlay"
                                                                      href="product-detail.html"></a>
                            </div>
                            <div class="ps-shoe__content">
                                <div class="ps-shoe__variants">
                                    <div class="ps-shoe__variant normal"><img src="images/shoe/2.jpg" alt=""><img
                                            src="images/shoe/3.jpg" alt=""><img src="images/shoe/4.jpg" alt=""><img
                                            src="images/shoe/5.jpg" alt=""></div>
                                    <select class="ps-rating ps-shoe__rating">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select>
                                </div>
                                <div class="ps-shoe__detail"><a class="ps-shoe__name" href="product-detai.html">Air
                                        Jordan 7 Retro</a>
                                    <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#"> Nike</a>,<a
                                            href="#"> Jordan</a></p><span class="ps-shoe__price"> £ 120</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ps-shoes--carousel">
                        <div class="ps-shoe">
                            <div class="ps-shoe__thumbnail">
                                <div class="ps-badge"><span>New</span></div>
                                <div class="ps-badge ps-badge--sale ps-badge--2nd"><span>-35%</span></div>
                                <a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img
                                    src="images/shoe/2.jpg" alt=""><a class="ps-shoe__overlay"
                                                                      href="product-detail.html"></a>
                            </div>
                            <div class="ps-shoe__content">
                                <div class="ps-shoe__variants">
                                    <div class="ps-shoe__variant normal"><img src="images/shoe/2.jpg" alt=""><img
                                            src="images/shoe/3.jpg" alt=""><img src="images/shoe/4.jpg" alt=""><img
                                            src="images/shoe/5.jpg" alt=""></div>
                                    <select class="ps-rating ps-shoe__rating">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select>
                                </div>
                                <div class="ps-shoe__detail"><a class="ps-shoe__name" href="product-detai.html">Air
                                        Jordan 7 Retro</a>
                                    <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#"> Nike</a>,<a
                                            href="#"> Jordan</a></p><span class="ps-shoe__price">
                        <del>£220</del> £ 120</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ps-shoes--carousel">
                        <div class="ps-shoe">
                            <div class="ps-shoe__thumbnail">
                                <div class="ps-badge"><span>New</span></div>
                                <a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img
                                    src="images/shoe/3.jpg" alt=""><a class="ps-shoe__overlay"
                                                                      href="product-detail.html"></a>
                            </div>
                            <div class="ps-shoe__content">
                                <div class="ps-shoe__variants">
                                    <div class="ps-shoe__variant normal"><img src="images/shoe/2.jpg" alt=""><img
                                            src="images/shoe/3.jpg" alt=""><img src="images/shoe/4.jpg" alt=""><img
                                            src="images/shoe/5.jpg" alt=""></div>
                                    <select class="ps-rating ps-shoe__rating">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select>
                                </div>
                                <div class="ps-shoe__detail"><a class="ps-shoe__name" href="product-detai.html">Air
                                        Jordan 7 Retro</a>
                                    <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#"> Nike</a>,<a
                                            href="#"> Jordan</a></p><span class="ps-shoe__price"> £ 120</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ps-shoes--carousel">
                        <div class="ps-shoe">
                            <div class="ps-shoe__thumbnail"><a class="ps-shoe__favorite" href="#"><i
                                        class="ps-icon-heart"></i></a><img src="images/shoe/4.jpg" alt=""><a
                                    class="ps-shoe__overlay" href="product-detail.html"></a>
                            </div>
                            <div class="ps-shoe__content">
                                <div class="ps-shoe__variants">
                                    <div class="ps-shoe__variant normal"><img src="images/shoe/2.jpg" alt=""><img
                                            src="images/shoe/3.jpg" alt=""><img src="images/shoe/4.jpg" alt=""><img
                                            src="images/shoe/5.jpg" alt=""></div>
                                    <select class="ps-rating ps-shoe__rating">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select>
                                </div>
                                <div class="ps-shoe__detail"><a class="ps-shoe__name" href="product-detai.html">Air
                                        Jordan 7 Retro</a>
                                    <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#"> Nike</a>,<a
                                            href="#"> Jordan</a></p><span class="ps-shoe__price"> £ 120</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ps-shoes--carousel">
                        <div class="ps-shoe">
                            <div class="ps-shoe__thumbnail">
                                <div class="ps-badge"><span>New</span></div>
                                <a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img
                                    src="images/shoe/5.jpg" alt=""><a class="ps-shoe__overlay"
                                                                      href="product-detail.html"></a>
                            </div>
                            <div class="ps-shoe__content">
                                <div class="ps-shoe__variants">
                                    <div class="ps-shoe__variant normal"><img src="images/shoe/2.jpg" alt=""><img
                                            src="images/shoe/3.jpg" alt=""><img src="images/shoe/4.jpg" alt=""><img
                                            src="images/shoe/5.jpg" alt=""></div>
                                    <select class="ps-rating ps-shoe__rating">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select>
                                </div>
                                <div class="ps-shoe__detail"><a class="ps-shoe__name" href="product-detai.html">Air
                                        Jordan 7 Retro</a>
                                    <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#"> Nike</a>,<a
                                            href="#"> Jordan</a></p><span class="ps-shoe__price"> £ 120</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ps-shoes--carousel">
                        <div class="ps-shoe">
                            <div class="ps-shoe__thumbnail"><a class="ps-shoe__favorite" href="#"><i
                                        class="ps-icon-heart"></i></a><img src="images/shoe/6.jpg" alt=""><a
                                    class="ps-shoe__overlay" href="product-detail.html"></a>
                            </div>
                            <div class="ps-shoe__content">
                                <div class="ps-shoe__variants">
                                    <div class="ps-shoe__variant normal"><img src="images/shoe/2.jpg" alt=""><img
                                            src="images/shoe/3.jpg" alt=""><img src="images/shoe/4.jpg" alt=""><img
                                            src="images/shoe/5.jpg" alt=""></div>
                                    <select class="ps-rating ps-shoe__rating">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select>
                                </div>
                                <div class="ps-shoe__detail"><a class="ps-shoe__name" href="product-detai.html">Air
                                        Jordan 7 Retro</a>
                                    <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#"> Nike</a>,<a
                                            href="#"> Jordan</a></p><span class="ps-shoe__price"> £ 120</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
