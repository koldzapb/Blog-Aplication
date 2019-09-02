<!doctype html>
<html lang="en">
    <head>
@include('news.header')
<title>{{$category->name}}</title>
</head>
    <body>
@include('news.header-1')      
        <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="banner_content text-center">
						<h2>{{$category->name}}</h2>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        <!--================News Area =================-->
        <section class="news_area p_100">
        	<div class="container">
        		<div class="row">
        			<div class="col-lg-8">
        				<div class="main_title2">
							<h2>Latest News</h2>
						</div>
       					<div class="latest_news">
       						@forelse($latest_news as $latest_article)
        					<div class="media">
        						<div class="d-flex" >
        							<img class="img-fluid" 
                                     @if(  file_exists( public_path() . '/img/articles/' . $latest_article->title . '.jpeg') )
                                            src=" {{ asset('img/articles/' . $latest_article->title . '.jpeg') }}"
                                            @elseif(file_exists( public_path() . '/img/categories/' . $category->title . '.jpeg'))
                                            src=" {{ asset('img/categories/' . $category->title . '.jpeg') }}"
                                            @else
                                            src=" {{ asset('img/news-default.jpeg') }}"
                                            @endif 

                                    alt="" >
        						</div>
        						<div class="media-body">
        							<div class="choice_text">
										<div class="date">
											<a class="gad_btn" href="#">{{$category->name}}</a>
											<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>{{$latest_article->created_at}}</a>
											<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>{{count($latest_article->comments->where('is_validated' , '=', 1))}}</a>
										</div>
										<a href="/article/{{$latest_article->title}}/{{$latest_article->id}}"><h4>{{$latest_article->name}}</h4></a>
										<p>{!! str_limit(strip_tags($latest_article->description), $limit = 50, $end = '...') !!}</p>
									</div>
        						</div>
        					</div>
        					 @empty
                            <p>No News</p>
                            @endforelse
        			
        				</div>
        				<div class="wedding_megazin mt-100">
        					<div class="main_title2">
								<h2>{{$category->name}} News</h2>
							</div>
        					<div class="row">
        						@forelse($important_articles as $important_article)
        						<div class="col-sm-6">
        							<div class="choice_item">
										<img class="img-fluid" 
                                         @if(  file_exists( public_path() . '/img/articles/' . $important_article->title . '.jpeg') )
                                            src=" {{ asset('img/articles/' . $important_article->title . '.jpeg') }}"
                                            @elseif(file_exists( public_path() . '/img/categories/' . $category->title . '.jpeg'))
                                            src=" {{ asset('img/categories/' . $category->title . '.jpeg') }}"
                                            @else
                                            src=" {{ asset('img/news-default.jpeg') }}"
                                            @endif 

                                         alt="">
										<div class="choice_text">
											<div class="date">
												<a class="gad_btn" href="#">{{$important_article->category->name}}</a>
												<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>{{$important_article->created_at}}</a>
												<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>{{count($important_article->comments->where('is_validated' , '=', 1))}}</a>
											</div>
											<a href="/article/{{$important_article->title}}/{{$important_article->id}}"><h4>{{$important_article->name}}</h4></a>
											<p>It won’t be a bigger problem to find one video game lover in your neighbor. Since the introduction of Virtual Game, it has been achieving great heights</p>
										</div>
									</div>
        						</div>
        						@empty
        						<p>No News</p>
        						@endforelse
        						@forelse($articles as $article)
        						<div class="col-md-3 col-sm-6">
        							<div class="choice_item small">
										<img class="img-fluid" 
                                        @if(  file_exists( public_path() . '/img/articles/' . $article->title . '.jpeg') )
                                            src=" {{ asset('img/articles/' . $article->title . '.jpeg') }}"
                                            @elseif(file_exists( public_path() . '/img/categories/' . $category->title . '.jpeg'))
                                            src=" {{ asset('img/categories/' . $category->title . '.jpeg') }}"
                                            @else
                                            src=" {{ asset('img/news-default.jpeg') }}"
                                            @endif 
                                        alt="">
										<div class="choice_text">
											<a href="/article/{{$article->title}}/{{$article->id}}"><h4>{{$article->name}}</h4></a>
											<div class="date">
												<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>{{$article->created_at}}</a>
												<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>{{count($article->comments->where('is_validated' , '=', 1))}}</a>
											</div>
										</div>
									</div>
        						</div>
        						@empty
        						<p>No News</p>
        						@endforelse
        					</div>
        					{{ $articles->links( "pagination::bootstrap-4") }}
        				</div>
        			</div>
        			<div class="col-lg-4">
        				<div class="right_sidebar">
                         @include('news.popular_news')
        				@include('news.social_network')
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
        <!--================End News Area =================-->
        
       @include('news.footer')
        
    </body>
    </body>
</html>