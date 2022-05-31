@extends('vendor.voyager.template.browse-template')

@php
$data = App\Models\Offre::paginate(9);
// dd($data);
@endphp

@section('title')
    Liste des offres
@endsection

@section('add-items')
    <a href="/admin/offres/create" class="btn btn-success btn-add-new">
        <i class="voyager-plus"></i> <span>Ajouter une offre</span>
    </a>
@endsection

@section('items')
    @foreach ($data as $item)
        <div class="col-md-4">
            <div class="card-c p-3 mb-2">
                <div class="d-flex-c justify-content-between-c">
                    <div class="d-flex-c flex-row-c align-items-center-c">
                        <div class="icon-c"> <i class="bx-c icon voyager-tag"></i>
                        </div>
                        <div class="ms-2-c c-details">
                            <h4 class="mb-0-c">{{ ucfirst($item->titre) }}</h4>
                            @php
                                $colors = [
                                    'stage' => 'red',
                                    'emploi' => 'green',
                                    'these' => 'blue',
                                ];
                            @endphp
                            <span
                                style="color: {{ $colors[strtolower($item->type)] }}; font-size:15px;">{{ ucfirst($item->type) }}</span>
                            <span> {{ $item->heure_evenement }}</span>
                        </div>
                    </div>
                    <div class="badge-c"><button title="Supprimer" id="{{ $item->id }}"
                            class="btn btn-danger btn-sm delete" data-toggle="modal" data-target="#delete">
                            <i class="voyager-trash"></i>
                        </button></div>
                </div>
                <div class="mt-5">
                    <div>
                        <div style="margin-bottom: 20px;">
                            {{ Str::limit($item->description, 50, ' ...') }}
                        </div>
                        <div style="display: flex; justify-content: space-between; align-items: center">
                            <div class="mt-3">
                                {{ Str::limit($item->lieu, 20, ' ...') }}</div>
                            <div><a href="/admin/offres/{{ $item->id }}/edit"  class="btn btn-sm bg-info">
                                    <i class="voyager-pen"></i>
                                </a>
                                <a href="/admin/offres/{{ $item->id }}" class="btn btn-sm btn-primary">Parcourir</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="position: absolute; bottom: 15px; left: 15px;"><img style="border-radius: 25px;"
                        src="{{ asset('storage/' . $item->membre->user->avatar) }}" width="40px" height="40px">
                    {{ ucfirst($item->membre->user->name) }}</div>
            </div>
        </div>
    @endforeach
@endsection

@section('items-link')
    {{ $data->links() }}
@endsection

@section('add_scripts')
    <script>
        actionData.name = "offres";
    </script>
@endsection
