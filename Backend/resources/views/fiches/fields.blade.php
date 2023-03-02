<!-- Entreprise Field -->
<div class="form-group col-sm-6">
    {!! Form::label('entreprise', 'Entreprise:') !!}
    {!! Form::text('entreprise', null, ['class' => 'form-control']) !!}
</div>

<!-- Domaine Activite Field -->
<div class="form-group col-sm-6">
    {!! Form::label('domaine_activite', 'Domaine Activite:') !!}
    {!! Form::text('domaine_activite', null, ['class' => 'form-control']) !!}
</div>

<!-- Gerant Nom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gerant_nom', 'Gerant Nom:') !!}
    {!! Form::text('gerant_nom', null, ['class' => 'form-control']) !!}
</div>

<!-- Gerant Prenom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gerant_prenom', 'Gerant Prenom:') !!}
    {!! Form::text('gerant_prenom', null, ['class' => 'form-control']) !!}
</div>

<!-- Gerant Tel Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gerant_tel', 'Gerant Tel:') !!}
    {!! Form::text('gerant_tel', null, ['class' => 'form-control']) !!}
</div>

<!-- Gerant Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gerant_email', 'Gerant Email:') !!}
    {!! Form::email('gerant_email', null, ['class' => 'form-control']) !!}
</div>

<!-- Autre Nom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('autre_nom', 'Autre Nom:') !!}
    {!! Form::text('autre_nom', null, ['class' => 'form-control']) !!}
</div>

<!-- Autre Prenom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('autre_prenom', 'Autre Prenom:') !!}
    {!! Form::text('autre_prenom', null, ['class' => 'form-control']) !!}
</div>

<!-- Autre Tel Field -->
<div class="form-group col-sm-6">
    {!! Form::label('autre_tel', 'Autre Tel:') !!}
    {!! Form::text('autre_tel', null, ['class' => 'form-control']) !!}
</div>

<!-- Autre Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('autre_email', 'Autre Email:') !!}
    {!! Form::email('autre_email', null, ['class' => 'form-control']) !!}
</div>

<!-- Autre Fonction Field -->
<div class="form-group col-sm-6">
    {!! Form::label('autre_fonction', 'Autre Fonction:') !!}
    {!! Form::text('autre_fonction', null, ['class' => 'form-control']) !!}
</div>

<!-- Pays Origine Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Pays_Origine', 'Pays Origine:') !!}
    {!! Form::text('Pays_Origine', null, ['class' => 'form-control']) !!}
</div>

<!-- Ville Origine Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Ville_Origine', 'Ville Origine:') !!}
    {!! Form::text('Ville_Origine', null, ['class' => 'form-control']) !!}
</div>

<!-- Prod Pays Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Prod_pays', 'Prod Pays:') !!}
    {!! Form::text('Prod_pays', null, ['class' => 'form-control']) !!}
</div>

<!-- Prod Ville Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prod_ville', 'Prod Ville:') !!}
    {!! Form::text('prod_ville', null, ['class' => 'form-control']) !!}
</div>

<!-- Prod Adress Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Prod_adress', 'Prod Adress:') !!}
    {!! Form::text('Prod_adress', null, ['class' => 'form-control']) !!}
</div>

<!-- Origin Adress Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Origin_adress', 'Origin Adress:') !!}
    {!! Form::text('Origin_adress', null, ['class' => 'form-control']) !!}
</div>

<!-- Logo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('logo', 'Logo:') !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('logo', ['class' => 'custom-file-input']) !!}
            {!! Form::label('logo', 'Choose file', ['class' => 'custom-file-label']) !!}
        </div>
    </div>
</div>
<div class="clearfix"></div>