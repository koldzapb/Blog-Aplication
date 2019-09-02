<!doctype html>
<html lang="en">
<head>
@include('news.header')
<title>Newslink</title>
</head>

    <body>
        
         @include('news.header-1')
        
        <!--================Home Banner Area =================-->
        <section class="home_banner_area">
<div class="banner_inner d-flex align-items-center">
<div class="container">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
<ol class="carousel-indicators">
<li data-target="#carouselExampleIndicators" data-slide-to="0" class=""></li>
<li data-target="#carouselExampleIndicators" data-slide-to="1" class="active"></li>
<li data-target="#carouselExampleIndicators" data-slide-to="2" class=""></li>
</ol>
<div class="carousel-inner">
    @forelse($front_news as $key => $front)
                            <div class="carousel-item {{($key == 1)? "active":""}}">
                                <div class="banner_content text-center">
                                    <div class="date">
                                       @if(count($front->category)) <a class="gad_btn" href="/category/{{$front->category->title}}">{{$front->category->name}}</a>@endif
<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>{{$front->created_at}}</a>
<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>{{count($front->comments->where('is_validated' , '=', 1))}}</a>
</div>
<a href="/article/{{$front->title}}/{{$front->id}}"><h3>{{$front->name}}</h3></a>
<p>{!! str_limit(strip_tags($front->description), $limit = 80, $end = '...') !!}</p>
</div>
                            </div>
                            @empty
                            <p>No News</p>
                            @endforelse
                           
                           
