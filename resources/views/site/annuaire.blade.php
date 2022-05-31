@extends('site.template.base-withbread',['title' => 'Nos membres'])

@section('view-content')
    <div class="site-section">
      <div class="container">
        <div class="row mb-2 justify-content-center text-center">
          <div class="col-lg-12 mb-2">
            <h2 class="section-title-underline mb-5">
              <span>Nos membres</span>
            </h2>
          </div>
          
        </div>
         <!-- Another variation with a button -->
        @if($data->count() > 0)
        <div class="row">
          @foreach($data as $membre)
            <div class="col-lg-4 col-md-6 mb-5 mb-lg-5">
              <div class="feature-1 border person text-center bg-light">
                  <img src="{{asset('storage/'.$membre->user->avatar ?? 'assets/site/images/avatar.jpg')}}" alt="Image" class="img-fluid">
                  <div class="feature-1-content">
                    <h3 class="text-bold">{{$membre->nom .' '.$membre->prenoms}}</h2>
                    <hr>
                    <h5>
                      <span class="text-danger">Spécialité : </span>
                      {{$membre->specialite}}
                    </h5>
                    <hr>
                    <h5>
                      <span class="text-danger">Grade : 
                      </span>
                      @php 
                        $ct = $membre->postes->count();
                      @endphp  
                      @if($ct > 0)
                        {{$membre->postes[$ct - 1]->libelle}},  
                      @endif
                    </h5>  
                    <hr>
                    <h5>
                      <span class="text-danger">Contacts : </span> 
                      <ul>
                          @foreach($membre->contacts as $contact)
                            <li> <span>{{$contact->typecontact->intitule}} : </span> {{$contact->contact}} </li>
                          @endforeach
                      </ul>
                    </h5>    
                  </div>
                  <hr>
                  <a href="{{route('annuaire.single',$membre->id)}}" class="btn btn-sm btn-primary m-3">Voir détails</a>
              </div>
            </div>
          @endforeach
        </div>
        @else
        <div class="d-flex justify-content-center text-center">
            <h4 class="text-danger">Aucun membre pour l'instant</h4>
        </div> 
        @endif
        <div class="d-flex justify-content-center">
            {{$data->links()}}
        </div>
      </div>
    </div>
@endsection