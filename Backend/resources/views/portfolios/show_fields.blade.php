<!-- Contrat Field -->
<div class="col-sm-12">
    {!! Form::label('contrat', 'Contrat:') !!}
    <p>{{ $portfolio->contrat }}</p>
</div>

<!-- Date Contrat Field -->
<div class="col-sm-12">
    {!! Form::label('date_contrat', 'Date Contrat:') !!}
    <p>{{ $portfolio->date_contrat }}</p>
</div>

<!-- Kbis Field -->
<div class="col-sm-12">
    {!! Form::label('kbis', 'Kbis:') !!}
    <p>{{ $portfolio->kbis }}</p>
</div>

<!-- Autre Fichier Field -->
<div class="col-sm-12">
    {!! Form::label('autre_fichier', 'Autre Fichier:') !!}
    <p>{{ $portfolio->autre_fichier }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $portfolio->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $portfolio->updated_at }}</p>
</div>

