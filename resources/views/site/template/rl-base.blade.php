@extends('layouts.app')

@section('css')
    @include('site.template.assets.css')
    @yield('cstyles')
@endsection

@section('javascript')
    @include('site.template.assets.scripts')
    @yield('cjavascript')
@endsection

