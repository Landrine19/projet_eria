@extends('back.app.template.base',['title' => "Tableau de bord"])

@section('head')
 <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('assets/back/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/back/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{(asset('assets/back/plugins/datatables-buttons/css/buttons.bootstrap4.min.css'))}}">
@endsection


@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-check"></i> Tableau de bord
        </h1>
@endsection        

@section('content')
 <!-- Default box -->
<div class="page-content browse container-fluid">
    @include('voyager::alerts')
    <div class="row">
      <div class="col-lg-6 col-6 card">
        <!-- small box -->
        <div class="card-body border-info">
          <div class="inner">
            <h3>{{$data->nbr_rec}}</h3>

            <p>Reunions en cours</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="{{url('/reunions')}}" class="btn btn-sm btn-primary">Mes reunions <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-6 col-6 card border">
        <!-- small box -->
        <div class="card-body border-success">
          <div class="inner">
            <h3>{{$data->nbr_pubs}}</h3>

            <p>Mes publications</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="{{url('/publications')}}" class="btn btn-sm btn-primary">voir mes publications <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-6 col-6 card">
        <!-- small box -->
        <div class="card-body border-warning">
          <div class="inner">
            <h3>{{$data->nbr_prj}}</h3>

            <p>Mes projets</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="{{url('/projets')}}" class="btn btn-sm btn-primary">Voir <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-6 col-6 card">
        <!-- small box -->
        <div class="card-body border-danger">
          <div class="inner">
            <h3>{{$data->nbr_offs}}</h3>

            <p>Mes offres</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="{{url('/offres')}}" class="btn btn-sm btn-primary">Voir <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
</div>
</div>
@endsection