@extends('site.template.base-withbread', ['title' => 'Les reunions'])

@section('cstyles')
    <link rel="stylesheet" href="{{ asset('assets/site/css/events.css') }}">
@endsection

@section('view-content')
    <div class="site-section">

        @if ($reunions->count())
            <div class="row p-4">
                @foreach ($reunions as $reunion)
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
                                            <h3 class="heading pt-3" style="font-size: 24px;">{{ ucfirst($reunion->intitule) }}
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
            <div class="p-4" >{{$reunions->links()}}</div>
        @else
            <div class="d-flex justify-content-center text-center">
                <h4 class="text-danger">Aucune reunions</h4>
            </div>
        @endif

        {{-- @if ($data->count() > 0)
            <div class="container bg-light p-3">
        <div class="row">
            @foreach ($data as $event)
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
                                    @if ($event->debut && $event->fin)
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
        </div>
        @else
        @endif --}}
    </div>
@endsection
