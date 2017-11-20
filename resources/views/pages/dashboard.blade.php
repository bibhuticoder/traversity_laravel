@extends('layouts.app')

@section('content')

    <div class="jumbotron">
        <h1>Dashboard</h1>        
    </div>

    <div class="container row">
        <div class="col-md-6 col-lg-6 col-sm-6">
            <p class="lead"> All Locations </p>
            <a href="/locations/create" class="btn btn-info">Create New Location </a>
            <hr>
            <ul class="list-group">
                @foreach($user->locations as $location)
                 <li class="list-group-item">
                    <a href="/locations/{{$location->id}}/"> {{$location->title}} </a>                   
                    {{--  Delete Button  --}}
                    {!! Form::open(['action' => ['LocationsController@destroy', $location->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete', ['class'=>'btn btn-danger btn-sm'])}}
                    {!!Form::close()!!}
                    
                    {{--  Edit Button  --}}
                    <a href="/locations/{{$location->id}}/edit" class="btn btn-primary pull-right btn-sm">Edit</a>
                 </li>
                  @endforeach
            </ul>

        </div>
        <div class="col-md-6 col-lg-6 col-sm-6">
            <p class="lead"> All Routes </p>
            <a href="/routes/create" class="btn btn-info">Create New Route </a>
            <hr>
             <ul class="list-group">
                @foreach($user->routes as $route)
                 <li class="list-group-item">
                    <a href="/routes/{{$route->id}}/"> {{$route->title}} </a> 
                    {{--  Delete Button  --}}
                    {!! Form::open(['action' => ['RoutesController@destroy', $route->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete', ['class'=>'btn btn-danger btn-sm'])}}
                    {!!Form::close()!!}

                    {{--  Edit Button  --}}
                    <a href="/routes/{{$route->id}}/edit" class="btn btn-primary pull-right btn-sm">Edit</a>
                 </li>
                  @endforeach
            </ul>
        </div>
    </div>

    
@endsection