@extends('site.layouts.site-default')

@section('content')
    <!--Page Title-->
    <section class="page-title" style="background-image:url({{asset('assets/site/images/bg-header.jpg')}}); margin-bottom:50px">
        <div class="auto-container">
            <h1>Serviços</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="/">Home</a></li>
                <li class="active">Serviços</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <div class="auto-container">
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
@endsection