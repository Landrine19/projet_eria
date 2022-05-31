@extends('site.template.base-withbread',['title' => "Information sur évenement"])


@section('view-content')
    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <p>
                        <img src="{{asset('assets/site/images/bg_1.jpg')}}" alt="Image" class="img-fluid">
                    </p>
                </div>
                <div class="col-lg-5 ml-auto align-self-center">
                        <h2 class="section-title-underline mb-5">
                            <span>DETAILS SUR EVENEMENT</span>
                        </h2>
                        
                        <p><strong class="text-black d-block">Titre:</strong> {{$data->intitule}}</p>
                        <p><strong class="text-black d-block">Lieu:</strong> {{$data->intitule}}</p>

                        <p class="mb-5">
                            <strong class="text-black d-block">Date:</strong> 
                            {{$data->date_evenement}}
                        </p>
                        <p class="mb-5">
                            <strong class="text-black d-block">Résumé:</strong>
                            {{$data->resume}}
                        </p>
                        
                    </div>
            </div>
        </div>
    </div>
@endsection