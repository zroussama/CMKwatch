<!-- Nom Field -->
<div class="col-sm-12">
    {!! Form::label('nom', 'Nom:') !!}
    <p>{{ $personne->nom }}</p>
</div>

<!-- Prenom Field -->
<div class="col-sm-12">
    {!! Form::label('prenom', 'Prenom:') !!}
    <p>{{ $personne->prenom }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $personne->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $personne->updated_at }}</p>
</div>

