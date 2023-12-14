@extends('site.layouts.site-default')

@section('content')
    <!--Page Title-->
    <section class="page-title" style="background-image:url({{asset('assets/site/images/bg-header.jpg')}}); margin-bottom:50px">
        <div class="auto-container">
            <h1>Sobre</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="/">Home</a></li>
                <li class="active">Sobre nós</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <!--About Section-->
		<section class="about-section">
			<div class="auto-container">
				<div class="row clearfix">
					<div class="content-column col-md-6 col-sm-12 col-xs-12">
						<div class="inner-column">
							<div class="sec-title style-two">
								<div class="sub-title">A vida das pessoas é moldada pela arquitetura</div>
								<h2>Criando estruturas que inspiram</h2>
								<div class="separator"></div>
							</div>
							<div class="text">
								<p>Seja reimaginando uma estrutura existente ou criando uma nova, nossa abordagem concretiza o maior valor de um edifício. No final, a solução de cada cliente é única e responde ao contexto, ao programa e às pessoas.</p>
							</div>
						</div>
					</div>
					<div class="image-column col-md-6 col-sm-12 col-xs-12">
						<div class="image">
							<img src="images/resource/about-2.png" alt="">
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--End About Section-->

		<!--News Section Section-->
		<section class="news-section-two">
			<div class="auto-container">
				<div class="row clearfix">
					
					<!--News Block Two-->
					<div class="news-block-two col-md-4 col-sm-6 col-xs-12">
						<div class="inner-box">
							<div class="lower-box">
								<h3>Nossa Missão</h3>
								<div class="text">
									<p>Comprometemo-nos a inspirar os nossos colaboradores a serem o melhor que podem ser, capacitando-os para projetar um mundo que priorize a experiência humana.</p>
								</div>
							</div>
						</div>
					</div>
					
					<!--News Block Two-->
					<div class="news-block-two col-md-4 col-sm-6 col-xs-12">
						<div class="inner-box">
							<div class="lower-box">
								<h3>Nossa visão</h3>
								<div class="text">
									<p>Aceitamos com confiança o nosso papel como parceiro especialista dos nossos clientes, orientando-os para o sucesso de sua empresa ou residência.</p>
								</div>
							</div>
						</div>
					</div>
					
					<!--News Block Two-->
					<div class="news-block-two col-md-4 col-sm-6 col-xs-12">
						<div class="inner-box">
							<div class="lower-box">
								<h3>Nossa estratégia</h3>
								<div class="text">
									<p>Nos desafiamos a ser uma referência no indústria de arquitetura e construção, visando sempre a satisfação final do cliente.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--End News Section Section-->

        <!--Team Section-->
		<section class="team-section">
			<div class="auto-container">

				<!--Sec Title-->
				<div class="sec-title centered">
					<h2>Conheça nossos time</h2>
					<div class="sub-title">Um prisma de perspectivas, paixões e talentos</div>
					<div class="separator"></div>
				</div>
				<!--End Sec Title-->

				<div class="row clearfix">

					<!--Team Member-->
					<div class="team-member col-md-4 col-sm-6 col-xs-12">
						<div class="inner-box">
							<div class="image">
								<img src="{{asset('assets/site/images/sobre.jpg')}}" alt="Luísa Macêdo">
							</div>
							<div class="lower-box">
								<h3><a href="#">Luísa Macêdo</a></h3>
								<div class="designation">Arquiteta</div>
								<ul class="social-icon-one">
									<li><a href="#"><span class="fab fa-instagram"></span></a></li>
									<li><a href="#"><span class="fab fa-linkedin"></span></a></li>
								</ul>
							</div>
						</div>
					</div>

					<!--Team Member-->
					<div class="team-member col-md-4 col-sm-6 col-xs-12">
						<div class="inner-box">
							<div class="image">
								<img src="images/resource/team-2.jpg" alt="" />
							</div>
							<div class="lower-box">
								<h3><a href="#">Trisha Dalton</a></h3>
								<div class="designation">Senior Architect</div>
								<ul class="social-icon-one">
									<li><a href="#"><span class="fab fa-facebook"></span></a></li>
									<li><a href="#"><span class="fab fa-twitter"></span></a></li>
									<li><a href="#"><span class="fab fa-instagram"></span></a></li>
									<li><a href="#"><span class="fab fa-linkedin"></span></a></li>
								</ul>
							</div>
						</div>
					</div>

					<!--Team Member-->
					<div class="team-member col-md-4 col-sm-6 col-xs-12">
						<div class="inner-box">
							<div class="image">
								<img src="images/resource/team-3.jpg" alt="" />
							</div>
							<div class="lower-box">
								<h3><a href="#">Brandon Edwards</a></h3>
								<div class="designation">Project Manager</div>
								<ul class="social-icon-one">
									<li><a href="#"><span class="fab fa-facebook"></span></a></li>
									<li><a href="#"><span class="fab fa-twitter"></span></a></li>
									<li><a href="#"><span class="fab fa-instagram"></span></a></li>
									<li><a href="#"><span class="fab fa-linkedin"></span></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--End Team Section-->
		
		<!--Clients Section-->
		<section class="clients-section grey-bg">
			<div class="auto-container">
				<div class="title-box">
					<div class="title">Nosso trabalho é definido por muito mais do que apenas reconhecimento</div>
					<h2>Vamos reinventar sua residência ou empresa com o poder do projeto estrutural</h2>
					<div class="text">Somos arquitetos, planejadores, engenheiros, estrategistas e especialistas do setor abrangendo diversos setores.</div>
					<div class="btns-box">
						{{-- <a href="contact.html" class="theme-btn btn-style-four">Junte-se à nossa empresa</a> --}}
						<a href="/contato" style="background-color:#384835" class="theme-btn btn-style-five">Entre em contato</a>
					</div>
				</div>
			</div>
		</section>
		<!--End Clients Section-->
@endsection