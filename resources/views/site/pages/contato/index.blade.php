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
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-7">
                    <h3 class="cfs_heading">Entre em contato</h3>
                    <div class="contact_form">
                        <form method="post" action="{{ route('sendmsg') }}">
                            @csrf

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

                            <div class="row">
                                <div class="col-lg-12">
                                    <input class="required" type="text" name="name" placeholder="Seu Nome"/>
                                </div>
                                <div class="col-lg-12">
                                    <input class="required" type="email" name="email" placeholder="Seu Email"/>
                                </div>
                                <div class="col-lg-12">
                                    <input class="required" type="text" name="tel" placeholder="Seu Telefone"/>
                                </div>
                                <div class="col-lg-12">
                                    <select name="type" id="type">
                                        <option value="Contato">Contato</option>
                                        <option value="Comentário">Comentário</option>
                                        <option value="Reclamação">Reclamação</option>
                                        <option value="Sugestão">Sugestão</option>
                                        <option value="Elogio">Elogio</option>
                                    </select>
                                </div>
                                <div class="col-lg-12">
                                    <textarea class="required" name="message" placeholder="Escreva a mensagem"></textarea>
                                </div>
                                <div class="col-lg-12">
                                    <input type="submit" name="con_submit" value="Enviar"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-md-5 pdt59">
                    <div class="contact_info">
                        <img src="theme/assets/images/icons/4.png" alt=""/>
                        <p>
                            20 Broklyn Street, New Town
                            New York, United States
                        </p>
                    </div>
                    <div class="contact_info">
                        <img src="theme/assets/images/icons/5.png" alt=""/>
                        <p>
                            <a href="mailto:infoyour@mail.com">infoyour@mail.com</a><br/>
                            666 888 0000
                        </p>
                    </div>
                    <div class="contact_info">
                        <img src="theme/assets/images/icons/6.png" alt=""/>
                        <p>
                            Web Address:<br/>
                            <a href="http://themewar.com">yourwebsite.com</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Page Section End -->

    <!-- Subscribe Section Start -->
    <section class="subscribe_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 noPaddingRight">
                    <h2>NewsLetter</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </p>
                </div>
                <div class="col-lg-6 col-md-8 offset-lg-3">
                    <form method="post" action="#" class="subscribe_form">
                        <input type="email" name="sub_email" placeholder="Enter your email">
                        <button type="submit">Message Us</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Subscribe Section End -->
@endsection
