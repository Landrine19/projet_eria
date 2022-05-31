@extends('site.template.base-withbread',['title' => 'Les publications'])

@section('cstyles')
    <link rel="stylesheet" href="{{asset('assets/site/css/publications.css')}}">
@endsection

@section('view-content')
<div class="site-section">
    
    @if($data->count() > 0)
    <div class="container mt-3 mb-3">
        <div class="row bg-light p-5">
        @foreach($data as $publication)
            <div class="col-md-4">
                <div class="card p-3 mb-2">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row align-items-center">
                            <div class="ms-2 c-details">
                                <h6 class="mb-0">Journal : <span class="text-primary">{{$publication->journal}}</span></h6> 
                                <span>Année de parution : <span class="text-danger">{{$publication->annee_publication}}</span></span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <h3 class="heading">{{$publication->titre}}</h3>
                        <div class="mt-4">
                            <a href="{{route('publications.single',$publication->id)}}" class="btn btn-block btn-success">
                                voir
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
    @else 
    <div class="d-flex justify-content-center text-center">
        <h4 class="text-danger">Aucune publication pour l'instant</h4>
    </div>
    @endif
</div>
@endsection