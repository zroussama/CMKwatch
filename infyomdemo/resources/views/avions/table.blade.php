<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="avions-table">
            <thead>
            <tr>
                <th>Nom</th>
                <th>Taille</th>
                <th>Places</th>
                <th>Ficheclient</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($avions as $avion)
                <tr>
                    <td>{{ $avion->nom }}</td>
                    <td>{{ $avion->taille }}</td>
                    <td>{{ $avion->places }}</td>
                    <td>{{ $avion->ficheClient }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['avions.destroy', $avion->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('avions.show', [$avion->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('avions.edit', [$avion->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $avions])
        </div>
    </div>
</div>
