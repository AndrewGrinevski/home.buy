@extends('layouts.admin')
@section('content')

    <div class="content-body">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('admin.addRole.update', ['add_role'=>$userRole[0]->id ]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <label class="mb-1">Пользователь</label>
                                        <input type="text" class="form-control input-default" name="name" id="location" value="{{ $user->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1">Роль</label>
                                        <select class="form-control" name="role_id">
                                            @foreach($roles as $role)
                                                <option value="{{ $role->id }}"
                                                        @if($role->id == $userRole[0]->role_id) selected @endif>
                                                    {{ $role->roleName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn mb-1 btn-rounded btn-info"> Изменить </button>
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
    <script>

        let map;
        let markers = [];

        function initMap() {
            const selectLocation = { lat: 53.900, lng: 27.566 };
            map = new google.maps.Map(document.getElementById("map"), {
                zoom: 14,
                center: selectLocation,
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
