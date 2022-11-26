<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Apellidos Field -->
<div class="form-group col-sm-6">
    {!! Form::label('apellidos', 'Apellidos:') !!}
    {!! Form::text('apellidos', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Dirparticular Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dirparticular', 'Dirección particular:') !!}
    {!! Form::text('dirparticular', null, ['class' => 'form-control']) !!}
</div>

<!-- Ci Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ci', 'CI:') !!}
    {!! Form::number('ci', null, ['class' => 'form-control', 'required']) !!}
</div>
