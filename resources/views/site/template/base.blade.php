@extends('layouts.app')

@section('css')
    @include('site.template.assets.css')
    @yield('cstyles')
@endsection

@section('javascript')
    @include('site.template.assets.scripts')
    @yield('cjavascript')
@endsection

@section('content')
    @include('site.template.partials._header')
    @yield('page-content')
    @include('site.template.partials._footer')
@endsection