@extends('layouts.main')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="{{ asset('main/css/custom.css') }}" rel="stylesheet">

    <div class="ps-section--features-product ps-section masonry-root pt-100 pb-100">
        <div class="ps-container">
            <div class="ps-section__header mb-50">
                <h3 class="ps-section__title" data-mask="Объявления"> Последние объявления</h3>
            </div>
            <div class="ps-section__content pb-50">
                <div class="masonry-wrapper" data-col-md="4" data-col-sm="2" data-col-xs="1" data-gap="30"
                     data-radio="100%">
                    <div class="ps-masonry">
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
                                                <img
                                                    src="{{ \Illuminate\Support\Facades\Storage::url(\App\Http\Controllers\Controller::PATH_IMG.$flat->image->first_img_name) }}"
                                                    alt="">
                                                @if($flat->rent_per_month == null && $flat->rent_per_day == null)
                                                    <a class="ps-shoe__overlay"
                                                       href="{{ route('main.allFlats.show', ['slug' => $flat->slug]) }}"></a>
                                                @elseif($flat->price == null && $flat->rent_per_day == null)
                                                    <a class="ps-shoe__overlay"
                                                       href="{{route('main.allRentFlats.show', ['slug' => $flat->slug]) }}"></a>
                                                @else
                                                    <a class="ps-shoe__overlay"
                                                       href="{{route('main.allRentApartments.show', ['slug' => $flat->slug]) }}"></a>
                                                @endif
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
                                                @if($flat->rent_per_month == null && $flat->rent_per_day == null)
                                                    <div class="ps-shoe__detail">
                                                        <a class="ps-shoe__name"
                                                           href="{{route('main.allFlats.show', ['slug' => $flat->slug]) }}">
                                                            {{$flat->room->number_of_rooms.'-комнатная квартира'.', '.$flat->town->town.', '.$flat->address}}
                                                        </a>
                                                        <span class="ps-shoe__price">
                                        ${{ $flat->price }}
                                    </span>
                                                    </div>
                                                @elseif($flat->price == null && $flat->rent_per_day == null)
                                                    <div class="ps-shoe__detail">
                                                        <a class="ps-shoe__name"
                                                           href="{{route('main.allRentFlats.show', ['slug' => $flat->slug]) }}">
                                                            {{$flat->room->number_of_rooms.'-комнатная квартира'.', '.$flat->town->town.', '.$flat->address}}
                                                        </a>
                                                        <span class="ps-shoe__price">
                                        ${{ $flat->rent_per_month }}
                                    </span>
                                                    </div>
                                                @else
                                                    <div class="ps-shoe__detail">
                                                        <a class="ps-shoe__name"
                                                           href="{{route('main.allRentApartments.show', ['slug' => $flat->slug]) }}">
                                                            {{$flat->room->number_of_rooms.'-комнатная квартира'.', '.$flat->town->town.', '.$flat->address}}
                                                        </a>
                                                        <span class="ps-shoe__price">
                                        ${{ $flat->rent_per_day }}
                                    </span>
                                                    </div>
                                                @endif
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
        <script type="text/javascript">
            $(document).ready(function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('i.glyphicon-heart, i.glyphicon-heart-empty').click(function () {
                    var id = $(this).parents(".panel").data('id');
                    var cObjId = this.id;
                    var cObj = $(this);

                    $.ajax({
                        type: 'POST',
                        url: '/sell/ajaxRequest',
                        data: {id: id},
                        success: function (data) {
                            if (jQuery.isEmptyObject(data.success.attached)) {
                                $(cObj).removeClass("like-post");
                            } else {
                                $(cObj).addClass("like-post");
                            }
                        }
                    });
                });
            });
        </script>
@endsection
