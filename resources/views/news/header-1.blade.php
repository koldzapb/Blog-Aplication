<!--================Header Menu Area =================-->
        <header class="header_area">
            <div class="top_menu">
                <div class="container">
                    <div class="float-left">
                        <a href="#">{{date('d M Y')}}</a>
                    </div>
                    <div class="float-right">
                        <ul class="list header_social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="logo_part">
                <div class="container">
                    <div class="float-left">
                        <a class="logo" href="/"><img src="{{ asset('img/logo.png') }}" alt=""></a>
                    </div>
                    <div class="float-right">
                        <div class="header_magazin">
                            <img src="{{ asset('img/header-magazin.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="main_menu">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container">
                        <div class="container_inner">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <a class="navbar-brand logo_h" href="index.html"><img src="{{ asset('img/logo.png') }}" alt=""></a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                                <ul class="nav navbar-nav menu_nav">
                                    <li class="nav-item active"><a class="nav-link" href="/">Home</a></li> 
                                    <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Categories <i class="fa fa-caret-down" style="display: inline;"></i></a>
                                    <div class="dropdown-menu">
                                        @forelse($categories as $category)
                                      <a class="dropdown-item" href="/category/{{$category->title}}">{{$category->name}}</a>
                                      @empty
                                      <p>No Categories</p>
                                      @endforelse
                                    </div>
                                  </li>
                                    <li class="nav-item"><a class="nav-link" href="#">Archive</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                                    @if(Auth::user())
                                    <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}} <i class="fa fa-caret-down" style="display: inline;"></i></a>
                                     <div class="dropdown-menu">
                                        @if(Auth::user()->usergroupid == 2)
                                        <a class="dropdown-item" href="/admin">Admin Panel</a>
                                        @endif
                                        <a class="dropdown-item" href="/logout">Logout</a>
                                    </div>
                                    </li>
                                    @else
                                    <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                                    @endif

                                    
                                </ul>


                                
                            </div> 
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <!--================Header Menu Area =================-->

        