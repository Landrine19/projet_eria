@extends('layouts.app')

@section('content')
<div class="hold-transition lockscreen">
    <div class="lockscreen-wrapper">
        <div class="lockscreen-logo">
            <a href="#"><b>AKR</b>DM</a>
        </div>
        <!-- User name -->
        <div class="lockscreen-name">{{$user->name}}</div>

        <!-- START LOCK SCREEN ITEM -->
        <div class="lockscreen-item">
            <!-- lockscreen image -->
            <div class="lockscreen-image">
                 <img src="{{asset('assets/dist/img/user1-128x128.jpg')}}" alt="User Image">
            </div>
            <!-- /.lockscreen-image -->
            <div class="lockscreen-credentials">
                <p> Votre mot de passe a été restauré avec succès.</p> 
                <p> Consultez votre mail pour vos nouveaux accès</p>
            </div>
            <!-- lockscreen credentials (contains the form) -->
            <!-- /.lockscreen credentials -->

        </div>
    </div>
</div>
@endsection