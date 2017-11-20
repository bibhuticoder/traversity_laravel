    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">            
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">
                    <img class ="logo" src="{{ asset('images/logo.png') }}">
                </a>
            </div>
           
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-left">                  
                    <li class="">
                        <a class = "navbar-link" href="/">Home</a>
                    </li>
                    <li class = "">
                        <a class = "navbar-link" href="/faq">FAQs</a>
                    </li>   
                    <li class = "">
                        <a class = "navbar-link"  href="/contact">Contact Us</a>
                    </li>                  
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Extras <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/generator">Route Generator</a></li>
                            <li><a href="/translations">Translations</a></li>                            
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Weather</a></li>                           
                            <li><a href="#">Currency Converter</a></li>
                            <li><a href="/extras">Extra Services</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="/routes">All Routes</a></li>
                            <li><a href="/locations">All Locations</a></li>    
                        </ul>
                    </li>  


                </ul>
                <ul class="nav navbar-nav navbar-right">

                    @if (Auth::guest())
                        <form class="navbar-form navbar-left">                       
                            <div class="form-group">
                                <a href="{{ route('register') }}" class="btn btn-default">Sign Up</a>
                                <a href="{{ route('login') }}" class="btn btn-info">Login</a>
                            </div>                        
                        </form>                   
                    @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="glyphicon glyphicon-user"></span>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/dashboard">Dashboard</a></li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
