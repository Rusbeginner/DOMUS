<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('descripcion', 'Descripción:') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Tipolubricante Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipolubricante_id', 'Tipo de lubricante:') !!}
    {!! Form::select('tipolubricante_id', $tiposlubricantes, null, ['class' => 'form-control custom-select']) !!}
</div>
