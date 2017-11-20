@extends('layouts.app')

@section('content')
    <h1>All Locations</h1>

    @if(count($locations) > 0)
        @foreach($locations as $location)
            <div class="well">
               <h3>
                    <a href="/locations/{{$location->id}}">{{$location->title}}</a>
               <h3/>                
            </div>
        @endforeach
    @else
        <p class="lead">No Locations found</p>
    @endif
@endsection