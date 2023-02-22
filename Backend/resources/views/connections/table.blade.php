<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="connections-table">
            <thead>
            <tr>
                
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($connections as $connection)
                <tr>
                    
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['connections.destroy', $connection->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('connections.show', [$connection->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('connections.edit', [$connection->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $connections])
        </div>
    </div>
</div>
