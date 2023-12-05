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
                        <div style="position:relative;width:100%;height:100%;background:linear-gradient(90deg, #eae1db 0%, #eae1db 20%, #eae1db00 100%);" class="bg-slider"></div>
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
                            <h2 style="color:#293C27;font-weight:800">{{$destaque->title}}</h2>
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
                            <h2>Sobre <span>mim</span></h2>
                            <div class="separator"></div>
                        </div>
                        <div class="text">
                            <p>Olá! Sou Luísa Macêdo, arquiteta formada pela renomada PUC-GO e atualmente atuando no coração de Goiânia. Acredito que cada espaço deve refletir não só uma estética naturalista, mas também a essência e personalidade de quem o habita. Em cada projeto, busco criar ambientes que contem histórias, se conectem com a natureza e celebrem a individualidade dos meus clientes. Seja bem-vindo ao meu universo arquitetônico.</p>
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
                <h2>Meus <span>Projetos</span></h2>
                <div class="separator"></div>
            </div>
            <div class="projects-carousel owl-carousel owl-theme">
                <div class="item">
                    <div><img src="theme/images/resource/project-1.jpg" alt=""></div>
                    <div class="info">
                        <h3><a href="project-single.html">Aqua Residence</a></h3>
                        <h4><a href="project-single.html">Architecture</a></h4>
                        <a href="project-single.html"><i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="item">
                    <div><img src="theme/images/resource/project-2.jpg" alt=""></div>
                    <div class="info">
                        <h3><a href="project-single.html">Box Perspective</a></h3>
                        <h4><a href="project-single.html">Engineering</a></h4>
                        <a href="project-single.html"><i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="item">
                    <div><img src="theme/images/resource/project-3.jpg" alt=""></div>
                    <div class="info">
                        <h3><a href="project-single.html">Bricks High</a></h3>
                        <h4><a href="project-single.html">Consulting</a></h4>
                        <a href="project-single.html"><i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="item">
                    <div><img src="theme/images/resource/project-4.jpg" alt=""></div>
                    <div class="info">
                        <h3><a href="project-single.html">Rustic Nature</a></h3>
                        <h4><a href="project-single.html">Interior</a></h4>
                        <a href="project-single.html"><i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="item">
                    <div><img src="theme/images/resource/project-5.jpg" alt=""></div>
                    <div class="info">
                        <h3><a href="project-single.html">Pool Party</a></h3>
                        <h4><a href="project-single.html">Construction</a></h4>
                        <a href="project-single.html"><i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="item">
                    <div><img src="theme/images/resource/project-6.jpg" alt=""></div>
                    <div class="info">
                        <h3><a href="project-single.html">Bar Concept</a></h3>
                        <h4><a href="project-single.html">Interior</a></h4>
                        <a href="project-single.html"><i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="text-center">
            <a href="projects.html" class="theme-btn btn-style-one">Todos projetos</a>
        </div>
    </section>
    <!--End Project Section-->
    
    <!--Services Section Two-->
    <section class="services-section-two" style="background-image:url(images/background/1.jpg)">
        <div class="section-inner">
        <div class="auto-container">
            <!--Sec Title-->
            <div class="sec-title light centered">
                <h2>Our Services</h2>
                <div class="sub-title">a force for activating cities and reenergizing cultures</div>
                <div class="separator"></div>
            </div>
            <div class="row clearfix">
                <!--Services Block Two-->
                <div class="services-block-two col-md-4 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="icon-box">
                            <img src="theme/images/services/icon-1.svg" alt="">
                        </div>
                        <h3><a href="services-single.html">Architecture</a></h3>
                        <div class="text">Provides an opportunity to not only add beauty and structure to the world, but to profoundly improve the conditions for people.</div>
                        <a class="read-more" href="services-single.html">read more <span class="icon fa fa-angle-double-right"></span></a>
                    </div>
                </div>
                
                <!--Services Block Two-->
                <div class="services-block-two col-md-4 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="icon-box">
                            <img src="theme/images/services/icon-2.svg" alt="">
                        </div>
                        <h3><a href="services-single.html">Consulting & Planning</a></h3>
                        <div class="text">Our team’s analytical tools and user engagement activities inspire creativity and collaboration that enhance any project.</div>
                        <a class="read-more" href="services-single.html">read more <span class="icon fa fa-angle-double-right"></span></a>
                    </div>
                </div>
                
                <!--Services Block Two-->
                <div class="services-block-two col-md-4 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="icon-box">
                            <img src="theme/images/services/icon-3.svg" alt="">
                        </div>
                        <h3><a href="services-single.html">Construction</a></h3>
                        <div class="text">Across our firm, we employ a diverse range of professionals with a successful record delivering high-quality projects.</div>
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
                <h2>Latest News</h2>
                <div class="sub-title">Learn more about design tips and construction trends</div>
                <div class="separator"></div>
            </div>
            <div class="row clearfix">

                <!--News Block-->
                <div class="news-block col-md-4 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <a href="blog-single.html">
                            <div class="image">
                                <img src="theme/images/resource/news-thumb-1.jpg" alt="" />
                            </div>
                        </a>
                        <div class="lower-box">
                            <div class="post-date"><i class="far fa-calendar-alt"></i> March 29, 2021</div>
                            <h3><a href="blog-single.html">Everything You Need to Know About Minimalist Design</a></h3>
                            <div class="text">Clean lines, reductive, uncluttered, monochromatic, simplicity, "less is more" these are some of the terms and concepts.</div>
                            <div class="clearfix">
                                <div class="pull-left">
                                    <a href="blog-single.html" class="read-more">Read More <span class="fa fa-angle-right"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--News Block-->
                <div class="news-block col-md-4 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <a href="blog-single.html">
                            <div class="image">
                                <img src="theme/images/resource/news-thumb-2.jpg" alt="" />
                            </div>
                        </a>
                        <div class="lower-box">
                            <div class="post-date"><i class="far fa-calendar-alt"></i> March 22, 2021</div>
                            <h3><a href="blog-single.html">Organizing Ideas To Give Your Office The Ultimate Upgrade</a></h3>
                            <div class="text">Home offices are all the rage right now. Yours could be the headquarters for a small business, questionably relevant papers, or homework central.</div>
                            <div class="clearfix">
                                <div class="pull-left">
                                    <a href="blog-single.html" class="read-more">Read More <span class="fa fa-angle-right"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--News Block-->
                <div class="news-block col-md-4 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <a href="blog-single.html">
                            <div class="image">
                                <img src="theme/images/resource/news-thumb-3.jpg" alt="" />
                            </div>
                        </a>
                        <div class="lower-box">
                            <div class="post-date"><i class="far fa-calendar-alt"></i> March 15, 2021</div>
                            <h3><a href="blog-single.html">How to Decorate Your Kitchen with Subway Tiles</a></h3>
                            <div class="text">It doesn't matter what your design aesthetic is or how much space you have, one thing's for sure: Subway tiles are a failsafe.</div>
                            <div class="clearfix">
                                <div class="pull-left">
                                    <a href="blog-single.html" class="read-more">Read More <span class="fa fa-angle-right"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End News Section-->

    <!--Testimonial Section-->
    <section class="clients-section  grey-bg">
        <div class="auto-container">
            <div class="title-box">
                <div class="title">Our work is defined by so much more than just recognition</div>
                <h2>Trusted by hundreds of clients around the country</h2>
                <div class="separator"></div>
            </div>
            
            <div class="sponsors-outer">
                <!--Sponsors Carousel-->
                <ul class="sponsors-carousel owl-carousel owl-theme">
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="theme/images/clients/1.jpg" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="theme/images/clients/2.jpg" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="theme/images/clients/3.jpg" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="theme/images/clients/4.jpg" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="theme/images/clients/5.jpg" alt=""></a></figure></li>
                </ul>

            </div>
        </div>
    </section>
    <!--End Testimonial Section-->
@endsection
