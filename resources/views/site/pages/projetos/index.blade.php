@extends('site.layouts.site-default')

@section('content')
    <!--Page Title-->
    <section class="page-title" style="background-image:url({{asset('assets/site/images/bg-header.jpg')}}); margin-bottom:50px">
        <div class="auto-container">
            <h1>Projetos</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="/">Home</a></li>
                <li class="active">Projetos</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <!--Project Page Section-->
    <section class="project-section project-page-section">
        <div class="auto-container">
            <div class="filter-list row clearfix">
                <!--Gallery Block-->
                @foreach ($projetos as $projeto)
                <div class="gallery-block col-md-6 col-sm-6 col-xs-12">
                    <div class="item">
                        <div><img height="300px" src="{{$projeto->img_default}}" alt="{{$projeto->title}}" /></div>
                        <div class="info">
                            <h3><a href="/projetos/{{$projeto->id}}">{{$projeto->title}}</a></h3>
                            <h4><a href="/projetos/{{$projeto->id}}">{{$projeto->resume}}</a></h4>
                            <a href="/projetos/{{$projeto->id}}"><i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection