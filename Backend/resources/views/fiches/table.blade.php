<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="fiches-table">
            <thead>
            <tr>
                <th>Entreprise</th>
                <th>Domaine Activite</th>
                <th>Gerant Nom</th>
                <th>Gerant Prenom</th>
                <th>Gerant Tel</th>
                <th>Gerant Email</th>
                <th>Autre Nom</th>
                <th>Autre Prenom</th>
                <th>Autre Tel</th>
                <th>Autre Email</th>
                <th>Autre Fonction</th>
                <th>Pays Origine</th>
                <th>Ville Origine</th>
                <th>Prod Pays</th>
                <th>Prod Ville</th>
                <th>Prod Adress</th>
                <th>Origin Adress</th>
                <th>Logo</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($fiches as $fiche)
                <tr>
                    <td>{{ $fiche->entreprise }}</td>
                    <td>{{ $fiche->domaine_activite }}</td>
                    <td>{{ $fiche->gerant_nom }}</td>
                    <td>{{ $fiche->gerant_prenom }}</td>
                    <td>{{ $fiche->gerant_tel }}</td>
                    <td>{{ $fiche->gerant_email }}</td>
                    <td>{{ $fiche->autre_nom }}</td>
                    <td>{{ $fiche->autre_prenom }}</td>
                    <td>{{ $fiche->autre_tel }}</td>
                    <td>{{ $fiche->autre_email }}</td>
                    <td>{{ $fiche->autre_fonction }}</td>
                    <td>{{ $fiche->Pays_Origine }}</td>
                    <td>{{ $fiche->Ville_Origine }}</td>
                    <td>{{ $fiche->Prod_pays }}</td>
                    <td>{{ $fiche->prod_ville }}</td>
                    <td>{{ $fiche->Prod_adress }}</td>
                    <td>{{ $fiche->Origin_adress }}</td>
                    <td>{{ $fiche->logo }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['fiches.destroy', $fiche->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('fiches.show', [$fiche->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('fiches.edit', [$fiche->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $fiches])
        </div>
    </div>
</div>
