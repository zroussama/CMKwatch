<!-- Nom Field -->
<div class="col-sm-12">
    {!! Form::label('nom', 'Nom:') !!}
    <p>{{ $avion->nom }}</p>
</div>

<!-- Taille Field -->
<div class="col-sm-12">
    {!! Form::label('taille', 'Taille:') !!}
    <p>{{ $avion->taille }}</p>
</div>

<!-- Places Field -->
<div class="col-sm-12">
    {!! Form::label('places', 'Places:') !!}
    <p>{{ $avion->places }}</p>
</div>

<!-- Ficheclient Field -->
<div class="col-sm-12">
    {!! Form::label('ficheClient', 'Ficheclient:') !!}
    <p>{{ $avion->ficheClient }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $avion->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $avion->updated_at }}</p>
</div>

