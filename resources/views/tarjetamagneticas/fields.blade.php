<!-- Notarjeta Field -->
<div class="form-group col-sm-6">
    {!! Form::label('notarjeta', 'Número:') !!}
    {!! Form::text('notarjeta', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Fechavenc Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fechavenc', 'Fecha de vencimiento:') !!}
    {!! Form::date('fechavenc', $tarjetamagnetica->fechavenc ?? null, ['class' => 'form-control','name'=>'fechavenc']) !!}

</div>

<!-- Combustible Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('combustible_id', 'Combustible:') !!}
    {!! Form::select('combustible_id', $combustibles, null, ['class' => 'form-control custom-select']) !!}
</div>
