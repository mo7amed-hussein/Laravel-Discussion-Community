<!-- upper navigation bar-->
<nav class="navbar m-navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="row">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                   
                    <a class="navbar-brand" href="{{route('home')}}">
                    	 <img src="{{url('img/web V2.png')}}" style="width: 30px; height: 30px;border-radius: 50%;display: inline;margin: 0px; margin-right: 5px">
                        {{ config('app.name', 'Lara-Community') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li><a href="{{route('home')}}">Questions</a></li>
                         @if(Auth::check())
                         <li><a href="{{route('tags.index')}}">Tags</a></li>
                         <li><a href="{{route('tags.index')}}">Users</a></li>
                         @endif
                         <li>
                         </li>
                    </ul>

                    <div class="nav navbar-nav col-md-4 col-md-offset-8">
                           <form class="navbar-form form-inline" method="get" action="{{route('search')}}">
                                
                                <div class="form-group">
                             <input type="text" name="keyword" class="form-control">
                             <input type="submit" name="submit" value="search" class="form-control btn btn-default"></div>
                         </form>
                    </div>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        
                       
                         <li><a href="{{route('questions.create')}}">Ask</a></li>
                         @if(Auth::check())
                         <li><a href="#">test</a></li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{Auth::user()->name}} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a href="{{route('profile.show',Auth::id())}}">Profile</a></li>
                                    <li>
                                        <a href="#"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                        <li><a href="{{route('register')}}">Register</a></li>
                        <li><a href="{{route('login')}}">Login</a></li>
                        @endif
                    </ul>
                </div>
                </div>
            </div>
        </nav>