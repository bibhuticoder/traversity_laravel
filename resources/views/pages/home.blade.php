@extends('layouts.app')

@section('content')

    
    <!-- carousel -->
    <div id="carousel" class="carousel slide" data-ride="carousel">        
        <ol class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0" class="active"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
            <li data-target="#carousel" data-slide-to="2"></li>
        </ol>        
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="http://www.letstravelsomewhere.com/wp-content/uploads/2013/03/lets-travel-to-nepal-with-gianmarco-meroni-8.jpg" alt="...">
                <div class="carousel-caption">
                    Nature
                </div>
            </div>
            <div class="item">
                <img src="http://www.cozydream.com.np/images/Nepal.jpg" alt="...">
                <div class="carousel-caption">
                    Culture
                </div>
            </div>
            <div class="item">
                <img src="https://static01.nyt.com/images/2016/05/22/travel/22BRIEF2/22BRIEF2-facebookJumbo.jpg" alt="...">
                <div class="carousel-caption">
                    Biodiversity
                </div>
            </div>            
        </div>
    </div>

    <!-- Header Banner -->
    <h1 class="headBanner">
        Make the best out of your trip with curated tours
        <hr>
        <p class="lead">Create an account to become the part of globally reconized community. Share your travel experiences with the world. </p>
        
        @if (Auth::guest())
            <a href="/register" class="btn btn-default btn-lg">Create Account</a>
        @endif
    </h1>

    <!-- Page Content -->
    <div class="container">  

        <!-- Featured Routes Nearby-->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Featured Routes</h2>
            </div>                      
            <div class="col-sm-6 col-md-4">
                <a href="#">
                <div class="thumbnail" style="height:210px; width:312px;">
                    <img src="{{ asset('images/path-of-buddha.png') }}" style="height:200px; width:300px">                     
                </div>
                </a>
            </div>
            <div class="col-sm-6 col-md-4">
                <a href="#">
                <div class="thumbnail" style="height:210px; width:312px;">
                    <img src="{{ asset('images/hilly-area-treks.png') }}" style="height:200px; width:300px">                     
                </div>
                </a>
            </div>
            <div class="col-sm-6 col-md-4">
                <a href="#">
                <div class="thumbnail" style="height:210px; width:312px;">
                    <img src="{{ asset('images/heritage-tour.png') }}" style="height:200px; width:300px">                     
                </div>
                </a>
            </div>           
            
        </div>
        <!-- /.row -->

        <!-- Categories -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Categories</h2>
            </div>
            
              <div class="col-xs-6 col-md-3">
                <a href="#" class="thumbnail">
                  <img src="{{ asset('images/category-religious.png') }}" alt="..." title="Religion">
                </a>
              </div>

               <div class="col-xs-6 col-md-3">
                <a href="#" class="thumbnail">
                  <img src="{{ asset('images/category-natural.png') }}" alt="..." title="Nature">
                </a>
              </div>

              <div class="col-xs-6 col-md-3">
                <a href="#" class="thumbnail">
                  <img src="{{ asset('images/category-historical.png') }}" alt="..." title="History">
                </a>
              </div>

              <div class="col-xs-6 col-md-3">
                <a href="#" class="thumbnail">
                  <img src="{{ asset('images/category-adventure.png') }}" alt="..." title="Heritage">
                </a>
              </div>
  
        </div>
        <!-- /.row -->
    </div>
@endsection