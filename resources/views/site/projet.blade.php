@extends('site.template.base-withbread',['title' => 'Les projets'])

@section('cstyles')
    <link rel="stylesheet" href="{{ asset('assets/site/css/projets.css') }}">
@endsection

@section('view-content')
    <div class="site-section">
        @if ($data->count() > 0)
            <div class="container mt-3 mb-3">
                <div class="row bg-light p-5">
                    @foreach ($data as $projet)
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
            </div>
        @else
            <div class="d-flex justify-content-center text-center">
                <h4 class="text-danger">Aucun projet pour l'instant</h4>
            </div>
        @endif
    </div>
@endsection
