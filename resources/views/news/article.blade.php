<!doctype html>
<html lang="en">
	<head>
		 @include('news.header')
		 <title>{{$article->name}}</title>
	</head>    
    <body>
        @include('news.header-1')
           
        <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="banner_content">
						<h2>{{$article->name}}</h2>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        
        <!-- Start Sample Area -->
			<section class="sample-text-area">
				<div class="container">
					<h3 class="text-heading title_color text-center ">{{$article->name}}</h3>
					<div>
						{!! $article->description !!}
					</div>
					<p class="pull-right">
						By {!! $article->user->name !!}
					</p>

				@if(Auth::user() && Auth::user()->usergroupid == 2)
				<p ><a href="/admin/article/{{$article->id}}/edit">Edit Article</a></p>
				@endif
				</div>

				</section>
				<hr>
				

			 @include('comments.create')
			<!-- End Sample Area -->
			<!-- Start Button -->
		
			<!-- End Button -->
			<!-- Start Align Area -->
			
			<!-- End Align Area -->
        
         @include('news.footer')
       
         
    </body>
</html>