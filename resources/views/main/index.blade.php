@extends('layouts.main')
@section('content')

        <div class="ps-section--features-product ps-section masonry-root pt-100 pb-100">
            <div class="ps-container">
                <div class="ps-section__header mb-50">
                    <h3 class="ps-section__title" data-mask="Объявления"> Последние объявления</h3>
                </div>
                <div class="ps-section__content pb-50">
                    <div class="masonry-wrapper" data-col-md="4" data-col-sm="2" data-col-xs="1" data-gap="30" data-radio="100%">
                        <div class="ps-masonry">
                            <div class="ps-product__columns">
                                @if($sellFlats->count())
                                    @foreach($sellFlats as $flat)
                                        <div class="panel ps-product__column" data-id="{{ $flat->id }}">
                                            <div class="ps-shoe mb-30">
                                                <input id="input-1" name="rate" class="rating rating-loading"
                                                       data-min="0" data-max="5" data-step="1"
                                                       value="{{ $flat->averageRating }}" data-size="xs" disabled>
                                                <div class="ps-shoe__thumbnail"><button class="ps-shoe__favorite">
                                                        <i id="like{{$flat->id}}" class="glyphicon glyphicon-heart {{ $flat->followers()->count() > 0  ? 'like-post' : '' }}"></i>
                                                    </button>
                                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($flat->first_img_name) }}" alt="">
                                                    <a class="ps-shoe__overlay"
                                                       href="{{ route('main.allFlats.show', ['slug' => $flat->slug]) }}"></a>
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
                                                                                    href="{{ route('main.allFlats.show', ['slug' => $flat->slug]) }}">
                                                            {{$flat->number_of_rooms.', '.$flat->town.', '.$flat->address}}</a>
                                                        <span class="ps-shoe__price">${{ $flat->price }}</span>
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

        <div class="ps-section ps-home-blog pt-80 pb-80">
            <div class="ps-container">
                <div class="ps-section__header mb-50">
                    <h2 class="ps-section__title" data-mask="News">- Our Story</h2>
                    <div class="ps-section__action"><a class="ps-morelink text-uppercase" href="#">View all post<i class="fa fa-long-arrow-right"></i></a></div>
                </div>
                <div class="ps-section__content">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                            <div class="ps-post">
                                <div class="ps-post__thumbnail"><a class="ps-post__overlay" href="blog-detail.html"></a><img src="images/blog/1.jpg" alt=""></div>
                                <div class="ps-post__content"><a class="ps-post__title" href="blog-detail.html">An Inside Look at the Breaking2 Kit</a>
                                    <p class="ps-post__meta"><span>By:<a class="mr-5" href="blog.html">Alena Studio</a></span> -<span class="ml-5">Jun 10, 2017</span></p>
                                    <p>Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further…</p><a class="ps-morelink" href="blog-detail.html">Read more<i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                            <div class="ps-post">
                                <div class="ps-post__thumbnail"><a class="ps-post__overlay" href="blog-detail.html"></a><img src="images/blog/2.jpg" alt=""></div>
                                <div class="ps-post__content"><a class="ps-post__title" href="blog-detail.html">Unpacking the Breaking2 Race Strategy</a>
                                    <p class="ps-post__meta"><span>By:<a class="mr-5" href="blog.html">Alena Studio</a></span> -<span class="ml-5">Jun 10, 2017</span></p>
                                    <p>Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further…</p><a class="ps-morelink" href="blog-detail.html">Read more<i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                            <div class="ps-post">
                                <div class="ps-post__thumbnail"><a class="ps-post__overlay" href="blog-detail.html"></a><img src="images/blog/3.jpg" alt=""></div>
                                <div class="ps-post__content"><a class="ps-post__title" href="blog-detail.html">Nike’s Latest Football Cleat Breaks the Mold</a>
                                    <p class="ps-post__meta"><span>By:<a class="mr-5" href="blog.html">Alena Studio</a></span> -<span class="ml-5">Jun 10, 2017</span></p>
                                    <p>Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further…</p><a class="ps-morelink" href="blog-detail.html">Read more<i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
