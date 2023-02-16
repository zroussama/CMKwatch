@extends('connexions.layout')
 
@section('content')


    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Gestionnaire de Connexion</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('connexions.create') }}"> Create New Connexion</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>hebergement</th>
            <th>promise</th>
            <th>name</th>
            <th>domain</th>
            <th>port</th>
            <th>link</th>
            <th>username</th>
            <th>password</th>
            <th>Token</th>
            <th>Status</th>
            <th>createdAt</th>
            <th>uploadedAt</th>
            <th>deletedAt</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $key => $value)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $value->TYPE_HEBERGEMENT }}</td>
            <td>{{ $value->PROMISE_CASE }}</td>
            
            <td>{{ $value->name }}</td>
            
            <td>{{ $value->domain }}</td>
            <td>{{ $value->port }}</td>
            <td>{{ $value->link }}</td>
            <td>{{ $value->username }}</td>
            <td>{{ $value->password }}</td>
            <td>{{ $value->remember_token }}</td>
            <td>{{ $value->STATUS }}</td>
            <td>{{ $value->created_at }}</td>
            <td>{{ $value->updated_at }}</td>
            <td>{{ $value->deleted_at }}</td>
            
            <td>
            </td>
        </tr>
        @endforeach
    </table>  
    {!! $data->links() !!}      
@endsection