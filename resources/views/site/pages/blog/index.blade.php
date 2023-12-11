@extends('site.layouts.site-default')

@section('content')

    <!--Page Title-->
    <section class="page-title" style="background-image:url({{asset('assets/site/images/bg-header.jpg')}})">
        <div class="auto-container">
            <h1>Últimas Notícias</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="/">Home</a></li>
                <li class="active">Notícias</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">
                
                <!--Content Side / Blogs Classic-->
                <div class="content-side col-md-8 col-sm-12 col-xs-12">
                    <div class="blog-classic">
                        @foreach ($posts as $post)
                        <div class="news-block-four">
                            <div class="inner-box">
                                <a href="/blog/{{$post->slug}}">
                                    <div class="image">
                                        <img src="{{$post->img_default}}" alt="{{$post->title}}" />
                                    </div>
                                </a>
                                <div class="lower-box">
                                    <div class="post-date"><i class="far fa-user"></i> {{$post->author}} &ensp;&ensp; <i class="far fa-calendar-alt"></i> March 29, 2021</div>
                                    <h3><a href="/blog/{{$post->slug}}">{{$post->title}}</a></h3>
                                    <div class="text">{{$post->resume}}</div>
                                    <div class="clearfix">
                                        <a href="/blog/{{$post->slug}}" class="read-more">Ler mais <span class="fa fa-angle-right"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>             
                        @endforeach
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