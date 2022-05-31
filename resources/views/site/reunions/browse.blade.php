@extends('site.template.base-withbread',['title' => "Information sur publication"])

@section('view-content')
    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 m-auto align-self-center">
                        <h2 class="section-title-underline mb-5">
                            <span>DETAILS SUR LA REUNION</span>
                        </h2>
                        
                        <p><strong class="text-black d-block">Titre:</strong> {{$reunion->intitule}}</p>
                        <p class="mb-5">
                            <strong class="text-black d-block">Date:</strong> 
                            {{$reunion->date_evenement}}
                        </p>
                        <p class="mb-5">
                            <strong class="text-black d-block">Résumé:</strong>
                            {{$reunion->resume}}
                        </p>
                        
                    </div>
            </div>
        </div>
    </div>
@endsection