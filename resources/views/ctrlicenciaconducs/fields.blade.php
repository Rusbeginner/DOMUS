<!-- Chofer Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('chofer_id', 'Chofer:') !!}
    {!! Form::select('chofer_id', $choferes, null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- Numlicencia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numlicencia', 'No.licencia:') !!}
    {!! Form::text('numlicencia', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Fechaemi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fechaemi', 'Fecha emisión:') !!}
    {!! Form::date('fechaemi', $ctrlicenciaconduc->fechaemi ?? null, ['class' => 'form-control','id'=>'fechaemi']) !!}

</div>

<!-- Fechavenc Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fechavenc', 'Fecha vencimiento:') !!}
    {!! Form::date('fechavenc', $ctrlicenciaconduc->fechavenc ?? null, ['class' => 'form-control','id'=>'fechavenc']) !!}


</div>

<!-- Estadopunt Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estadopunt', 'Estado puntuación:') !!}
    {!! Form::text('estadopunt', $ctrlicenciaconduc->estadopunt ?? '', ['class' => 'form-control']) !!}

</div>
