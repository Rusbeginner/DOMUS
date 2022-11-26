<!-- Nombre Field -->
<div class="col-sm-12">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{{ $chofer->nombre }}</p>
</div>

<!-- Apellidos Field -->
<div class="col-sm-12">
    {!! Form::label('apellidos', 'Apellidos:') !!}
    <p>{{ $chofer->apellidos }}</p>
</div>

<!-- Dirparticular Field -->
<div class="col-sm-12">
    {!! Form::label('dirparticular', 'Dirección particular:') !!}
    <p>{{ $chofer->dirparticular }}</p>
</div>

<!-- Ci Field -->
<div class="col-sm-12">
    {!! Form::label('ci', 'Ci:') !!}
    <p>{{ $chofer->ci }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $chofer->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $chofer->updated_at }}</p>
</div>
