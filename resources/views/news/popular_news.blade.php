@if(!$most_popular_news->isEmpty())
<aside class="r_widgets news_widgets">
        						<div class="main_title2">
                                <? $most_popular_article = $most_popular_news->shift();?>
        							<h2>Most Popular News</h2>
        						</div>
        						<div class="choice_item">
									<img class="img-fluid" 
									 @if(  file_exists( public_path() . '/img/articles/' . $most_popular_article->title . '.jpeg') )
                                            src=" {{ asset('img/articles/' . $most_popular_article->title . '.jpeg') }}"
                                            @elseif(file_exists( public_path() . '/img/categories/' . $most_popular_article->category->title . '.jpeg'))
                                            src=" {{ asset('img/categories/' . $most_popular_article->category->title . '.jpeg') }}"
                                            @else
                                            src=" {{ asset('img/news-default.jpeg') }}"
                                            @endif 
									alt="">
									<div class="choice_text">
										<div class="date">
										@if(count($most_popular_article->category))<a class="gad_btn" href="/category/{{$most_popular_article->category->title}}">{{$most_popular_article->category->name}}</a>@endif
											<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>{{$most_popular_article->created_at}}</a>
											<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>{{count($most_popular_article->comments->where('is_validated' , '=', 1))}}</a>
										</div>
										<a href="/article/{{$most_popular_article->title}}/{{$most_popular_article->id}}"><h4>{{$most_popular_article->name}}</h4></a>
										<p>{!! str_limit(strip_tags($most_popular_article->description), $limit = 50, $end = '...') !!}</p>
									</div>
								</div>
       							<div class="news_slider owl-carousel">
                                    @forelse($most_popular_news as $popular_article)
       								<div class="item">
       									<div class="choice_item">
										<img 
										 @if(  file_exists( public_path() . '/img/articles/' . $popular_article->title . '.jpeg') )
                                            src=" {{ asset('img/articles/' . $popular_article->title . '.jpeg') }}"
                                            @elseif (count($popular_article->category) && file_exists( public_path() . '/img/categories/' . $popular_article->category->title . '.jpeg'))
                                            src=" {{ asset('img/categories/' . $popular_article->category->title . '.jpeg') }}"
                                            @else
                                            src=" {{ asset('img/news-default.jpeg') }}"
                                            @endif  
										alt="">
											<div class="choice_text">
												<a href="/article/{{$popular_article->title}}/{{$popular_article->id}}"><h4>{{$popular_article->name}}</h4></a>
												<div class="date">
													<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>{{$popular_article->created_at}}</a>
													<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>{{count($popular_article->comments->where('is_validated' , '=', 1))}}</a>
												</div>
											</div>
										</div>
       								</div>
                                    @empty
                                    <p>No News</p>
       							    @endforelse
       							</div>
        					</aside>
        					@endif