<!-- Tipoequipo Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipoequipo_id', 'Tipo de vehículo:') !!}
    {!! Form::select('tipoequipo_id', $tiposequipos, null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- Modelo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('modelo', 'Modelo:') !!}
    {!! Form::text('modelo', null, ['class' => 'form-control']) !!}
</div>

<!-- Chapa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('chapa', 'Chapa:') !!}
    {!! Form::text('chapa', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Numotor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numotor', 'Número de motor:') !!}
    {!! Form::number('numotor', null, ['class' => 'form-control']) !!}
</div>

<!-- Numcarroceria Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numcarroceria', 'Número de carrocería:') !!}
    {!! Form::number('numcarroceria', null, ['class' => 'form-control']) !!}
</div>

<!-- Ton Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ton', 'Ton:') !!}
    {!! Form::number('ton', null, ['class' => 'form-control']) !!}
</div>

<!-- Fechafabric Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fechafabric', 'Fecha de fabricación:') !!}
    {!! Form::date('fechafabric', $vehiculo->fechafabric ?? null, ['class' => 'form-control','id'=>'fechafabric']) !!}

</div>

<!-- Importe Field -->
<div class="form-group col-sm-6">
    {!! Form::label('importe', 'Importe:') !!}
    {!! Form::number('importe', null, ['class' => 'form-control']) !!}
</div>

<!-- Numediobasico Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numediobasico', 'No.Inventario:') !!}
    {!! Form::text('numediobasico', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Chofer Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('chofer_id', 'Chofer:') !!}
    {!! Form::select('chofer_id', $chofers, null, ['class' => 'form-control custom-select']) !!}
</div>
