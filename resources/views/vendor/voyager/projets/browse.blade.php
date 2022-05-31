@extends('vendor.voyager.template.browse-template')

@php
$data = App\Models\Projet::paginate(9);
@endphp

@section('title')
    Liste des projets
@endsection

@section('add-items')
    <a href="/admin/projets/create" class="btn btn-success btn-add-new">
        <i class="voyager-plus"></i> <span>Ajouter un projet</span>
    </a>
@endsection

@section('items')
    @foreach ($data as $item)
        <div class="col-md-4">
            <div class="card-c p-3 mb-2" style="position: relative">
                <div class="d-flex-c justify-content-between-c">
                    <div class="d-flex-c flex-row-c align-items-center-c">
                        <div class="icon-c"> <i class="bx-c icon voyager-thumb-tack"></i>
                        </div>
                        <div class="ms-2-c c-details">
                            <h6 class="mb-0-c" style="margin-left: 5px;">{{ ucfirst($item->titre) }}</h6>
                            <span>{{ date_format(date_create($item->date_evenement), 'd/m/Y') }}</span>
                        </div>
                    </div>
                    <div class="badge-c"><button title="Supprimer" id="{{ $item->id }}"
                            class="btn btn-danger btn-sm delete" data-toggle="modal" data-target="#delete">
                            <i class="voyager-trash"></i>
                        </button></div>
                </div>
                <div class="mt-5">
                    {{ ucfirst($item->description) }}
                </div>
                <div>
                    <h3 class="heading">{{ $item->intitule }}</h3>
                    <div class="mt-5">
                        <div>
                            {{ $item->resume }}
                        </div>
                        <div style="display: flex; justify-content: space-between; align-items: center">
                            <div class="mt-3">
                                {{ Str::limit($item->lieu, 20, ' ...') }}</div>
                            <div><a href="/admin/projets/{{ $item->id }}/edit" class="btn btn-sm bg-info">
                                    <i class="voyager-pen"></i>
                                </a>
                                <a href="/admin/projets/{{ $item->id }}" class="btn btn-sm btn-primary">Parcourir</a>
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
        actionData.name = "projets";
    </script>
@endsection
