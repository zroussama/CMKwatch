<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="c-m-k-s-table">
            <thead>
            <tr>
                <th>Cmk Id</th>
                <th>Facturation</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cMKS as $cMK)
                <tr>
                    <td>{{ $cMK->CMK_ID }}</td>
                    <td>{{ $cMK->Facturation }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['cMKS.destroy', $cMK->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('cMKS.show', [$cMK->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('cMKS.edit', [$cMK->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $cMKS])
        </div>
    </div>
</div>
