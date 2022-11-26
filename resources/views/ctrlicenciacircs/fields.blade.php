<!-- Vehiculo Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vehiculo_id', 'Vehículo') !!}
    {!! Form::select('vehiculo_id', $vehiculos, null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- Nocomprobante Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nocomprobante', 'No. comprobante:') !!}
    {!! Form::text('nocomprobante', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Fechaemision Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fechaemision', 'Fecha de emisión:') !!}
    {!! Form::date('fechaemision',$ctrlicenciacirc->fechaemision ?? null, ['class' => 'form-control','id'=>'fechaemision']) !!}
</div>

<!-- Fechavenc Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fechavenc', 'Fecha de vencimiento:') !!}
    {!! Form::date('fechavenc',$ctrlicenciacirc->fechavenc ?? null, ['class' => 'form-control','id'=>'fechavenc']) !!}
</div>
