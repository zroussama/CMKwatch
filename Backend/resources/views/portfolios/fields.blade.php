<!-- Contrat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contrat', 'Contrat:') !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('contrat', ['class' => 'custom-file-input']) !!}
            {!! Form::label('contrat', 'Choose file', ['class' => 'custom-file-label']) !!}
        </div>
    </div>
</div>
<div class="clearfix"></div>

<!-- Date Contrat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_contrat', 'Date Contrat:') !!}
    {!! Form::text('date_contrat', null, ['class' => 'form-control','id'=>'date_contrat']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#date_contrat').datepicker()
    </script>
@endpush

<!-- Kbis Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kbis', 'Kbis:') !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('kbis', ['class' => 'custom-file-input']) !!}
            {!! Form::label('kbis', 'Choose file', ['class' => 'custom-file-label']) !!}
        </div>
    </div>
</div>
<div class="clearfix"></div>

<!-- Autre Fichier Field -->
<div class="form-group col-sm-6">
    {!! Form::label('autre_fichier', 'Autre Fichier:') !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('autre_fichier', ['class' => 'custom-file-input']) !!}
            {!! Form::label('autre_fichier', 'Choose file', ['class' => 'custom-file-label']) !!}
        </div>
    </div>
</div>
<div class="clearfix"></div>