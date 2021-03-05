@extends('layouts.admin')

@section('content')

    <div class="content-body">

        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-1">
                        <div class="card-body">
                            <h3 class="card-title text-white">Общее кол-во объявлений</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">{{ count($allAds) }}</h2>
                                <p class="text-white mb-0">Последнее: {{ $allAds->last()->created_at }}</p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-2">
                        <div class="card-body">
                            <h3 class="card-title text-white">Зарегистрировано пользователей</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">{{ count( $users ) }}</h2>
                                <p class="text-white mb-0">Последний: {{ $users->last()->created_at }}</p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="card card-widget">
                        <div class="card-body">
                            <h5 class="text-muted">Статистика </h5>
                            <h2 class="mt-4">{{ count( $allAds ) }}</h2>
                            <span>Объявлений</span>
                            <div class="mt-4">
                                <h4>{{ count( $sellFlats ) }}</h4>
                                <h6>Продажа квартир: <span class="pull-right">{{ round((count($sellFlats) / count($allAds)) * 100, 2) }}%</span></h6>
                                <div class="progress mb-3" style="height: 7px">
                                    <div class="progress-bar bg-primary" style="width: 30%;" role="progressbar"><span
                                            class="sr-only">30% Order</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <h4>{{ count( $rentFlatPerMonth ) }}</h4>
                                <h6>Аренда квартир на месяц:<span class="pull-right">{{ round((count($rentFlatPerMonth) / count($allAds)) * 100, 2) }}%</span></h6>
                                <div class="progress mb-3" style="height: 7px">
                                    <div class="progress-bar bg-success" style="width: 50%;" role="progressbar"><span
                                            class="sr-only">50% Order</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <h4>{{ count( $rentFlatPerDay ) }}</h4>
                                <h6>Аренда квартир на сутки: <span class="pull-right">{{ round((count($rentFlatPerDay) / count($allAds)) * 100, 2) }}%</span></h6>
                                <div class="progress mb-3" style="height: 7px">
                                    <div class="progress-bar bg-warning" style="width: 20%;" role="progressbar"><span
                                            class="sr-only">20% Order</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #/ container -->
    </div>

@endsection
