@extends('vendor.voyager.template.browse-template')

@php
$evenements = App\Models\Evenement::paginate(9);
@endphp

@section('title') Liste des évenements @endsection

@section('add-items')
    <a href="/admin/evenements/create" class="btn btn-success btn-add-new">
        <i class="voyager-plus"></i> <span>Ajouter un évenement</span>
    </a>
@endsection

@section('items')
    @foreach ($evenements as $reunion)
        <div class="col-md-4">
            <div class="card-c p-3 mb-2">
                <div class="d-flex-c justify-content-between-c">
                    <div class="d-flex-c flex-row-c align-items-center-c">
                        <div class="icon-c"> <i class="bx-c icon voyager-calendar"></i>
                        </div>
                        <div class="ms-2-c c-details">
                            <h6 class="mb-0-c">{{ $reunion->intitule }}</h6>
                            <span>{{ date_format(date_create($reunion->date_evenement), 'd/m/Y') }}</span>
                            <span> {{ $reunion->heure_evenement }}</span>
                        </div>
                    </div>
                    <div class="badge-c"><button title="Supprimer" id="{{ $reunion->id }}"
                            class="btn btn-danger btn-sm delete" data-toggle="modal" data-target="#delete">
                            <i class="voyager-trash"></i>
                        </button></div>
                </div>
                <div class="mt-5">
                    <h3 class="heading">{{ $reunion->intitule }}</h3>
                    <div class="mt-5">
                        <div>
                            {{ $reunion->resume }}
                        </div>
                        <div style="display: flex; justify-content: space-between; align-items: center">
                            <div class="mt-3">
                                {{ Str::limit($reunion->lieu, 20, ' ...') }}</div>
                            <div><button title="Modifier" id="{{ $reunion->id }}" data-toggle="modal" data-target="#form"
                                    class="edit btn btn-sm bg-info">
                                    <i class="voyager-pen"></i>
                                </button>
                                <a href="/admin/evenements/{{ $reunion->id }}"
                                    class="btn btn-sm btn-primary">Parcourir</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('items-link')
    {{ $evenements->links() }}
@endsection
