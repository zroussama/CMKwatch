@extends('connexions.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Connexion</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('connexions.index') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('connexions.store') }}" method="POST">
    @csrf
  

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>name</strong>
                <input type="text" name="name" class="form-control" placeholder="Enter name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>domain</strong>
                <input type="text" name="domain" class="form-control" placeholder="Enter name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>port</strong>
                <input type="text" name="port" class="form-control" placeholder="Enter name">
            </div>
        </div>
        <label for="TYPE_HEBERGEMENT">TYPE_HEBERGEMENT</label>
        <select class="form-select" name="TYPE_HEBERGEMENT">
          <option value="PROMISE">PROMISE</option>
          <option value="CLOUD">CLOUD</option>
        </select>

        <label for="PROMISE_CASE">PROMISE_CASE</label>
        <select class="form-select" name="PROMISE_CASE">
          <option value="SSH">SSH</option>
          <option value="VPN">VPN</option>
          <option value="IPSEC">IPSEC</option>
        </select>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>username</strong>
                <textarea class="form-control" style="height:150px" name="username" placeholder="Enter Description"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>password</strong>
                <textarea class="form-control" style="height:150px" name="password" placeholder="Enter Description"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>token</strong>
                <textarea class="form-control" style="height:150px" name="token" placeholder="Enter Description"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button class="reset">CLEAR ENTRY</button>
            <button onclick="document.getElementById('selectform').reset(); document.getElementById('from').value = null; return false;">
                CLEAR ENTRY
            </button>
    </div>
    </div>
   
</form>
@endsection