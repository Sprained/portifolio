<!DOCTYPE html>
<html lang="en">
<head>
    <title>Portfólio - Gabriel Resende</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Portfólio - Gabriel Resende">
    <meta name="author" content="Gabriel Resende">
    
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'> 
    
    <!-- FontAwesome JS -->
    <script defer src="assets/fontawesome/js/all.js"></script>
    
    <!-- Global CSS -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">   
    
    <!-- github calendar css -->
    <link rel="stylesheet" href="assets/plugins/github-calendar/github-calendar.css">

    <!-- Theme CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/styles.css">

    <!-- CSS -->
    <link rel="stylesheet" href="css/index.css">
    
</head> 

<body>
    <!-- ******HEADER****** --> 
    <header class="header">
        <div class="container clearfix">                       
            <img class="profile-image img-fluid float-left rounded-circle" src="storage/img/avatar.png" alt="profile image" />
            <!-- <div class="profile-image img-fluid float-left rounded-circle"></div> -->
            <div class="profile-content float-left">
                <h1 class="name">{{$info['nome_pes']}}</h1>
                <h2 class="desc">{{$info['cargo']}}</h2>   
                <ul class="social list-inline">
                    @foreach ($midias as $midia)
                        <li class="list-inline-item"><a href="{{$midia['link_midia']}}"><i class="fab {{$midia['nome_mid']}}"></i></a></li>
                    @endforeach
                </ul> 
            </div><!--//profile-->
            <!-- <a class="btn btn-cta-primary float-right" href="https://themes.3rdwavemedia.com/" target="_blank"><i class="fas fa-paper-plane"></i> Contact Me</a>               -->
        </div><!--//container-->
    </header><!--//header-->
    
    <div class="container sections-wrapper">
        <div class="row">
            <div class="primary col-lg-8 col-12">
                <section class="about section">
                    <div class="section-inner shadow-sm rounded">
                        <h2 class="heading">Sobre</h2>
                        <div class="content">
                            {!! $info['sobre'] !!}
                        </div><!--//content-->
                    </div><!--//section-inner-->                 
                </section><!--//section-->
    
               <section class="latest section">
                    <div class="section-inner shadow-sm rounded">
                        <h2 class="heading">Últimos Projetos</h2>
                        <div class="content">    
                                                
                            @foreach($projetos as $projeto)
                            <div class="item">
                                <h3 class="title"><a href="{{$projeto['link'] ? $projeto['link'] : '#'}}" target="_blank">{{$projeto['titulo']}}</a>@foreach($projeto['tags'] as $tag) <span class="badge {{$tag['class_css']}} mr-2">{{$tag['descricao']}}</span>@endforeach</h3>

                                <p class="summary">{{$projeto['descricao']}}</p>

                                {!!
                                    $projeto['link'] ? '<p><a class="more-link" href="' . $projeto['link'] . '" target="_blank"><i class="fas fa-external-link-alt"></i>Acesse o Projeto</a></p>' : null
                                !!}
                            </div><!--//item-->
                            @endforeach

                            <a class="btn btn-cta-secondary" href="{{$git['link_midia']}}">Mais no GitHub <i class="fas fa-chevron-right pt-1"></i></a>
                            
                        </div><!--//content-->  
                    </div><!--//section-inner-->                
                </section><!--//section-->
                
                <section class="experience section">
                    <div class="section-inner shadow-sm rounded">
                        <h2 class="heading">Experiência</h2>
                        <div class="content">
                            <div class="item">
                                <h3 class="title">Co-fundador e Desenvolvedor Back-end - <span class="place">Nexus Developers</span> <span class="year">(2020 - Momento)</span></h3>
                                <ul>
                                    <li>- Desenvolvimento de APIs em Laravel e NodeJS;</li>
                                    <li>- Gestão de Projetos (com metodologia ágil SCRUM);</li>
                                    <li>- Suporte na correção de bugs e otimização de códigos;</li>
                                </ul>
                            </div><!--//item-->

                            <div class="item">
                                <h3 class="title">Desenvolvedor Back-end - <span class="place">IBGM</span> <span class="year">(2020 - 2021)</span></h3>
                                <ul>
                                    <li>- Desenvolvimento em API com a tecnologia Laravel;</li>
                                    <li>- Participação no projeto QI (aplicativo para perguntas e respostas da faculdade);</li>
                                </ul>
                            </div><!--//item-->

                            <div class="item">
                                <h3 class="title">Gerente de Projetos e Desenvolvedor Back-end - <span class="place">BubbleDev</span> <span class="year">(2019 - 2020)</span></h3>
                                <p>Fundador da startup BubbleDev, formada por 5 desenvolvedores, os quais desenvolveram o aplicativo LovelyPet utilizando as tecnologias Android Studio e Firebase. Nosso projeto foi incubado pela Prefeitura de Jaboatão.</p>
                            </div><!--//item-->
                            
                            <div class="item">
                                <h3 class="title">Administrador - <span class="place">FR Vida e Saúde</span> <span class="year">(2017 - 2017)</span></h3>
                                <ul>
                                    <li>- Administração de funcionários;</li>
                                    <li>- Fechamento de contas;</li>
                                    <li>- Gerenciamento dos recursos da empresa.</li>
                                    <li>- Atendimento ao cliente.</li>
                                </ul>
                            </div><!--//item-->
                            
                        </div><!--//content-->  
                    </div><!--//section-inner-->                 
                </section><!--//section-->
                <section class="github section">
                    <div class="section-inner shadow-sm rounded">
                        <h2 class="heading">GitHub</h2>

                        <div id="github-graph" class="github-graph">

                        </div><!--//github-graph-->
                        
                    </div><!--//secton-inner-->
                </section><!--//section-->
            </div><!--//primary-->
            <div class="secondary col-lg-4 col-12">
                 <aside class="info aside section">
                    <div class="section-inner shadow-sm rounded">
                        <h2 class="heading sr-only">Basic Information</h2>
                        <div class="content">
                            <ul class="list-unstyled">
                                <li><i class="fas fa-map-marker-alt"></i><span class="sr-only">Location:</span>{{$info['localizacao']}}</li>
                                <li><i class="fas fa-envelope"></i><span class="sr-only">Email:</span><a href="mailto:{{$info['email']}}">{{$info['email']}}</a></li>
                            </ul>
                        </div><!--//content-->  
                    </div><!--//section-inner-->                 
                </aside><!--//aside-->
                
                <aside class="skills aside section">
                    <div class="section-inner shadow-sm rounded">
                        <h2 class="heading">Skills</h2>
                        <div class="content">
                            <div class="skillset">
                                @foreach($skills as $skill)
                                <div class="item">
                                    <h3 class="level-title">{{$skill['nome_hab']}}<span class="level-label" data-toggle="tooltip" data-placement="left" data-animation="true" title="{{$skill['descricao']}}"><i class="fas fa-info-circle"></i>{{$skill['nivel']}}</span></h3>
                                    <div class="level-bar">
                                        <div class="level-bar-inner" data-level="{{$skill['barra_progresso']}}%">
                                        </div>                                      
                                    </div><!--//level-bar-->                                 
                                </div><!--//item-->
                                @endforeach
                                
                                <p><a class="more-link" href="{{$git['link_midia']}}"><i class="fas fa-external-link-alt"></i>Mais no GitHub</a></p> 
                            </div>              
                        </div><!--//content-->  
                    </div><!--//section-inner-->                 
                </aside><!--//section-->
                
                <aside class="education aside section">
                    <div class="section-inner shadow-sm rounded">
                        <h2 class="heading">Educação</h2>
                        <div class="content">
                            @foreach($educacoes as $educacao)
                            <div class="item">                      
                                <h3 class="title"><i class="fas fa-graduation-cap"></i> {{$educacao['titulo']}}</h3>
                                <h4 class="university">{{$educacao['subtitulo']}} <br><span class="year">{{$educacao['status'] ? 'Concluído' : 'Em andamento'}} {{$educacao['data_inicio'] ? ' - (' . $educacao['data_inicio'] . '-' . $educacao['data_final'] . ')' : null }}</span></h4>
                            </div><!--//item-->
                            @endforeach

                        </div><!--//content-->
                    </div><!--//section-inner-->
                </aside><!--//section-->
              
            </div><!--//secondary-->    
        </div><!--//row-->
    </div><!--//masonry-->
    
    <!-- ******FOOTER****** --> 
    <footer class="footer">
        <div class="container text-center">
                <!--/* This template is free as long as you keep the attribution link below. Thank you for your support. :) If you'd like to use the template without the attribution, you can buy the commercial license via our website: themes.3rdwavemedia.com */-->
                <small class="copyright">Designed with <i class="fas fa-heart"></i> by <a href="https://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for developers</small>
        </div><!--//container-->
    </footer><!--//footer-->
 
    <!-- Javascript -->          
    <script type="text/javascript" src="assets/plugins/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="assets/plugins/popper.min.js"></script> 
    <script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>    
    <script type="text/javascript" src="assets/plugins/jquery-rss/dist/jquery.rss.min.js"></script> 
    <!-- github calendar plugin -->
    <script type="text/javascript" src="assets/plugins/github-calendar/github-calendar.min.js"></script>
    <!-- custom js -->
    <script type="text/javascript" src="assets/js/main.js"></script>
</body>
</html> 