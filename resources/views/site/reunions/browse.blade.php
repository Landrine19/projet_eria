@extends('site.template.base-withbread', ['title' => 'Information sur publication'])

@section('view-content')
    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <h2 class="section-title-underline mb-5">
                        <span>DETAILS SUR LA REUNION</span>
                    </h2>

                    <p><strong class="text-black d-block">Titre:</strong> {{ $reunion->intitule }}</p>
                    <p class="mb-5">
                        <strong class="text-black d-block">Date:</strong>
                        {{ $reunion->date_evenement }}
                    </p>
                    <p class="mb-5">
                        <strong class="text-black d-block">Résumé:</strong>
                        {{ $reunion->resume }}
                    </p>

                </div>
                <div class="col-lg-5">
                    @if ($reunion->fichiers->count())
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Fichiers</h3>
                            </div>
                            <div class="col-md-12">
                                <ul>
                                    @foreach ($reunion->fichiers as $fichier)
                                        <li>
                                            <span>
                                                <span class="voyager-file-text" style="font-size: 20px;"></span>
                                                <a href="/storage/{{ $fichier->chemin }}">{{ $fichier->name }}</a>
                                            </span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    @if ($reunion->compterendus->count())
                        <div class="row">
                            <div class="col-md-12" style="margin-bottom: 18px;">
                                <h2>Compte rendus</h2>
                            </div>
                            @foreach ($reunion->compterendus as $cp)
                                <div class="col-md-12">
                                    <h4>{{ $cp->libelle }}</h4>
                                </div>
                                <ul>
                                    @foreach ($cp->rubriques as $rubrique)
                                        <li>{{ $rubrique->libelle }}</li>
                                    @endforeach
                                </ul>
                                <hr>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
