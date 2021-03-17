@extends('layouts.main')
@section('content')
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link href="{{ asset('main/css/custom.css') }}" rel="stylesheet">

    <div class="ps-products-wrap pt-80 pb-80">
        <div class="ps-products" data-mh="product-listing">
            <div class="ps-product-action">
                <div>
                 {{--   {{ $sellFlats->links() }}--}}
                </div>
            </div>
            <div class="ps-product__columns">
               {{-- @if($sellFlats->count())--}}
                @isset($sellFlats)
                @foreach($sellFlats as $sellFlat)
                    @foreach($sellFlat as $flat)
                    <div class="panel ps-product__column" data-id="{{ $flat->id }}">
                        <div class="ps-shoe mb-30">
                            <input id="input-1" name="rate" class="rating rating-loading"
                                   data-min="0" data-max="5" data-step="1"
                                   value="{{ $flat->averageRating }}" data-size="xs" disabled>
                            <div class="ps-shoe__thumbnail"><button class="ps-shoe__favorite">
                                    <i id="like{{$flat->id}}" class="glyphicon glyphicon-heart {{ $flat->favoriters()->count() > 0  ? 'like-post' : '' }}"></i>
                                </button>
                                <img src="{{ \Illuminate\Support\Facades\Storage::url(\App\Http\Controllers\Controller::PATH_IMG.$flat->image->first_img_name) }}" alt="">
                                @if($flat->rent_per_month == null && $flat->rent_per_day == null)
                                <a class="ps-shoe__overlay"
                                   href="{{ route('main.allFlats.show', ['slug' => $flat->slug]) }}"></a>
                                @elseif($flat->price == null && $flat->rent_per_day == null)
                                    <a class="ps-shoe__overlay" href="{{route('main.allRentFlats.show', ['slug' => $flat->slug]) }}"></a>
                                @else
                                    <a class="ps-shoe__overlay" href="{{route('main.allRentApartments.show', ['slug' => $flat->slug]) }}"></a>
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
                                    <a class="ps-shoe__name" href="{{route('main.allFlats.show', ['slug' => $flat->slug]) }}">
                                        {{$flat->room->number_of_rooms.'-комнатная квартира'.', '.$flat->town->town.', '.$flat->address}}
                                    </a>
                                    <span class="ps-shoe__price">
                                        ${{ $flat->price }}
                                    </span>
                                </div>
                                @elseif($flat->price == null && $flat->rent_per_day == null)
                                    <div class="ps-shoe__detail">
                                        <a class="ps-shoe__name" href="{{route('main.allRentFlats.show', ['slug' => $flat->slug]) }}">
                                            {{$flat->room->number_of_rooms.'-комнатная квартира'.', '.$flat->town->town.', '.$flat->address}}
                                        </a>
                                        <span class="ps-shoe__price">
                                        ${{ $flat->rent_per_month }}
                                    </span>
                                    </div>
                                @else
                                    <div class="ps-shoe__detail">
                                        <a class="ps-shoe__name" href="{{route('main.allRentApartments.show', ['slug' => $flat->slug]) }}">
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
                @endforeach
                @else <h1>Нет в избранных</h1>
                @endisset
              {{--  @endif--}}
            </div>

            <div class="ps-product-action">

                <div>
                    {{--{{ $sellFlats->links() }}--}}
                </div>
            </div>
        </div>
        </div>
    </div>

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
                    url:'/sell/ajaxRequest',
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
