<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="portfolios-table">
            <thead>
            <tr>
                <th>Contrat</th>
                <th>Date Contrat</th>
                <th>Kbis</th>
                <th>Autre Fichier</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($portfolios as $portfolio)
                <tr>
                    <td>{{ $portfolio->contrat }}</td>
                    <td>{{ $portfolio->date_contrat }}</td>
                    <td>{{ $portfolio->kbis }}</td>
                    <td>{{ $portfolio->autre_fichier }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['portfolios.destroy', $portfolio->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('portfolios.show', [$portfolio->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('portfolios.edit', [$portfolio->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $portfolios])
        </div>
    </div>
</div>
