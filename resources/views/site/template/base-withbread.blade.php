@extends('site.template.base')

@section('page-content')
    @include('site.template.partials._breadcrumb')
    @yield('view-content')
@endsection