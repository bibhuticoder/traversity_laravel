@extends('layouts.app')

@section('content')
    <h3>Edit Location</h3>
    <hr>

    {!! Form::open(['action' => ['RoutesController@update', $data['route']->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

        <div class="row">
            <div class="col-md-4 col-lg-4 com-sm-4">
                <div class="form-group">
                    {{Form::label('title', 'Title')}}
                    {{Form::text('title', $data['route']->title, ['class'=>'form-control', 'placeholder'=>'Title'])}}
                </div>
                <div class="form-group">
                    {{Form::label('category', 'Category')}}
                    {{Form::text('category', $data['route']->category, ['class'=>'form-control', 'placeholder'=>'Category'])}}   
                </div>
            </div>
            <div class="col-md-4 col-lg-4 com-sm-4">               
                <div class="form-group">
                    {{Form::label('thumbnail', 'Thumbnail')}}
                    {{Form::text('thumbnail', $data['route']->thumbnail, ['class'=>'form-control', 'placeholder'=>'Src to thumbnail'])}}
                </div>
                <div class="form-group">
                    <label>Edit locations</label>                   
                    <br>                   
                    <select class="js-example-basic-multiple" name="locations[]" multiple="multiple" style="width: 200px">
                        @foreach($data['locations'] as $location)
                            <option value="{{$location->id}}">{{$location->title}}</option>                            
                        @endforeach
                    </select>
                </div>  
            </div>  
        </div>
        
        <div class="form-group">
            {{Form::label('description', 'Description')}}
            {{Form::textarea('description', $data['route']->description, ['class'=>'form-control', 'placeholder'=>'Body', 'id'=> 'article-ckeditor'])}}
         </div>
        
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}

    <div hidden id="data">@foreach($data['route']->locations as $location){{$location->id.','}}@endforeach</div>


     <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();

            //render existing locations
            var data = $("#data").html().split(',');
            data.splice(data.length-1, 1);            
            $('.js-example-basic-multiple').select2().val(data).trigger('change');
            
        });   
    </script>

@endsection