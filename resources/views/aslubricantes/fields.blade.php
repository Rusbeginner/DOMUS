<!-- Vehiculo Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vehiculo_id', 'Vehículo:') !!}
    {!! Form::select('vehiculo_id', $vehiculos, null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- Lubricante Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lubricante_id', 'Lubricante:') !!}
    {!! Form::select('lubricante_id', $lubricantes, null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- Asignacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('asignacion', 'Asignación:') !!}
    {!! Form::number('asignacion', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Fechaini Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fechaini', 'Fecha inicial:') !!}
    {!! Form::date('fechaini', $aslubricante->fechaini ?? null, ['class' => 'form-control','id'=>'fechaini']) !!}
</div>

<!-- Fechafin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fechafin', 'Fecha final:') !!}
    {!! Form::date('fechafin', $aslubricante->fechafin ?? null, ['class' => 'form-control','id'=>'fechafin']) !!}
</div>
