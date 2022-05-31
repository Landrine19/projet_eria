@extends('site.template.base-withbread', ['title' => 'Information sur membre'])


@php
$projets = App\Models\Projet::where('membre_id', $data->user->membre->id)->get();
$publications = App\Models\Publication::where('membre_id', $data->user->membre->id)->get();
$reunions = App\Models\EvenementMembre::where('role', 'moderateur')
->where('membre_id', $data->user->membre->id)
->with('evenement')->get();
@endphp


@section('view-content')
    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-2">
                    <p>
                        <img src="{{ asset('storage/' . $data->user->avatar ?? 'assets/site/images/avatar.jpg') }}"
                            alt="Image" class="img-fluid">
                    </p>
                </div>
                <div class="col-lg-6 ml-auto align-self-center">
                    <h2 class="section-title-underline mb-5">
                        <span>DETAILS SUR MEMBRE</span>
                    </h2>
                    <p><strong class="text-black d-block">Nom:</strong> {{ $data->nom }}</p>
                    <p><strong class="text-black d-block">Prénom(s):</strong> {{ $data->prenoms }}</p>
                    <p><strong class="text-black d-block">Spécialité(s):</strong> {{ $data->specialite }}</p>

                </div>
            </div>

            @if ($projets->count())
                <h3 class="m-4 text-danger">Projets</h3>
                <div class="row">
                    @foreach ($projets as $projet)
                        <div class="col-md-4">
                            <div class="card p-3 mb-2 h-100 d-flex justify-content-between">
                                <div>
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
                                </div>
                                <a href="{{ route('projets.single', $projet->id) }}" class="btn btn- btn-primary mt-2">
                                    voir
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif


            @if ($publications->count())
                <h3 class="m-4 text-danger">Publications</h3>
                <div class="row">
                    @foreach ($publications as $publication)
                        <div class="col-md-4">
                            <div class="card p-3 mb-2">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-row align-items-center">
                                        <div class="ms-2 c-details">
                                            <h6 class="mb-0">Journal : <span
                                                    class="text-primary">{{ $publication->journal }}</span></h6>
                                            <span>Année de parution : <span
                                                    class="text-danger">{{ $publication->annee_publication }}</span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h3 class="heading">{{ $publication->titre }}</h3>
                                    <div class="mt-4">
                                        <a href="{{ route('publications.single', $publication->id) }}"
                                            class="btn btn-block btn-success">
                                            voir
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            @if ($reunions->count())
                <h3 class="m-4 text-danger" >Reunions planifiées</h3>
                <div class="row">
                    @foreach ($reunions as $ev)

                    @php 
                        $reunion = $ev->evenement->first();
                    @endphp

                        <div class="col-md-4 mb-3">
                            <div class="card p-3 mb-2 h-100 d-flex justify-content-between">
                                <div>
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex flex-row align-items-center">
                                            <div class="ms-2 c-details">
                                                <h6 class="mb-0">Lieu : <span
                                                        class="text-primary">{{ $reunion->lieu }}</span>
                                                </h6>
                                                <span>Date : <span
                                                        class="text-danger">{{ $reunion->date_evenement }}</span></span>
                                                <h3 class="heading pt-3" style="font-size: 24px;">
                                                    {{ ucfirst($reunion->intitule) }}
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <div>
                                        <a href="{{ route('site.reunions.browse', $reunion->id) }}"
                                            class="btn btn-block btn-success">
                                            voir
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection
