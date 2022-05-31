@extends('site.template.base-withbread',['title' => 'Nous contacter'])

@section('view-content')

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="fname">First Name</label>
                <input type="text" id="fname" class="form-control form-control-lg">
            </div>
            <div class="col-md-6 form-group">
                <label for="lname">Last Name</label>
                <input type="text" id="lname" class="form-control form-control-lg">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="eaddress">Email Address</label>
                <input type="text" id="eaddress" class="form-control form-control-lg">
            </div>
            <div class="col-md-6 form-group">
                <label for="tel">Tel. Number</label>
                <input type="text" id="tel" class="form-control form-control-lg">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 form-group">
                <label for="message">Message</label>
                <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <input type="submit" value="Send Message" class="btn btn-primary btn-lg px-5">
            </div>
        </div>
    </div>
@stop