</div>
</div>
</section>
        <!--================End Home Banner Area =================-->
        
        <!--================Choice Area =================-->
        <section class="choice_area p_120">
        	<div class="container">
        		<div class="main_title2">
        			<h2>Editor’s Choice</h2>
        		</div>
        		<div class="row choice_inner">
                    @forelse($editor_choice_news as $editor_choice_article)
        			<div class="col-lg-3 col-md-6">
        				<div class="choice_item">
        					<img class="img-fluid" 
                            @if(  file_exists( public_path() . '/img/articles/' . $editor_choice_article->title . '.jpeg') )
                            src=" {{ asset('img/articles/' . $editor_choice_article->title . '.jpeg') }}"
                            @elseif(count($editor_choice_article->category) && file_exists( public_path() . '/img/categories/' . $editor_choice_article->category->title . '.jpeg'))
                            src=" {{ asset('img/categories/' . $editor_choice_article->category->title . '.jpeg') }}"
                            @else
                            src=" {{ asset('img/news-default.jpeg') }}"
                            @endif 
                            alt="">
        					<div class="choice_text">
        						<div class="date">
        							@if(count($editor_choice_article->category))<a class="gad_btn" href="/category/{{$editor_choice_article->category->title}}">{{$editor_choice_article->category->name}}</a>@endif
									<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>{{$editor_choice_article->created_at}}</a>
									<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>{{count($editor_choice_article->comments->where('is_validated' , '=', 1))}}</a>
        						</div>
        						<a href="/article/{{$editor_choice_article->title}}/{{$editor_choice_article->id}}"><h4>{{$editor_choice_article->name}}</h4></a>
        						<p>{!! str_limit(strip_tags($editor_choice_article->description), $limit = 50, $end = '...') !!}</p>
        					</div>
        				</div>
        			</div>
                    @empty
                    <p>No News!</p>
                    @endforelse
        		</div>
        	</div>
        </section>
        <!--================End Choice Area =================-->
        
        <!--================News Area =================-->
        <section class="news_area">
        	<div class="container">
        		<div class="row">
        			<div class="col-lg-8">
        				<div class="main_title2">
							<h2>Latest News</h2>
						</div>
        				<div class="latest_news">
                            @forelse($latest_news as $latest_article)
        					<div class="media">
        						<div class="d-flex">
        							<img class="img-fluid" 
                                    @if(  file_exists( public_path() . '/img/articles/' . $latest_article->title . '.jpeg') )
                                    src=" {{ asset('img/articles/' . $latest_article->title . '.jpeg') }}"
                                    @elseif(count($latest_article->category) && file_exists( public_path() . '/img/categories/' . $latest_article->category->title . '.jpeg'))
                                    src=" {{ asset('img/categories/' . $latest_article->category->title . '.jpeg') }}"
                                    @else
                                    src=" {{ asset('img/news-default.jpeg') }}"
                                    @endif 
                                    alt="" >
        						</div>
        						<div class="media-body">
        							<div class="choice_text">
										<div class="date">
											@if(count($latest_article->category))<a class="gad_btn" href="/category/{{$latest_article->category->title}}">{{$latest_article->category->name}}</a>@endif
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
                        @if($category_articles_important->has('politics'))
        				<div class="tavel_food mt-100">
        					<div class="main_title2">
								<h2>Politics</h2>
                              <? $important_politics = $category_articles_important['politics']->first();$politic_articles = $category_articles['politics']->diffKeys($important_politics); 
                              $politic_articles = $politic_articles->take(4);?>
							</div>
       						<div class="row">
       							<div class="col-lg-6">
       								<div class="row choice_small_inner">
                                        @forelse($politic_articles as $political_article)
       									<div class="col-lg-6 col-sm-6">
       										<div class="choice_item small">
												<img class="img-fluid" 
                                                @if(  file_exists( public_path() . '/img/articles/' . $political_article->title . '.jpeg') )
                                                src=" {{ asset('img/articles/' . $political_article->title . '.jpeg') }}"
                                                @elseif(file_exists( public_path() . '/img/categories/' . $political_article->category->title . '.jpeg'))
                                                src=" {{ asset('img/categories/' . $political_article->category->title . '.jpeg') }}"
                                                @else
                                                src=" {{ asset('img/news-default.jpeg') }}"
                                                @endif 
                                                alt="">
												<div class="choice_text">
													<a href="/article/{{$political_article->title}}/{{$political_article->id}}"><h4>{{ $political_article->name }}</h4></a>
													<div class="date">
														<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>{{ $political_article->created_at }}</a>
														<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>{{count($political_article->comments->where('is_validated' , '=', 1))}}</a>
													</div>
												</div>
											</div>
       									</div>
                                        @empty
                                        <p>No News</p>
                                        @endforelse
       									
       								</div>
       							</div>

       							<div class="col-lg-6">
       								<div class="choice_item">
										<img class="img-fluid" 
                                                @if(  file_exists( public_path() . '/img/articles/' . $important_politics->title . '.jpeg') )
                                                src=" {{ asset('img/articles/' . $important_politics->title . '.jpeg') }}"
                                                @elseif(file_exists( public_path() . '/img/categories/' . $important_politics->category->title . '.jpeg'))
                                                src=" {{ asset('img/categories/' . $important_politics->category->title . '.jpeg') }}"
                                                @else
                                                src=" {{ asset('img/news-default.jpeg') }}"
                                                @endif 
                                                alt="">
										<div class="choice_text">
											<div class="date">
												<a class="gad_btn" href="/category/{{$important_politics->category->title}}">Politics</a>
												<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>{{$important_politics->category->name}}</a>
												<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>{{count($important_politics->comments->where('is_validated' , '=', 1))}}</a>
											</div>
											<a href="/article/{{$important_politics['title']}}/{{$important_politics['id']}}"><h4>{{$important_politics->name}}</h4></a>
											<p>{!! str_limit(strip_tags($important_politics->description), $limit = 50, $end = '...') !!}</p>
										</div>
                                        
									</div>
       							</div>
       						</div>
        				</div>
                        @endif
                        @if($category_articles_important->has('sport'))
        				<div class="wedding_megazin mt-100">
        					<div class="main_title2">
								<h2>Sport</h2>
                                <? $important_sport = $category_articles_important['sport']->take(2); $sport_articles = $category_articles['sport']->diffKeys($important_sport);
                                $sport_articles = $sport_articles->take(4);?>
							</div>
        					<div class="row">
                                @forelse($important_sport as $sport_article)
        						<div class="col-sm-6">
        							<div class="choice_item">


										<img class="img-fluid"
                                         @if(  file_exists( public_path() . '/img/articles/' . $sport_article->title . '.jpeg') )
                                            src=" {{ asset('img/articles/' . $sport_article->title . '.jpeg') }}"
                                            @elseif(file_exists( public_path() . '/img/categories/' . $sport_article->category->title . '.jpeg'))
                                            src=" {{ asset('img/categories/' . $sport_article->category->title . '.jpeg') }}"
                                            @else
                                            src=" {{ asset('img/news-default.jpeg') }}"
                                            @endif 
                                            alt="">
										<div class="choice_text">
											<div class="date">
												<a class="gad_btn" href="/category/{{$sport_article->category->name}}">{{ $sport_article->category->name }}</a>
												<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>{{ $sport_article->created_at }}</a>
												<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>{{count($sport_article->comments->where('is_validated' , '=', 1))}}</a>
											</div>
											<a href="/article/{{ $sport_article->title }}/{{ $sport_article->id }}"><h4>{{ $sport_article->name }}</h4></a>
											<p>{!! str_limit(strip_tags($sport_article->description), $limit = 50, $end = '...') !!}</p>
										</div>
									</div>
        						</div>
                                 @empty
                                        <p>No News</p>
        						@endforelse
        						@forelse($sport_articles as $sport_article)
        						<div class="col-lg-3 col-sm-6">
        							<div class="choice_item small">
										<img class="img-fluid" 
                                        @if(  file_exists( public_path() . '/img/articles/' . $sport_article->title . '.jpeg') )
                                            src=" {{ asset('img/articles/' . $sport_article->title . '.jpeg') }}"
                                            @elseif(file_exists( public_path() . '/img/categories/' . $sport_article->category->title . '.jpeg'))
                                            src=" {{ asset('img/categories/' . $sport_article->category->title . '.jpeg') }}"
                                            @else
                                            src=" {{ asset('img/news-default.jpeg') }}"
                                            @endif 
                                            alt="">
										<div class="choice_text">
											<a href="/article/{{$sport_article->title}}/{{$sport_article->id}}"><h4>{{$sport_article->name}}</h4></a>
											<div class="date">
												<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>{{$sport_article->created_at}}</a>
												<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>{{count($sport_article->comments->where('is_validated' , '=', 1))}}</a>
											</div>
										</div>
									</div>
        						</div>
                                @empty
                                <p>No News</p>
                                @endforelse
        					</div>
        				</div>
                        @endif
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
        
        <!--================Product List Area =================-->
        <section class="product_list_area p_100">
        	<div class="container">
        		<div class="row product_list_inner">
                    @if($category_articles_important->has('economy'))
        			<div class="col-lg-4">
        				<div class="main_title2">
        					<h2>Economy </h2>
        				</div>
        				<div class="product_list">
                            @forelse($category_articles_important['economy']->take(4) as $economy_article)
        					<div class="media">
        						<div class="d-flex">
        							<img 
                                     @if(  file_exists( public_path() . '/img/articles/' . $economy_article->title . '.jpeg') )
                                            src=" {{ asset('img/articles/' . $economy_article->title . '.jpeg') }}"
                                            @elseif(file_exists( public_path() . '/img/categories/' . $economy_article->category->title . '.jpeg'))
                                            src=" {{ asset('img/categories/' . $economy_article->category->title . '.jpeg') }}"
                                            @else
                                            src=" {{ asset('img/news-default.jpeg') }}"
                                            @endif 
                                           

                                    alt="" height="100" width="80">
        						</div>
        						<div class="media-body">
        							<div class="choice_text">
										<a href="/article/{{$economy_article->title}}/{{$economy_article->id}}"><h4>{{$economy_article->name}}</h4></a>
										<div class="date">
											<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>{{$economy_article->created_at}}</a>
											<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>{{count($economy_article->comments->where('is_validated' , '=', 1))}}</a>
										</div>
									</div>
        						</div>
        					</div>      					
        					@empty
                            <p>No News!</p>
                            @endforelse
        				</div>
        			</div>
                    @endif
                    @if($category_articles_important->has('tech-culture'))
        			<div class="col-lg-4">
        				<div class="main_title2">
        					<h2>Tech Culture</h2>
        				</div>
        				<div class="product_list">
                             @forelse($category_articles_important['tech-culture']->take(4) as $tech_article)
        					<div class="media">
        						<div class="d-flex">
        							<img 
                                     @if(  file_exists( public_path() . '/img/articles/' . $tech_article->title . '.jpeg') )
                                            src=" {{ asset('img/articles/' . $tech_article->title . '.jpeg') }}"
                                            @elseif(file_exists( public_path() . '/img/categories/' . $tech_article->category->title . '.jpeg'))
                                            src=" {{ asset('img/categories/' . $tech_article->category->title . '.jpeg') }}"
                                            @else
                                            src=" {{ asset('img/news-default.jpeg') }}"
                                            @endif 
                                    alt="" height="100" width="80">
        						</div>
        						<div class="media-body">
        							<div class="choice_text">
										<a href="/article/{{$tech_article->title}}/{{$tech_article->id}}"><h4>{{$tech_article->name}}</h4></a>
										<div class="date">
											<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>{{$tech_article->created_at}}</a>
											<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>{{count($tech_article->comments->where('is_validated' , '=', 1))}}</a>
										</div>
									</div>
        						</div>
        					</div>
                            @empty
                            <p>No News!</p>
                            @endforelse
        				</div>
        			</div>
                    @endif
                     @if($category_articles_important->has('brilliant-ideas'))
        			<div class="col-lg-4">
        				<div class="main_title2">
        					<h2>Brilliant Ideas</h2>
        				</div>
        				<div class="product_list">
                             @forelse($category_articles_important['brilliant-ideas']->take(4) as $ideas_article)
        					<div class="media">
        						<div class="d-flex">
        							<img 
                                       @if(  file_exists( public_path() . '/img/articles/' . $ideas_article->title . '.jpeg') )
                                            src=" {{ asset('img/articles/' . $ideas_article->title . '.jpeg') }}"
                                            @elseif(file_exists( public_path() . '/img/categories/' . $ideas_article->category->title . '.jpeg'))
                                            src=" {{ asset('img/categories/' . $ideas_article->category->title . '.jpeg') }}"
                                            @else
                                            src=" {{ asset('img/news-default.jpeg') }}"
                                            @endif 
                                             alt="" height="100" width="80">
        						</div>
        						<div class="media-body">
        							<div class="choice_text">
										<a href="/article/{{$ideas_article->title}}/{{$ideas_article->id}}"><h4>{{$ideas_article->name}}</h4></a>
										<div class="date">
											<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>{{$ideas_article->created_at}}</a>
											<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>{{count($ideas_article->comments->where('is_validated' , '=', 1))}}</a>
										</div>
									</div>
        						</div>
        					</div>
                              @empty
                            <p>No News!</p>
                            @endforelse
        				</div>
        			</div>
                    @endif
        		</div>
        	</div>
        </section>
        <!--================End Product List Area =================-->
        @include('news.footer')
        
       
    </body>
</html>