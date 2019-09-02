<!--================ start footer Area  =================-->	
        <footer class="footer-area">
            <div class="container">
                <div class="row f_widgets_inner">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-footer-widget ab_widgets">
                           <p>Technology and gadgets Adapter (MPA) is our favorite iPhone solution, since it lets you use the headphones you’re most comfortable with. It has an iPhone-compatible jack at one end and a microphone module with an Answer/End/Pause button and a female 3.5mm audio jack for connectingheadphones</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <div class="f_title">
                            	<h3>Quick Links</h3>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <ul class="list">
                                        <li><a href="#">Sitemaps</a></li>
                                        <li><a href="#">Categories</a></li>
                                        <li><a href="#">Archives</a></li>
                                        <li><a href="#">Advertise</a></li>
                                        <li><a href="#">Ad Choice</a></li>
                                    </ul>
                                </div>
                                <div class="col-6">
                                    <ul class="list">
                                        <li><a href="#">Privacy Policy</a></li>
                                        <li><a href="#">Terms of Use</a></li>
                                        <li><a href="#">Help Center</a></li>
                                        <li><a href="#">Newsletters</a></li>
                                        <li><a href="#">Feedback</a></li>
                                    </ul>
                                </div>										
                            </div>							
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-footer-widget m_news_widgets">
                            <div class="f_title">
                            	<h3>Most Viewed News</h3>
                            </div>
                            <div class="m_news">
                                 @forelse($most_viewed_news->take(2) as $most_viewed_article)
                            	<div class="media">
                            		<div class="d-flex">
                            			<img src="{{ asset('img/product/product-12.jpg') }}" alt="">
                            		</div>
                            		<div class="media-body">
                            			<a href="/article/{{$most_viewed_article->title}}/{{$most_viewed_article->id}}"><h4>{{$most_viewed_article->name}}</h4></a>
                            			<div class="date">
											<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>{{$most_viewed_article->created_at}}</a>
											<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>{{count($most_viewed_article->comments->where('is_validated' , '=', 1))}}</a>
										</div>
                            		</div>
                            	</div>
                            	@empty
                                <p>No News!</p>
                                @endforelse
                            </div>
                        </div>
                    </div>	
                </div>
                <div class="row footer-bottom d-flex justify-content-between align-items-center">
                   	<div class="col-lg-12">
                   		<div class="f_boder"></div>
                   	</div>
                    <p class="col-lg-8 col-md-8 footer-text m-0"></p>
                    <div class="col-lg-4 col-md-4 footer-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-youtube-play"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                        <a href="#"><i class="fa fa-rss"></i></a>
                    </div>
                </div>
            </div>
        </footer>
		<!--================ End footer Area  =================-->

        <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ asset('js/popper.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/stellar.js') }}"></script>
        <script src="{{ asset('vendors/lightbox/simpleLightbox.min.js') }}"></script>
        <script src="{{ asset('vendors/nice-select/js/jquery.nice-select.min.js') }}"></script>
        <script src="{{ asset('vendors/isotope/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ asset('vendors/isotope/isotope-min.js') }}"></script>
        <script src="{{ asset('vendors/owl-carousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('vendors/jquery-ui/jquery-ui.js') }}"></script>
        <script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
        <script src="{{ asset('js/mail-script.js') }}"></script>
        <script src="{{ asset('js/theme.js') }}"></script>
