@extends('site.template.n-base',['title' => 'Accueil'])

@section('cstyles')
    <link rel="stylesheet" href="{{ asset('assets/site/css/events.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/slider.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/offres.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/publications.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/projets.css') }}">
@endsection


@section('page-content')
    <div class="hero-slide owl-carousel site-blocks-cover">
        @foreach ($data['slides'] as $slide)
            @php
                $sl = str_replace('\\', '/', $slide->photo);
                $photo = "storage/$sl";
                
            @endphp
            <div class="intro-section" style="background-image: url('{{ asset('' . $photo . '') }}');">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12 mx-auto text-center" data-aos="fade-up">
                            <h1>{{ $slide->title }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="section-bg mt-4 style-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <h2 class="section-title-underline style-2">
                        <span>Qui sommes nous?</span>
                    </h2>
                </div>
                <div class="col-lg-8">
                    <span class="style-2" style="max-height: 150px; color:white">
                        @if ($data['about'])
                            {!! $data['about']->content !!}
                        @endif
                    </span>
                    <p><a href="{{ route('about') }}" style="font-weight: bold;">Lire plus</a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="site-section">
        <div class="container">
            <div class="row mb-5 justify-content-center text-center">
                <div class="col-lg-6 mb-5">
                    <h2 class="section-title-underline mb-3">
                        <span>Nos évènements</span>
                    </h2>
                    <p style="font-weight: 700; color: black;" >Ici, notre agenda d'évènements planifiés pour les prochains jours</p>
                    <a href="{{ route('evenements') }}" class="text-left" style="font-weight: 700;">Voir tous les evenements</a>
                </div>
            </div>
            @if (count($data['events']) > 0)
                <div class="container bg-light p-3">
                    <div class="row">
                        @foreach ($data['events'] as $event)
                            @include('site.partials.evenement-item')
                        @endforeach
                    </div>
                </div>
            @else
                <div class="d-flex justify-content-center">
                    <h3 class="text-center text-danger"> Aucun évenement programmé pour l'instant</h3>
                </div>
            @endif
        </div>
    </div>
    </div>
    <div class="site-section">
        <div class="container">
            <div class="row mb-5 justify-content-center text-center">
                <div class="col-lg-6 mb-5">
                    <h2 class="section-title-underline mb-3">
                        <span>Nos publications</span>
                    </h2>
                    <p style="font-weight: 700; color: black;" >Liste des publications éffectuées</p>
                    <a href="{{ route('publications') }}" class="text-left">Voir toutes nos publications</a>
                </div>
            </div>

            @if (count($data['publications']) > 0)
                <div class="container mt-3 mb-3">
                    <div class="row bg-light p-5">
                        @foreach ($data['publications'] as $publication)
                            @include('site.partials.publication-item')
                        @endforeach
                    </div>
                </div>
            @else
                <div class="d-flex justify-content-center">
                    <h3 class="text-center text-danger"> Aucune publication faite pour l'instant</h3>
                </div>
            @endif
        </div>
    </div>
    </div>
    <div class="site-section">
        <div class="container">
            <div class="row mb-5 justify-content-center text-center">
                <div class="col-lg-6 mb-5">
                    <h2 class="section-title-underline mb-3">
                        <span>Nos offres</span>
                    </h2>
                    <p style="font-weight: 700; color: black;"  >Liste de nos offres de stage, de thèse et autres offres</p>
                    <a href="{{ route('offres') }}" class="text-left">Voir toutes nos offres</a>
                </div>
            </div>

            @if (count($data['offres']) > 0)
                <div class="container-fluid card-offers bg-light my-4 p-3" style="position: relative;">
                    <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
                        @foreach ($data['offres'] as $offre)
                            <div class="col-3 m-3 p-2">
                                <div class="card h-100 shadow-sm"> <img
                                        src="{{ asset('storage/information/October2021/IGRgzQ6o2Ed9jznWwES5.png') }}"
                                        class="card-img-top" alt="...">
                                    <div class="label-top shadow-sm">{{ $offre->type }}</div>
                                    <div class="card-body">
                                        <div class="clearfix mb-3">
                                            <span class="float-start price-hp">Date limite</span>
                                            <span class="float-end">
                                                <a class="text-danger small" href="#">
                                                    {{ date_format(date_create($offre->fin), 'd/m/Y') }}
                                                </a>
                                            </span>
                                        </div>
                                        <h5 class="card-title">{{ $offre->titre }}</h5>
                                        <div class="text-center my-4"> <a href="#" class="btn btn-warning">Détails</a>
                                        </div>
                                        <div class="clearfix mb-1"> <span class="float-start"><i
                                                    class="far fa-question-circle"></i></span> <span
                                                class="float-end"><i class="fas fa-plus"></i></span> </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="d-flex justify-content-center">
                    <h3 class="text-center text-danger"> Aucun évènement de prévu pour le moment</h3>
                </div>
            @endif
        </div>
    </div>
    </div>
    <div class="site-section">
        <div class="container">
            <div class="row mb-5 justify-content-center text-center">
                <div class="col-lg-6 mb-5">
                    <h2 class="section-title-underline mb-3">
                        <span style="font-weight: 700; color: black;" >Nos projets en cours</span>
                    </h2>
                    <p style="font-weight: 700; color: black;"  >Nos projets déjà réalisés</p>
                    <a href="{{ route('projets') }}" class="text-left">Voir tous les projets</a>
                </div>
            </div>

            @if (count($data['projects']) > 0)
                <div class="container mt-3 mb-3">
                    <div class="row bg-light p-5">
                        @foreach ($data['projects'] as $projet)
                            <div class="col-md-4">
                                <div class="card p-3 mb-2">
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex flex-row align-items-center">
                                            <div class="icon"> <i class="bx bxl-mailchimp"></i> </div>
                                            <div class="ms-2 c-details">
                                                <span>Fin : {{ $projet->fin }}</span>
                                            </div>
                                        </div>
                                        <div class="badge text-success"> <span>{{ $projet->statut }}</span> </div>
                                    </div>
                                    <div class="mt-2">
                                        <h5 class="heading">{{ $projet->titre }}</h5>
                                    </div>
                                    <a href="{{ route('projets.single', $projet->id) }}"
                                        class="btn btn-sm btn-primary mt-2">
                                        voir
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="d-flex justify-content-center">
                    <h3 class="text-center text-danger"> Aucun évènement de prévu pour le moment</h3>
                </div>
            @endif
        </div>
    </div>
    </div>
    <div class="site-section">
        <div class="container">
            <div class="row mb-5 justify-content-center text-center">
                <div class="col-lg-6 mb-5">
                    <h2 class="section-title-underline mb-3">
                        <span>Nos partenaires</span>
                    </h2>
                </div>
            </div>
            <!-- Another variation with a button -->
            @if (count($data['partenaires']) > 0)
                <div class="row">
                    @foreach ($data['partenaires'] as $patener)
                        <div class="col-lg-3 col-md-3 mb-5 mb-lg-5">
                            <div class="feature-1 border person text-center bg-light">
                                <img src="{{ asset('storage/' . $patener->logo) }}" alt="Image" class="img-fluid">
                                <div class="feature-1-content">
                                    <h3 class="text-bold">{{ $patener->titre }}</h2>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="d-flex justify-content-center text-center">
                    <h4 class="text-danger">Aucun partenaire pour l'instant</h4>
                </div>
            @endif
        </div>
    </div>
@endsection
