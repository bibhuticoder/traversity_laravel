@extends('layouts.app')

@section('content')
    <h1>All Routes</h1>

    @if(count($routes) > 0)
        @foreach($routes as $route)
            <div class="well">
               <h3>
                    <a href="/routes/{{$route->id}}">{{$route->title}}</a>
               <h3/>                
            </div>
        @endforeach
    @else
        <p class="lead">No routes found</p>
    @endif
@endsection