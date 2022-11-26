<!-- Nombre Field -->
<div class="col-sm-12">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{{ $lubricante->nombre }}</p>
</div>

<!-- Descripcion Field -->
<div class="col-sm-12">
    {!! Form::label('descripcion', 'Descripción:') !!}
    <p>{{ $lubricante->descripcion }}</p>
</div>

<!-- Tipolubricante Id Field -->
<div class="hidden col-sm-12">
    {!! Form::label('tipolubricante_id', 'Tipo de lubricante Id:') !!}
    <p>{{ $lubricante->tipolubricante_id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $lubricante->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $lubricante->updated_at }}</p>
</div>
