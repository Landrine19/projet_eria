<div class="row">
    <div class="col-md-12">
        @if ($notExpired)
            <div class="container-fluid">
                <h1 class="page-title">
                    <i class="voyager-check"></i> Participants
                </h1>
                <a title="ajouter un participant" class="btn btn-primary" data-toggle="modal"
                    data-target="#participant-modal">
                    <i class="voyager-plus"></i>
                    Ajouter un participant
                </a>
            </div>
        @else
            <div style="margin-top: 40px; margin-bottom: 30px;">
                <h3>Participants</h3>
            </div>
        @endif

        <div class="panel">
            <div class="panel-body">
                <table id="dataTable" class="table table-stripped table-bordered">
                    <thead class="bg-dark">
                        <tr>
                            <th>Nom & Prénom(s)</th>
                            <th>Spécialité</th>
                            <th>Présence?</th>
                            @if ($notExpired)
                                @if ($reunion->role == 'moderateur')
                                    <th></th>
                                @endif
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reunion->membres as $membre)
                            <tr>
                                <td>{{ $membre->nom . ' ' . $membre->prenoms }}</td>
                                <td>{{ $membre->specialite }}</td>
                                <td>
                                    @if ($membre->pivot->absence)
                                        Absent
                                    @else
                                        Présent
                                    @endif

                                    @if ($notExpired)
                                        @if ($user->id == $membre->id || $isModerateur)
                                            <div class="btn-group btn-group-sm p-2">
                                                @if ($membre->pivot->absence == 1)
                                                    <a class="btn btn-sm btn-success mr-2"
                                                        href="/present/{{ $membre->id }}/{{ $reunion->id }}">
                                                        <i class="voyager-check"></i>
                                                    </a>
                                                    @if ($membre->pivot->justificatif)
                                                        <button style="margin-left: 12px;"
                                                            data-contenu="{{ $membre->pivot->justificatif }}"
                                                            class="btn btn-success m-2 showJustification">
                                                            <i class="voyager-documentation"></i>
                                                        </button>
                                                    @endif
                                                @else
                                                    <button class="justifier-btn btn btn-sm btn-warning mr-2"
                                                        data-membreid="{{ $membre->id }}"
                                                        data-evenementid="{{ $reunion->id }}">
                                                        <i class="voyager-x"></i>
                                                    </button>
                                                @endif
                                            </div>
                                        @endif
                                    @endif
                                </td>
                                @if ($notExpired)
                                    <td class="text-right py-0 align-middle">
                                        @if ($isModerateur && $membre->id != $user->id)
                                            <div class="btn-group btn-group-sm p-2">
                                                <button id="{{ $membre->id }}" data-toggle="modal" title="suppression"
                                                    data-target="#delete-modal" class="btn btn-sm btn-danger mr-1 del">
                                                    <i class="voyager-trash"></i>
                                                </button>
                                            </div>
                                        @endif
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-12" style="border: 2px solid black;">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="container-fluid">
            <h1 class="page-title">
                <i class="voyager-check"></i> Pièce jointes
                @if ($reunion->fichiers->count() == 0)
                    <span class="text-danger" style="margin-left: 18px;"> Aucune pièce jointe</span>
                @endif
            </h1>
            @if ($isModerateur))
                @if ($notExpired)
                    <form action="{{ route('fichiers.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="evenement_id" value="{{ $reunion->id }}">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <input type="text" placeholder="libelle" class="form-control" name="name">
                            </div>
                            <div class="form-group col-md-3">
                                <input type="file" style="padding: 10px;" name="fichier">
                            </div>
                            <div class="form-group col-md-2">
                                <button class="btn btn-primary" type="submit">Joindre</button>
                            </div>
                        </div>
                    </form>
                @endif
            @endif
        </div>
        @if ($reunion->fichiers->count() > 0)
            <div class="panel">
                <div class="panel-body">
                    <table id="dataTable" class="table table-stripped table-bordered">
                        <thead class="bg-dark">
                            <tr>
                                <th>Libelle</th>
                                <th>Fichiers</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reunion->fichiers as $fichier)
                                <tr>
                                    <td>{{ $fichier->name }}</td>
                                    <td><a href="/storage/{{ $fichier->chemin }}"><span class="voyager-file-text"
                                                style="font-size: 20px;"></span></a></td>
                                    <td><a href="{{ route('fichiers.delete', ['id' => $fichier->id]) }}"
                                            class="btn btn-danger">supprimer</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
</div>
