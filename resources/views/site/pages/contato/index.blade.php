@extends('site.layouts.site-default')

@section('content')
    <!--Page Title-->
    <section class="page-title" style="background-image:url({{asset('assets/site/images/bg-header.jpg')}}); margin-bottom:50px">
        <div class="auto-container">
            <h1>Contato</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="/">Home</a></li>
                <li class="active">Contato</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <section class="contact_form_section my-5">
        <div class="container" style="margin-bottom:50px">
            <div class="row">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-title" style="margin-bottom:50px">
                    <h2 style="color:#293C27">Formulário para contato</h2>
                    <div class="separator"></div>
                    <div class="text">Gostaríamos de contribuir no projeto que você está pensando. Por favor, deixe-nos uma mensagem para entrarmos em contato.</div>
                </div>

                <!--Form Column-->
                <div class="form-column col-md-7 col-sm-12 col-xs-12">
                    <div class="column-inner">
                    
                        <!-- Contact Form -->
                        <div class="contact-form">
                            <form action="{{route('sendmsg')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                        <input type="text" name="name" placeholder="Seu nome" required value="{{old('name')}}">
                                    </div>
    
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                        <input type="email" name="email" placeholder="Seu email" required value="{{old('email')}}">
                                    </div>
                                    
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                        <input type="text" name="tel" placeholder="Seu telefone" required value="{{old('tel')}}">
                                    </div>
    
                                    <div class=" col-md-12 col-sm-12 col-xs-12 form-group">
                                        <textarea name="message" placeholder="Mensagem">{{old('message')}}</textarea>
                                    </div>
    
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                        <button class="theme-btn btn-style-one" type="submit" name="submit-form">Enviar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--End Contact Form -->
                    </div>
                </div>
					
                <!--Info Column-->
                <div class="info-column col-md-5 col-sm-12 col-xs-12" style="padding:30px;background:url({{asset('theme/images/background/texture-1.jpg')}})">
                    <ul class="list-style-two">
                        <li>
                            <span class="icon flaticon-symbol"></span>
                            <div class="info-featured">luisamacedo.arqurb@gmail.com</div>
                        </li>
                        <li>
                            <span class="icon flaticon-smartphone"></span>
                            <div class="info-featured">(62) 99930-1302</div>
                        </li>
                        <li>
                            <span class="icon flaticon-placeholder"></span>
                            <div class="text-info">Localização</div>
                            <h3>Qualquer lugar no mundo!</h3>
                        </li>
                        
                        <li>
                            <span class="icon flaticon-clock-1"></span>
                            <div class="text-info">Atendimento</div>
                            <h3>Segunda - Sexta<br>08:00 às 18:00</h3>
                        </li>
                    </ul>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Page Section End -->
@endsection
