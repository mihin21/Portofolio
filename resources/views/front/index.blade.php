<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('front/assets/styles/style.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <title>Portfolio</title>
</head>

<body>
    <div class="main ">
        <header class="header">
            <div class="container">
                <div class="row flex-end">
                    <button type="button" class="nav-toggler">
                        <span></span>
                    </button>
                    <nav class="nav">
                        <div class="nav-inner">
                            <ul>
                                <li><a href="#home" class="nav-item link-item">Acceuil</a></li>
                                <li><a href="#about" class="nav-item link-item">A propos</a></li>
                                <li><a href="#portfolio" class="nav-item link-item">Portfolio</a></li>
                                <li><a href="#contact" class="nav-item link-item">Contact</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
        <section class="home-section align-items-center active " id="home">
            <div class="container">
                @if ($message = Session::get('success'))
                   <h3 class="succes_message"> {{$message}}</h3>
                @endif
                <div class="row align-items-center">
                    <div class="home-text">
                        @foreach ($homeData as $Data )
                            <p>{{ $Data->salutation }}</p>
                            <h1><span>{{ $Data->first_name }} </span>{{ $Data->last_name }}</h1>
                            <h2>{{ $Data->status }}</h2>
                            <a href="#about" class="btn link-item">En savoir plus</a>
                            <a href="#portfolio" class="btn link-item">Portfolio</a>
                    </div>
                    <div class="home-img">
                        {{-- @if ($Data->picture == null) --}}
                        <div class="img-box">
                            <img src="{{ asset('/assets/accueil_profil/profil.png') }}" alt="profil">
                        </div>
                        {{-- @else
                        <div class="img-box">
                            <img src="{{ asset('/assets/Picture'.'/'.$Data->picture) }}" alt="{{ $Data->last_name }}">
                        </div>
                        @endif --}}
                    </div>
                        @endforeach
                </div>
            </div>
        </section>

        <section class="about-section sec-padding " id="about">
            <div class="container">
                <div class="row">
                    <div class="section-title">
                        <h2>A propos de moi</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($aboutData as $Data)
                <div class="about-img">
                    <div class="img-box">
                        {{-- <img src="{{ asset('/assets/Picture'.'/'.$Data->picture_about) }}" alt=""> --}}
                        <img src="{{ asset('/assets/accueil_profil/profil.png') }}" alt="profil">
                    </div>
                </div>
                <div class="about-text">
                    <p>{{ $Data->description }}</p>
                 @endforeach
                    <h3>Skills</h3>
                    <div class="skills">
                        @foreach($skills  as $skill )
                        <div class="skills-item">{{ $skill->skills }}</div>
                        @endforeach
                        <div class="about-tabs">
                            <button type="button" class="tab-item active" data-target="#education">formation</button>
                            <button type="button" class="tab-item" data-target="#experience">experience</button>
                        </div>

                        <div class="tab-content active" id="education">
                            @foreach ($formations as $formation )
                            <div class="timeline">
                                <div class="timeline-item">
                                    <span class="date">{{date('M-Y',strtotime($formation->start_date )) }} - {{date('M-Y',strtotime($formation->end_date )) }}</span>
                                    <h4>{{$formation->diplome  }} - <span>{{$formation->school  }}</span></h4>
                                    <p>{{$formation->description}}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="tab-content" id="experience">
                            @foreach ($experiences as $experience)
                            <div class="timeline">
                                <div class="timeline-item">
                                    <span class="date">{{date('M-Y',strtotime($experience->start_date )) }}@if ($experience->end_date === null)
                                       <p> A nos jours</p>
                                    @else
                                     - {{date('M-Y',strtotime($experience->end_date )) }}
                                    @endif</span>
                                    <h4>{{ $experience->diplome }} - <span>{{ $formation->school }}</span></h4>
                                    <p>{{ $experience->description }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @foreach ($cvs as $cv )
                        <a href="{{ asset('/assets/cv').'/'.$cv->cv}}" target="_blank" class="btn">Télécharger CV</a>
                        @endforeach
                        <a href="#contact" class="btn link-item">Contacts</a>
                    </div>
                </div>
        </section>

        <section class="portfolio-section sec-padding " id="portfolio">
            <div class="container">
                <div class="row">
                    <div class="section-title">
                        <h2>Réalisations</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="portfolio-item">
                        @foreach ($portfolios as $portfolio)
                            <div class="portfolio-item-thumbnail">
                                <img src="{{ asset('/assets/Picture'.'/'.$portfolio->picture)}}" alt="">
                            </div>
                            <h3 class="portfolio-item-title">{{ $portfolio->project_name }}</h3>
                            <button type="button" class="btn view-project-btn">
                                <a href="{{$portfolio->link}}" target="_blank"><span class="link_color">Voir le projet</span></a>
                            </button>
                            {{-- <div class="portfolio-item-details">
                                <div class="description">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio iusto magnam,
                                        temporibus perspiciatis ducimus totam? Eos, voluptatibus! Cum, ipsa tempore sunt
                                        iste doloribus provident maxime accusantium iusto amet ea, repudiandae molestias
                                        laboriosam? Nobis itaque neque eaque asperiores tempore hic aliquid?</p>
                                </div>
                                <div class="general-info">
                                    <ul>
                                        <li>Realisation - <span> 27 Octobre 2020</span></li>
                                        <li>Technologie utilisée - <span>Html, css, php</span></li>
                                        <li>Site - <span>landing page</span></li>
                                        <li>Url - <span><a href="" target="_blank">www.exemple.com</a></span></li>
                                    </ul>
                                </div>
                            </div> --}}
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <!-- contact -->
        <section class="section contact-section sec-padding " id="contact">
            <div class="container">
                <div class="row">
                    <div class="section-title">
                        <h2>Contactez-moi</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="contact-form">
                        <form action="{{ route('sendMail.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="input-group">
                                    <input type="text" class="input-control" name="nom" placeholder="Nom" required>
                                </div>
                                <div class="input-group">
                                    <input type="email" class="input-control" name="email" placeholder="Email" required>
                                </div>
                                <div class="input-group">
                                    <input type="text" class="input-control" name="sujet" placeholder="Sujet" required>
                                </div>
                                <div class="input-group">
                                    <textarea  placeholder="Message "  name="message" class="input-control" required></textarea>
                                </div>
                                <div class="submit-btn">
                                    <button type="submit" class="btn"> Envoyer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="contact-info">
                        @foreach($contacts as $contact)
                        <div class="contact-info-item">
                            <h3>Email</h3>
                            <p>{{ $contact->email }}</p>
                        </div>
                        <div class="contact-info-item">
                            <h3>Téléphone</h3>
                            <p>{{ $contact->number1 }} / {{ $contact->number2 }}</p>
                        </div>
                        <div class="contact-info-item">
                            <h3>Reseaux sociaux</h3>
                            <div class="social-links">
                                <a href="https://wa.me/+22675672644" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                                        class="bi bi-whatsapp " viewBox="0 0 16 16">
                                        <path
                                            d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                                    </svg>
                                </a>
                                <a href="https://github.com/mihin2020?tab=repositories" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                                        class="bi bi-github" viewBox="0 0 16 16">
                                        <path
                                            d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z" />
                                    </svg>
                                </a>
                                <a href="www.linkedin.com/in/hugues-aimé-mihin-586657143" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                                        class="bi bi-linkedin" viewBox="0 0 16 16">
                                        <path
                                            d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>
    {{-- <div class="portfolio-popup">
        <div class="pp-inner">
            <div class="pp-content">
                <div class="pp-header">
                    <button type="button" class="btn pp-close">close</button>
                    <div class="pp-thumbnail">
                        <img src="{{ asset('front/img/Education.png') }}" alt="">
                    </div>
                    <h3>Bibliotheque en ligne</h3>
                </div>
                <div class="pp-body">
                    <div class="description">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio iusto magnam, temporibus
                            perspiciatis ducimus totam? Eos, voluptatibus! Cum, ipsa tempore sunt iste doloribus
                            provident maxime accusantium iusto amet ea, repudiandae molestias laboriosam? Nobis itaque
                            neque eaque asperiores tempore hic aliquid?</p>
                    </div>
                    <div class="general-info">
                        <ul>
                            <li>Realisation - <span> 27 Octobre 2020</span></li>
                            <li>Technologie utilisée - <span>Html, css, php</span></li>
                            <li>Site - <span>landing page</span></li>
                            <li>Url - <span><a href="" target="_blank">www.exemple.com</a></span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <script src="{{asset('front/assets/js/main.js')}}"></script>
</body>
</html>
