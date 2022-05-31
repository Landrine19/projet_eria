@extends('vendor.voyager.template.browse-template')

@php
$data = App\Models\Slider::paginate(9);
@endphp

@section('title')
    Slider
@endsection

@section('add-items')
    <a href="/admin/sliders/create" class="btn btn-success btn-add-new">
        <i class="voyager-plus"></i> <span>Ajouter un slider</span>
    </a>
@endsection

@section('items')
    @foreach ($data as $item)
        <div class="col-md-4">
            <div class="card-c p-3 mb-2">
                <div class="d-flex-c" style="justify-content: center">
                    <div class="d-flex-c flex-row-c align-items-center-c">
                        <div>
                            <img width="200px" height="100px" src="{{ asset('storage/' . $item->photo) }}" alt="">
                        </div>
                        <h4 class="heading" style="margin-left: 12px;">{{ $item->titre }}</h4>
                    </div>
                    <div class="badge-c" style="position: absolute; right: 5px; top: 5px;">
                        <button title="Supprimer" id="{{ $item->id }}" class="btn btn-danger btn-sm delete"
                            data-toggle="modal" data-target="#delete">
                            <i class="voyager-trash"></i>
                        </button>
                    </div>
                </div>
                <div class="mt-5">
                    <div style="text-align: center;">
                        {{ $item->created_at }}
                    </div>
                    <div class="mt-5">
                        <div style="display: flex; justify-content: center; align-items: center">
                            <div class="mt-3">
                                {{ Str::limit($item->lieu, 20, ' ...') }}</div>
                            <div><a href="/admin/sliders/{{ $item->id }}/edit" class="btn btn-sm bg-info">
                                    <i class="voyager-pen"></i>
                                </a>
                                <a href="/admin/sliders/{{ $item->id }}" class="btn btn-sm btn-primary">Parcourir</a>
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
        actionData.name = "sliders";
    </script>
@endsection
