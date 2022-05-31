@extends('vendor.voyager.template.browse-template')

@section('title')
    Nos partenaires
@endsection

@section('add-items')
    <a href="/admin/partenaires/create" class="btn btn-success btn-add-new">
        <i class="voyager-plus"></i> <span>Ajouter un partenaire</span>
    </a>
@endsection

@php
 $data = App\Models\Partenaire::paginate(9);
@endphp

@section('items')
    @foreach ($data as $item)
        <div class="col-md-4">
            <div class="card-c p-3 mb-2">
                <div class="d-flex-c justify-content-between-c">
                    <div class="d-flex-c flex-row-c align-items-center-c">
                        <div><img width="40px" height="40px" src="{{asset('storage/'.$item->logo)}}" alt=""></div>
                        <h4 class="heading" style="margin-left: 12px;">{{ $item->titre }}</h4>
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
                                <a href="/admin/partenaires/{{ $item->id }}/edit" class="btn btn-sm bg-info">
                                    <i class="voyager-pen"></i>
                                </a>
                                <a href="/admin/partenaires/{{ $item->id }}"
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
        actionData.name = "partenaires";
    </script>
@endsection
