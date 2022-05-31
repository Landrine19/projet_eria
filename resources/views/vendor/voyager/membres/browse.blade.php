@extends('vendor.voyager.template.browse-template')

@php
$data = App\Models\Membre::paginate(6);
@endphp

@section('title')
    Liste des membres
@endsection

@section('add-items')
    <a href="/admin/membres/create" class="btn btn-success btn-add-new">
        <i class="voyager-plus"></i> <span>Ajouter membre</span>
    </a>
@endsection

@section('items')
    @foreach ($data as $item)
        <div class="col-md-3">
            <div class="card-c p-3 mb-2">
                <div class="d-flex-c align-items-center-c" style="justify-content: center; flex-direction: column;">
                    <div><img src="{{ asset('storage/' . $item->user->avatar) }}" width="100px" height="100px"></div>
                    <h4>{{ ucfirst($item->nom) . ' ' . ucfirst($item->prenoms) }}</h4>
                </div>

                <a style="position: absolute; right: 5px; top: 5px;" title="Supprimer" id="{{ $item->id }}" class="btn btn-danger btn-sm delete" data-toggle="modal"
                    data-target="#delete">
                    <i class="voyager-trash"></i>
                </a>

                <div style="margin-top: 10px;">
                    <div>
                        <div style="display: flex; justify-content: center; align-items: center">
                            <div><a href="/admin/membres/{{ $item->id }}/edit" class="btn btn-sm bg-info">
                                    <i class="voyager-pen"></i>
                                </a>
                                <a href="/admin/membres/{{ $item->id }}" class="btn btn-sm btn-primary">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('items-link')
    {{ $data->links() }}
@endsection

@section('add_scripts')
    <script>
        actionData.name = "membres";
    </script>
@endsection
