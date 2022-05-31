@extends('vendor.voyager.template.browse-template')

@section('title')
    Les types évenements
@endsection

@section('add-items')
    <a href="/admin/typeevenements/create" class="btn btn-success btn-add-new">
        <i class="voyager-plus"></i> <span>Ajouter un type evenement</span>
    </a>
@endsection

@php
$data = App\Models\Typeevenement::paginate(9);
@endphp

@section('items')
    @foreach ($data as $item)
        <div class="col-md-4">
            <div class="card-c p-3 mb-2">
                <div class="d-flex-c justify-content-between-c">
                    <div class="d-flex-c flex-row-c align-items-center-c">
                        <div class="icon-c"> <i class="bx-c icon voyager-categories"></i>
                        </div>
                        <h4 class="heading" style="margin-left: 12px;">{{ $item->libelle }}</h4>
                    </div>
                    <div class="badge-c"><button title="Supprimer" id="{{ $item->id }}"
                            class="btn btn-danger btn-sm delete" data-toggle="modal" data-target="#delete">
                            <i class="voyager-trash"></i>
                        </button>
                    </div>
                </div>
                <div class="mt-5">
                    <div>
                        {{ $item->created_at }}
                    </div>
                    <div class="mt-5">
                        <div style="display: flex; justify-content: space-between; align-items: center">
                            <div>
                                <a href="/admin/typeevenements/{{ $item->id }}/edit" class="btn btn-sm bg-info">
                                    <i class="voyager-pen"></i>
                                </a>
                                <a href="/admin/typeevenements/{{ $item->id }}"
                                    class="btn btn-sm btn-primary">Parcourir</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection


@section('add_scripts')
    <script>
        actionData.name = "typeevenements";
    </script>
@endsection