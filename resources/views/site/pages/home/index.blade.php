@extends('site.layouts.site-default')

@section('content')
   <!--Main Slider-->
    <section class="main-slider">
        <div class="rev_slider_wrapper fullwidthbanner-container"  id="rev_slider_one_wrapper" data-source="gallery">
            <div class="rev_slider fullwidthabanner" id="rev_slider_one" data-version="5.4.1">
                <ul>
                    @foreach ($destaques as $destaque)
                    <li data-description="Slide Description" data-easein="default" data-easeout="default" data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="fade" data-hideafterloop="0" data-hideslideonmobile="off" data-index="rs-1687" data-masterspeed="default" data-param1="" data-param10="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-rotate="0" data-saveperformance="off" data-slotamount="default" data-thumb="{{$destaque->img_src}}" data-title="Slide Title" data-transition="parallaxvertical">
                        <img alt="{{$destaque->title}}" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10" data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina="" src="{{$destaque->img_src}}"> 
                        <div style="position:relative;width:100%;height:100%;background:linear-gradient(90deg, #384835 0%, #384835 20%, #eae1db00 100%);" class="bg-slider"></div>
                        <div class="tp-caption" 
                            data-paddingbottom="[0,0,0,0]"
                            data-paddingleft="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]"
                            data-paddingtop="[0,0,0,0]"
                            data-responsive_offset="on"
                            data-type="text"
                            data-height="none"
                            data-width="['650','650','550','420']"
                            data-whitespace="normal"
                            data-hoffset="['15','15','15','15']"
                            data-voffset="['-40','-80','-80','-75']"
                            data-x="['left','left','left','left']"
                            data-y="['middle','middle','middle','middle']"
                            data-textalign="['top','top','top','top']"
                            data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                            <h2 style="color:#D6C9B3;font-weight:800">{{$destaque->title}}</h2>
                        </div>

                        <div class="tp-caption" 
                            data-paddingbottom="[0,0,0,0]"
                            data-paddingleft="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]"
                            data-paddingtop="[0,0,0,0]"
                            data-responsive_offset="on"
                            data-type="text"
                            data-height="none"
                            data-width="['600','650','650','450']"
                            data-whitespace="normal"
                            data-hoffset="['15','15','15','15']"
                            data-voffset="['65','20','15','10']"
                            data-x="['left','left','left','left']"
                            data-y="['middle','middle','middle','middle']"
                            data-textalign="['top','top','top','top']"
                            data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                            <div class="text">{{$destaque->subtitle}}</div>
                        </div>

                        @if (isset($destaque->txt_link) && $destaque->txt_link != '')
                        <div class="tp-caption tp-resizeme" 
                            data-paddingbottom="[0,0,0,0]"
                            data-paddingleft="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]"
                            data-paddingtop="[0,0,0,0]"
                            data-responsive_offset="on"
                            data-type="text"
                            data-height="none"
                            data-width="['750','750','550','420']"
                            data-whitespace="normal"
                            data-hoffset="['15','15','15','15']"
                            data-voffset="['145','110','100','100']"
                            data-x="['left','left','left','left']"
                            data-y="['middle','middle','middle','middle']"
                            data-textalign="['top','top','top','top']"
                            data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                            <a href="{{$destaque->url_link}}" class="theme-btn btn-style-three">{{$destaque->txt_link}}</a>
                        </div>
                        @endif
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
    <!--End Main Slider-->

    <!--About Section-->
    <section class="about-section-home">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="about-details col-md-12 col-sm-12 col-xs-12">
                    <div class="inner-column">
                        <div class="sec-title style-two">
                            <div class="sub-title">A paixão e a visão por trás dos projetos arquitetônicos.</div>
                            <h2>Sobre <span>nós</span></h2>
                            <div class="separator"></div>
                        </div>
                        <div class="text">
                            <p>Somos um escritório reconhecido por respeitar o estilo do cliente, onde não impomos algo que não faça sentido, com projetos criativos e funcionais.</p>
                            <p>A percepção empática e sensível com a boa comunicação e relacionamento entre equipe, clientes, prestadores, fornecedores resgata o que sempre fez parte do nosso vocabulário: personalidade, lado humano, criatividade, espontaneidade e pensamento positivo.</p>
                            <p>Sempre estaremos abertos para pessoas que buscam conexão com os espaços, pertencimento.</p>
                            <p>Nos desafiamos a cada cliente, a cada sonho. Chegar em um final de obra e questionar o cliente se ele está diante do sonho dele e a resposta for SIM, é que o objetivo foi alcançado.</p>
                            <p>Nunca foi e nunca será, sobre uma simples entrega.</p>
                            <p>Criamos espaços com criatividade para refletir o SEU estilo de habitar.</p>
                        </div>
                    </div>
                </div>
                <div class="about-details-image col-md-6 col-sm-12 col-xs-12">
                    <div class="image">
                        <img src="assets/site/images/sobre.jpg" alt="Sobre mim">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End About Section-->

    <!--Project Section-->
    <section class="project-section-home">
        <div class="auto-container">
            <div class="sec-title style-two centered">
                <h2>Nossos <span>Projetos</span></h2>
                <div class="separator"></div>
                <div class="text">
                    <p>A taxa de conversão da execução fidedigna dos nossos projetos é de 90%, temos esse resultado por alguns fatores.</p>
                    <p>Nossos projetos são EXECUTAVEIS, por isso temos TANTOS resultados fidedignos ao que foi pensado em projeto! por estarmos MUITO bem alinhados com os desejos dos clientes como também quanto ao orçamento.</p>
                </div>
            </div>
            <div class="projects-carousel owl-carousel owl-theme">
                @foreach ($projetos as $projeto)
                <div class="item">
                    <div><img src="{{$projeto->img_default}}" alt="{{$projeto->title}}"></div>
                    <div class="info">
                        <h3><a href="project-single.html">{{$projeto->title}}</a></h3>
                        <h4><a href="project-single.html">{{$projeto->resume}}</a></h4>
                        <a href="project-single.html"><i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <br>
        <div class="text-center">
            <a href="/projetos" class="theme-btn btn-style-one">Todos projetos</a>
        </div>
    </section>
    <!--End Project Section-->
    
    <!--Services Section Two-->
    <section class="services-section-two" style="background-image:url(images/background/1.jpg)">
        <div class="section-inner">
            <div class="auto-container">
                <!--Sec Title-->
                <div class="sec-title light centered">
                    <h2>Serviços</h2>
                    <div class="sub-title">Conheça todos os tipos de serviço que posso fazer por você.</div>
                    <div class="separator"></div>
                </div>
                <div class="row clearfix">
                    <!-- 1 -->
                    <div class="services-block-two col-md-4 col-sm-6 col-xs-12">
                        <div class="inner-box">
                            <div class="icon-box">
                                <img src="theme/images/services/icon-1.svg" alt="">
                            </div>
                            <h3><a href="services-single.html">Projeto Residencial e Comercial</a></h3>
                            <div class="text">Transformamos suas ideias em realidade, criando espaços residenciais e comerciais que são tão funcionais quanto esteticamente agradáveis.</div>
                            <a class="read-more" href="services-single.html">saber mais <span class="icon fa fa-angle-double-right"></span></a>
                        </div>
                    </div>
                    
                    <!-- 2 -->
                    <div class="services-block-two col-md-4 col-sm-6 col-xs-12">
                        <div class="inner-box">
                            <div class="icon-box">
                                <img src="theme/images/services/icon-5.svg" alt="">
                            </div>
                            <h3><a href="services-single.html">Design de Interiores e Otimização de Espaços</a></h3>
                            <div class="text">Vamos reinventar seu espaço, maximizando sua eficiência e beleza, refletindo seu estilo pessoal em cada detalhe.</div>
                            <a class="read-more" href="services-single.html">saber mais <span class="icon fa fa-angle-double-right"></span></a>
                        </div>
                    </div>
                    
                    <!-- 3 -->
                    <div class="services-block-two col-md-4 col-sm-6 col-xs-12">
                        <div class="inner-box">
                            <div class="icon-box">
                                <img src="theme/images/services/icon-4.svg" alt="">
                            </div>
                            <h3><a href="services-single.html">Arquitetura Remota e Serviços Online</a></h3>
                            <div class="text">Oferecemos consultoria e design arquitetônico personalizados, acessíveis de qualquer lugar, a qualquer hora, com a mesma qualidade e atenção aos detalhes.</div>
                            <a class="read-more" href="services-single.html">saber mais <span class="icon fa fa-angle-double-right"></span></a>
                        </div>
                    </div>

                    <!-- 4 -->
                    <div class="services-block-two col-md-4 col-sm-6 col-xs-12">
                        <div class="inner-box">
                            <div class="icon-box">
                                <img src="theme/images/services/icon-6.svg" alt="">
                            </div>
                            <h3><a href="services-single.html">Consultoria para Reformas e Modernização</a></h3>
                            <div class="text">Nossa expertise transforma e atualiza seu espaço, mesclando as últimas tendências com soluções práticas para uma renovação impactante.</div>
                            <a class="read-more" href="services-single.html">saber mais <span class="icon fa fa-angle-double-right"></span></a>
                        </div>
                    </div>
                    
                    <!-- 5 -->
                    <div class="services-block-two col-md-4 col-sm-6 col-xs-12">
                        <div class="inner-box">
                            <div class="icon-box">
                                <img src="theme/images/services/icon-2.svg" alt="">
                            </div>
                            <h3><a href="services-single.html">Desenvolvimento de Projetos para Construção</a></h3>
                            <div class="text">Da concepção à construção, nosso foco é desenvolver projetos que realizem seus sonhos de construção, garantindo qualidade e sustentabilidade.</div>
                            <a class="read-more" href="services-single.html">saber mais <span class="icon fa fa-angle-double-right"></span></a>
                        </div>
                    </div>
                    
                    <!-- 6 -->
                    <div class="services-block-two col-md-4 col-sm-6 col-xs-12">
                        <div class="inner-box">
                            <div class="icon-box">
                                <img src="theme/images/services/icon-3.svg" alt="">
                            </div>
                            <h3><a href="services-single.html">Integração de Arquitetura e Engenharia Civil</a></h3>
                            <div class="text">Unimos estética arquitetônica e precisão de engenharia para criar não apenas construções belas, mas também estruturalmente excelentes e eficientes.</div>
                            <a class="read-more" href="services-single.html">read more <span class="icon fa fa-angle-double-right"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Services Section Two-->

    <!--News Section-->
    <section class="news-section" style="margin-top:50px">
        <div class="auto-container">
            <!--Sec Title-->
            <div class="sec-title centered">
                <h2>Últimas Notícias</h2>
                <div class="sub-title">Saiba mais sobre dicas de design e tendências na arquitetura</div>
                <div class="separator"></div>
            </div>
            <div class="row clearfix">
                <!--News Block-->
                @foreach ($posts as $post)
                <div class="news-block col-md-4 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <a href="/blog/{{$post->slug}}">
                            <div class="image">
                                <img src="{{$post->img_default}}" alt="{{$post->title}}" />
                            </div>
                        </a>
                        <div class="lower-box">
                            <div class="post-date"><i class="far fa-calendar-alt"></i> March 29, 2021</div>
                            <h3><a href="/blog/{{$post->slug}}">{{$post->title}}</a></h3>
                            <div class="text">{{$post->resume}}</div>
                            <div class="clearfix">
                                <div class="pull-left">
                                    <a href="/blog/{{$post->slug}}" class="read-more">Ler mais <span class="fa fa-angle-right"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--End News Section-->
@endsection
