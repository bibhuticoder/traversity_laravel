@extends('layouts.app')

@section('content')
    <h3>Create Location</h3>
    <hr>

    {!! Form::open(['action' => 'LocationsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

        <div class="row">
            <div class="col-md-4 col-lg-4 com-sm-4">
                <div class="form-group">
                    {{Form::label('title', 'Title')}}
                    {{Form::text('title', '', ['class'=>'form-control', 'placeholder'=>'Title'])}}
                </div>
                <div class="form-group">
                    {{Form::label('category', 'Category')}}
                    {{Form::text('category', '', ['class'=>'form-control', 'placeholder'=>'Category'])}}   
                </div>
            </div>
            <div class="col-md-4 col-lg-4 com-sm-4">
                <div class="form-group">
                    {{Form::label('lat_lng', 'Lat lng')}}
                    {{Form::text('lat_lng', '', ['class'=>'form-control', 'placeholder'=>'Latitude-lng'])}}
                </div>
                <div class="form-group">
                    {{Form::label('thumbnail', 'Thumbnail')}}
                    {{Form::text('thumbnail', '', ['class'=>'form-control', 'placeholder'=>'Src to thumbnail'])}}
                </div> 
            </div>  
        </div>
        
        <div class="form-group">
            {{Form::label('description', 'Description')}}
            {{Form::textarea('description', '', ['class'=>'form-control', 'placeholder'=>'Body', 'id'=> 'article-ckeditor'])}}
         </div>
       
         {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}

   

@endsection