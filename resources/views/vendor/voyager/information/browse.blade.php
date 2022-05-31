@extends('vendor.voyager.template.browse-template')

@php
$data = App\Models\Information::paginate(9);
@endphp

@section('title')
    Informations
@endsection

@section('add-items')
    <a href="/admin/information/create" class="btn btn-success btn-add-new">
        <i class="voyager-plus"></i> <span>Ajouter une information</span>
    </a>
@endsection

@section('items')
    @foreach ($data as $item)
        <div class="col-md-4">
            <div class="card-c p-3 mb-2">
                <div class="d-flex-c justify-content-between-c">
                    <div class="d-flex-c flex-row-c align-items-center-c">
                        @if ($item->img != null)
                            <div>
                                <img width="40px" height="40px" src="{{ asset('storage/' . $item->img) }}" alt="">
                            </div>
                        @else
                            <div class="icon-c"> <i class="bx-c icon voyager-info-circled"></i>
                            </div>
                        @endif
                        <h4 class="heading" style="margin-left: 12px;">{{ $item->title }}</h4>
                    </div>
                    <div class="badge-c"><button title="Supprimer" id="{{ $item->id }}"
                            class="btn btn-danger btn-sm delete" data-toggle="modal" data-target="#delete">
                            <i class="voyager-trash"></i>
                        </button>
                    </div>
                </div>
                <div class="mt-5">
                    <h5 class="heading">{{ $item->created_at }}</h5>
                    <div class="mt-5">
                        <div>
                            {{ $item->resume }}
                        </div>
                        <div style="display: flex; justify-content: space-between; align-items: center">
                            <div class="mt-3">
                                {{ Str::limit($item->lieu, 20, ' ...') }}</div>
                            <div><a href="/admin/information/{{ $item->id }}/edit" class="btn btn-sm bg-info">
                                    <i class="voyager-pen"></i>
                                </a>
                                <a href="/admin/information/{{ $item->id }}"
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
    {{ $data->links() }}
@endsection

@section('add_scripts')
    <script>
        actionData.name = "informations";
    </script>
@endsection
