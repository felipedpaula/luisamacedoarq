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

    <!--Project Single Section-->
    <section class="project-single-section">
        <div class="auto-container">
            <div class="row">
                <div class="col col-md-12 col-sm-12 col-xs-12">
                    <div class="project-single-info">
                        <div class="project-pic project-single-slider single-item-carousel owl-carousel">
                            <img src="{{asset('assets/site/images/bg-header.jpg')}}" alt="" />
                            <img src="{{asset('assets/site/images/bg-header.jpg')}}" alt="" />
                            <img src="{{asset('assets/site/images/bg-header.jpg')}}" alt="" />
                        </div>

                        <div class="project-info">
                            <h3>{{$projeto->title}}</h3>
                            <p>{{$projeto->resume}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row content">
                <div class="col col-md-12 col-sm-12 col-xs-12">
                    <div class="overview">
                        <h2>Visão Geral do Projeto</h2>
                        {!! $projeto->body !!}
                    </div>
                </div>
            </div>

            {{-- <div class="row">
                <div class="col col-md-12 col-sm-12 col-xs-12">
                    <div class="prev-next">
                        <ul>
                            <li><a href="projects.html"><i class="fas fa-arrow-left"></i> Prev Project</a></li>
                            <li><a href="projects.html">Next Project <i class="fas fa-arrow-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>
    <!--End Project Single Section-->

    <!--Call To Action-->
    <section class="call-to-action">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="column col-md-8 col-sm-12 col-xs-12">
                    <h4 class="text">Nossa equipe está sempre aqui para ajudar. Contate-nos hoje para saber como.</h4>
                </div>
                <div class="btn-column col-md-4 col-sm-12 col-xs-12">
                    <a href="/contato" class="theme-btn btn-style-six">Entrar em contato</a>
                </div>
            </div>
        </div>
    </section>

@endsection