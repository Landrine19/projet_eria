@php
$rendus = App\Http\Controllers\CompterenduController::all();
$compteRendu = $reunion->compterendus;
$compteRenduexist = $compteRendu->count() > 0;
@endphp

<div>
    <h1>COMPTE RENDU</h1>
    <div class="row">
        <div class="col-md-5">
            <div class="row">
                <div class="col-md-10" style="margin-bottom: 0px;">
                    @if ($isModerateur)
                        @if ($notExpired)
                            <form action="#" id="orderForm">
                                <div class="row">
                                    <div class="form-group col-md-10">
                                        <label for="#" class="form-label">Ordre du jour</label>
                                        @php
                                            $libelle = $compteRenduexist ? $compteRendu->first()->libelle : null;
                                        @endphp
                                        <input type="text" class="form-control" id="inputCompteLibelle"
                                            value="{{ $libelle }}">
                                        @php
                                            $val = $compteRenduexist ? $compteRendu->first()->id : null;
                                        @endphp
                                        <input type="hidden" name="id" id="inputCompteId" value="{{ $val }}">
                                        <input type="hidden" name="evenement_id" value="{{ $reunion->id }}"
                                            id="eventInput">
                                    </div>
                                    <div class="col-md-2" style="margin-top: 20px;">
                                        <button class="btn btn-primary" type="submit">Valider</button>
                                    </div>
                                </div>
                            </form>
                        @endif
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @php
                        $lib = $compteRenduexist ? $compteRendu->first()->libelle : '';
                        $id = $compteRenduexist ? $compteRendu->first()->id : '';
                    @endphp
                    <h2>
                        <span id="compterendu_libelle">{{ $lib }}</span>
                        @if ($isModerateur)
                            <button style="font-size: 18px; margin-left: 12px;" id="editcmptelibelle">
                                <span class="voyager-pen"></span>
                            </button>
                            <button style="font-size: 12px; margin-left: 12px;" class="btn btn-danger"
                                data-id="{{ $id }}" id="deletecmptelibelle" data-target="#delete-compterendu">
                                <span class="voyager-trash"></span>
                            </button>
                        @endif
                    </h2>

                    <h3>Rubrique(s)
                        @if ($isModerateur)
                            @if ($notExpired)
                                <button {{ $compteRenduexist ? '' : 'disabled' }} class="btn btn-primary"
                                    id="add-rubrique">
                                    <i class="voyager-plus" style="font-size: 18px;"></i>
                                </button>
                            @endif
                        @endif
                    </h3>
                </div>
                <div class="col-md-8">
                    <ul class="list-group">
                        @php
                            $rubriques = null;
                            if ($compteRenduexist && $compteRendu->first()->rubriques->count() > 0) {
                                $rubriques = $compteRendu->first()->rubriques;
                            }
                        @endphp
                        <div class="list-group" id="rubrique-liste">
                            @if ($rubriques)
                                @foreach ($rubriques as $rubrique)
                                    <div>
                                        <button type='button' class='list-group-item list-group-item-action rub-style'
                                            id="rub{{ $rubrique->id }}" data-id="{{ $rubrique->id }}"
                                            data-libelle="{{ $rubrique->libelle }}"
                                            data-contenu="{{ $rubrique->contenu }}">{{ $rubrique->libelle }}
                                        </button>
                                        @if ($isModerateur)
                                            <a class="btn btn-danger rubdel" data-id="{{ $rubrique->id }}"
                                                style="font-size: 10px;"><span class="voyager-trash"></span></a>
                                        @endif
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-5" style="margin-left: 12px">
            <form action="#" id="edit-form">
                <input type="hidden" id="rubriqueId">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="" class="form-label">Rubrique</label>
                        <input name="libelle" type="text" class="form-control" id="libelle">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="" class="form-label">Contenu</label>
                        <textarea name="contenu" class="form-control" id="contenu" cols="30" rows="8"></textarea>
                    </div>
                </div>
                @if ($isModerateur)
                    <div><button class="btn btn-primary" type="submit">Valider</button></div>
                @endif
            </form>
        </div>
    </div>
</div>

<div class="modal" id="delete-compterendu">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center bg-primary">
                <h4>Suppression</h4>
            </div>
            <div class="modal-body bg-light">Voulez-vous effectuer cette operation</div>
            <form id="delete-form" action="">
                @csrf
                <input name="membre_id" id="membre" type="hidden">
                <input name="evenement_id" value="{{ $reunion->id }}" type="hidden">
            </form>
            <div class="modal-footer pull-left">
                <button class="btn btn-sm btn-danger" id="deleteRub">valider</button>
                <button class="btn btn-sm btn-secondary" data-dismiss="modal">annuler</button>
            </div>
        </div>
    </div>
</div>