@extends('layouts.app')

@section('content')

    <h1>{{$location->title}}</h1>
    <hr>
    <italic>{{$location->category}}</italic>

    <div style="background-image:url('{{$location->thumbnail}}')" class="thumb_nail"></div>

    <div class="container">
        <p class="lead">
            {!!$location->description!!}
        </p>
    </div>

    <div class="well">
       <div id="map"></div>
       <div hidden id="location">{{$location->lat_lng}}</div>
    </div>

    <script type="text/javascript">
        function initMap() {

            var locations = $("#location").html().split("|");
            var lat_lng = {lat: parseFloat(locations[0]), lng: parseFloat(locations[1])};
            console.log(lat_lng);
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 14,
                center: lat_lng,
                disableDefaultUI: true,
            });
             var marker = new google.maps.Marker({
                    position: lat_lng,
                    map: map
            });   
                           
        }
        </script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCuKBEbt8OH3h3yGayMwjUG6cy2Mr4A-m4&callback=initMap"> </script>
@endsection