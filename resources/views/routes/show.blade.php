@extends('layouts.app')

@section('content')

    <h1>{{$route->title}}</h1>
    <italic>{{$route->category}}</italic>

    <div style="background-image:url('{{$route->thumbnail}}')" class="thumb_nail"></div>

    <div class="container">
        {!!$route->description!!}       
    </div>

       <div id="board">            
            <div id="nodes">               
                    @foreach($route->locations as $location)                        
                    <a href="/locations/{{$location->id}}">
                        <div class= "node" style="background-image:url('{{$location->thumbnail}}')">
                            {{$location->title}}
                        </div>
                    </a>                                          
                @endforeach
            </div>
        </div>

    <div class="well">
        <div id="map"></div>
        <div hidden id="location">
            @foreach($route->locations as $location){{$location->lat_lng}},@endforeach
        </div>
    </div>
    <p class="lead">Comments</p>
    
    @if(count($route->comments) > 0)
        <ul>
            @foreach($route->comments as $comment)
                <li>{{$comment->content}}</li>
            @endforeach
        </ul>
    @else
        <div class="well">No Comments</div>
    @endif

    <hr>
    {!! Form::open(['action' => 'CommentsController@add', 'method' => 'POST']) !!}
        {{Form::textarea('content', '', ['class'=>'form-control', 'placeholder'=>'Comments here..', 'rows' => 4])}}
        {{Form::hidden('route_id', $route->id)}}
        <br>
        {{Form::submit('Submit Comment', ['class'=>'btn btn-primary pull-right'])}}
    {!! Form::close() !!}


    <script type="text/javascript">
        function initMap() {

            var temp = $("#location").html().split(",");
            var locations = temp.map(function(t){
                return ({lat: parseFloat(t.split('|')[0]), lng: parseFloat(t.split('|')[1])});
            })
            
            console.log(locations);
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 10,
                center: locations[0],
                disableDefaultUI: true,
            });
            for(var i=0; i<locations.length; i++){
                var marker = new google.maps.Marker({
                    position: locations[i],
                    map: map
                });  
            }
            
                           
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCuKBEbt8OH3h3yGayMwjUG6cy2Mr4A-m4&callback=initMap"> </script>

    
@endsection