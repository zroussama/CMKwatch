<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="costumers-table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($costumers as $costumer)
                <tr>
                    <td>{{ $costumer->name }}</td>
                    <td>{{ $costumer->email }}</td>
                    <td>{{ $costumer->phone }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['costumers.destroy', $costumer->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('costumers.show', [$costumer->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('costumers.edit', [$costumer->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $costumers])
        </div>
    </div>
</div>
