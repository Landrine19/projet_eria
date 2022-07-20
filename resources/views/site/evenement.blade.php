@extends('site.template.base-withbread',['title' => 'Les évènements'])



@section('cstyles')
    <link rel="stylesheet" href="{{asset('assets/site/css/events.css')}}">
@endsection

@php
    $data = App\Models\Evenement::paginate(10);
@endphp

@section('view-content')
<div class="site-section">
    @if($data->count() > 0)
    <div class="container bg-light p-3">
        <div class="row">
            @foreach($data as $event)
            @php
                $date = date_create($event->date_evenement);
            @endphp 
            <div class="col-lg-4">
                <div class="card card-margin">
                    <div class="card-header no-border">
                        <h5 class="card-title">{{$event->type}}</h5>
                    </div>
                    <div class="card-body pt-0">
                        <div class="widget-49">
                            <div class="widget-49-title-wrapper">
                                <div class="widget-49-date-primary">
                                    <span class="widget-49-date-day">{{date_format($date, 'd')}}</span>
                                    <span class="widget-49-date-month">{{substr(date_format($date, 'F'), 0, 3)}}</span>
                                </div>
                                <div class="widget-49-meeting-info">
                                    <span class="widget-49-pro-title text-warning">{{$event->typeevenement->libelle}}</span>
                                    @if($event->debut && $event->fin)
                                    <span class="widget-49-meeting-time">Du {{$event->debut}} au {{$event->fin}}</span>
                                    @else
                                    <span class="widget-49-meeting-time">{{$event->lieu}}</span>
                                    @endif
                                </div>
                            </div>
                            <ol class="widget-49-meeting-points">
                                <li class="widget-49-meeting-item">
                                    <span>
                                        {{$event->intitule}}
                                    </span>
                                </li>
                            </ol>
                            <div class="widget-49-meeting-action">
                                <a href="{{route('evenements.single',$event->id)}}" class="btn btn-sm btn-flash-border-primary">Détails</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{$data->links()}}
    </div>
    @else 
    <div class="d-flex justify-content-center text-center">
        <h4 class="text-danger">Aucun évènement l'instant</h4>
    </div>
    @endif
</div>
@endsection