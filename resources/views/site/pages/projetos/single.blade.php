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

    <!--Project Single Section-->
    <section class="project-single-section">
        <div class="auto-container">
            <div class="row">
                <div class="col col-md-12 col-sm-12 col-xs-12">
                    <div class="project-single-info">
                        <div class="project-pic project-single-slider single-item-carousel owl-carousel">
                            <img src="images/projects/project-single-1.jpg" alt="" />
                            <img src="images/projects/project-single-2.jpg" alt="" />
                            <img src="images/projects/project-single-3.jpg" alt="" />
                        </div>

                        <div class="project-info">
                            <h3>Modern 2 Storey House with Roofdeck & Swimming Pool</h3>
                            <ul>
                                <li><span>Area: </span> 220 m2</li>
                                <li><span>Built-up Area: </span> 186 m2</li>
                                <li><span>Stories: </span> 2</li>
                                <li><span>Rooms: </span> 4</li>
                                <li><span>Baths: </span> 3</li>
                                <li><span>Location: </span> Denver, USA</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row content">
                <div class="col col-md-12 col-sm-12 col-xs-12">
                    <div class="overview">
                        <h2>Project Overview</h2>
                        <p>The house is meant for those who like modern, simple architectural forms. This is a storey house, with just the ground floor. The house was designed to have both day and night zone. Through the windshield, you enter into the living room lobby. The living and the dining room have the view on the garden and the pool for your relaxation. In the night zone, there are three bedrooms, with large glass surfaces, blending them into the exterior. There are also two bathrooms (one with the entrance from the master bedroom, the other from the hallway) and a closet. The built-up area of the house makes for 186 m2.</p>
                        <p>The owners were determined at the outset to preserve the natural setting — in their words, “considering the violence it is about to undergo and has already undergone”. They ruled out lawns and landscaping, decks and patios — the outside is appreciated from the interior. They wanted the house filled with light and sun, especially in winter, when they hoped it might enter “with as much force as possible”.</p>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col col-md-12 col-sm-12 col-xs-12">
                    <div class="prev-next">
                        <ul>
                            <li><a href="projects.html"><i class="fas fa-arrow-left"></i> Prev Project</a></li>
                            <li><a href="projects.html">Next Project <i class="fas fa-arrow-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Project Single Section-->

    <!--Call To Action-->
    <section class="call-to-action">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="column col-md-8 col-sm-12 col-xs-12">
                    <h4 class="text">Our team is always here to help. Contact us today to learn how.</h4>
                </div>
                <div class="btn-column col-md-4 col-sm-12 col-xs-12">
                    <a href="contact.html" class="theme-btn btn-style-six">Get in touch</a>
                </div>
            </div>
        </div>
    </section>

@endsection