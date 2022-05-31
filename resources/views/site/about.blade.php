@extends('site.template.base-withbread',['title' => 'A propos'])

@section('view-content')
<div class="container pt-5 mb-5">
            <div class="row">
              <div class="col-lg-4">
                <h2 class="section-title-underline">
                  <span>{{$data->aboutSection->title}}</span>
                </h2>
              </div>
              <div class="col-lg-8">
                <p>
                    {!!$data->aboutSection->content!!}
                </p>
              </div>
            </div>
          </div> 

    
    <div class="site-section">
      <div class="container">
        <div class="row mb-5 justify-content-center text-center">
          <div class="col-lg-4 mb-5">
            <h2 class="section-title-underline mb-5">
              <span>Nos membres</span>
            </h2>
        			<a href="{{route('annuaire')}}" class="text-left">Voir annuaire</a>

          </div>
        </div>
        <div class="row">
          @if($data->members->count() > 0)
              @foreach($data->members as $member)
                  <div class="col-lg-4 col-md-6 mb-5 mb-lg-5">
                    <div class="feature-1 border person text-center">
                        <img src="{{asset($member->user->avatar ? 'storage/'.$member->user->avatar :  'assets/site/images/avatar.jpg')}}" alt="Image" class="img-fluid">
                      <div class="feature-1-content">
                        <h2>{{$member->nom." ".$member->prenoms }}</h2>
                        <span class="position mb-3 d-block">{{$member->specialite}}</span>    
                      </div>
                    </div>
                  </div>
              @endforeach
          @else
              <h4 class="text-danger">
                  Aucun membre inscrit
              </h4>
          @endif 
        </div>
      </div>
    </div>
@endsection