@extends('site.template.base-withbread',['title' => 'Nos offres'])

@section('cstyles')
    <link rel="stylesheet" href="{{asset('assets/site/css/offres.css')}}">
@endsection

@section('view-content')
<div class="site-section">
    @if($data->count() > 0)
    <div class="container-fluid card-offers bg-light my-4 p-3" style="position: relative;">
        <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
            @foreach($data as $offre)
            <div class="col-3 m-3 p-2">
                <div class="card h-100 shadow-sm"> <img src="{{asset('storage/information/October2021/IGRgzQ6o2Ed9jznWwES5.png')}}" class="card-img-top" alt="...">
                    <div class="label-top shadow-sm">{{$offre->type}}</div>
                    <div class="card-body">
                        <div class="clearfix mb-3"> 
                            <span class="float-start price-hp">Date limite</span> 
                            <span class="float-end">
                                <a class="text-danger small" href="#">
                                    {{date_format(date_create($offre->fin),'d/m/Y') }}
                                </a>
                            </span> 
                        </div>
                        <h5 class="card-title">{{$offre->titre}}</h5>
                        <div class="text-center my-4"> <a href="{{route('offres.single',$offre->id)}}" class="btn btn-warning">Détails</a> </div>
                        <div class="clearfix mb-1"> <span class="float-start"><i class="far fa-question-circle"></i></span> <span class="float-end"><i class="fas fa-plus"></i></span> </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @else 
    <div class="d-flex justify-content-center text-center">
        <h4 class="text-danger">Aucune offre pour l'instant</h4>
    </div>
    @endif
</div>
@endsection