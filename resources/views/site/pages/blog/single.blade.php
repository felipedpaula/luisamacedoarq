@extends('site.layouts.site-default')

@section('content')

    <!--Page Title-->
    <section class="page-title" style="background-image:url({{asset('assets/site/images/bg-header.jpg')}})">
        <div class="auto-container">
            <h1>Últimas Notícias</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="/">Home</a></li>
                <li><a href="/blog">Blog</a></li>
                <li class="active">{{$post->title}}</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <!--Sidebar Page Container-->
		<div class="sidebar-page-container">
			<div class="auto-container">
				<div class="row clearfix">
					
					<!--Content Side / Blog Single-->
					<div class="content-side col-md-8 col-sm-12 col-xs-12">
						<div class="blog-single">
							<div class="inner-box">
								<div class="image">
									<img src="{{$post->img_default}}" alt="{{$post->title}}" />
								</div>
								<div class="lower-box">
									<div class="post-info"><i class="far fa-user"></i> {{$post->author}} &ensp;&ensp; <i class="far fa-calendar-alt"></i> {{date('d/m/Y',strtotime($post->created_at))}}</div>
									<h2>{{$post->title}}</h2>
									<div class="text">
										{!!$post->body!!}
									</div>
								</div>
							</div>
						</div>
					</div>

                    <!--Sidebar Side-->
                    <div class="sidebar-side col-md-4 col-sm-12 col-xs-12">
                        <aside class="sidebar right-sidebar">
                            <!--Category Blog-->
                            <div class="sidebar-widget categories-blog">
                                <div class="sidebar-title">
                                    <h2>Atalhos</h2>
                                </div>
                                <div class="inner-box">
                                    <ul>
                                        <li><a href="/projetos">Projetos</a></li>
                                        <li><a href="/servicos">Serviços</a></li>
                                    </ul>
                                </div>
                            </div>
                        </aside>
                    </div>
                    
                </div>
			</div>
		</div>

@endsection