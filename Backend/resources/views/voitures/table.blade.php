<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="voitures-table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Password</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($voitures as $voiture)
                <tr>
                    <td>{{ $voiture->name }}</td>
                    <td>{{ $voiture->address }}</td>
                    <td>{{ $voiture->phone }}</td>
                    <td>{{ $voiture->email }}</td>
                    <td>{{ $voiture->password }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['voitures.destroy', $voiture->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('voitures.show', [$voiture->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('voitures.edit', [$voiture->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $voitures])
        </div>
    </div>
</div>
