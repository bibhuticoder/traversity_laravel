@extends('layouts.app')

@section('content')
    <h3>Create Route</h3>
    <hr>

    {!! Form::open(['action' => 'RoutesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

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
                    {{Form::label('thumbnail', 'Thumbnail')}}
                    {{Form::text('thumbnail', '', ['class'=>'form-control', 'placeholder'=>'Src to thumbnail'])}}
                </div>

                 <div class="form-group">
                    <label>Add locations</label>
                    <br>
                    <select class="js-example-basic-multiple" name="locations[]" multiple="multiple" style="width: 200px">
                        @foreach($locations as $location)
                            <option value="{{$location->id}}">{{$location->title}}</option>                            
                        @endforeach
                    </select>
                </div>  
            </div>  
        </div>
        
        <div class="form-group">
            {{Form::label('description', 'Description')}}
            {{Form::textarea('description', '', ['class'=>'form-control', 'placeholder'=>'Body', 'id'=> 'article-ckeditor'])}}
         </div>
       
         {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}


    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });   
    </script>

@endsection