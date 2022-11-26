<!-- Vehiculo Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vehiculo_id', 'Vehículo:') !!}
    {!! Form::select('vehiculo_id', $vehiculos, null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- Combustible Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('combustible_id', 'Combustible:') !!}
    {!! Form::select('combustible_id', $combustibles, null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- Plan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('plan', 'Plan:') !!}
    {!! Form::number('plan', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Real Field -->
<div class="form-group col-sm-6">
    {!! Form::label('real', 'Real:') !!}
    {!! Form::number('real', $ctrlcombustible->real ?? 0, ['class' => 'form-control']) !!}

</div>

<!-- Fechaini Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fechaini', 'Fecha inicial:') !!}
    {!! Form::date('fechaini', $ctrlcombustible->fechaini ?? null, ['class' => 'form-control','id'=>'fechaini']) !!}
</div>

<!-- Fechafin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fechafin', 'Fechafin:') !!}
    {!! Form::date('fechafin', $ctrlcombustible->fechafin ?? null, ['class' => 'form-control','id'=>'fechafin']) !!}
</div>
