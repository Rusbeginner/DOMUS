<!-- Notarjeta Field -->
<div class="col-sm-12">
    {!! Form::label('notarjeta', 'Notarjeta:') !!}
    <p>{{ $tarjetamagnetica->notarjeta }}</p>
</div>

<!-- Fechavenc Field -->
<div class="col-sm-12">
    {!! Form::label('fechavenc', 'Fechavenc:') !!}
    <p>{{ $tarjetamagnetica->fechavenc }}</p>
</div>

<!-- Combustible Id Field -->
<div class="col-sm-12">
    {!! Form::label('combustible_id', 'Combustible Id:') !!}
    <p>{{ $tarjetamagnetica->combustible_id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $tarjetamagnetica->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $tarjetamagnetica->updated_at }}</p>
</div>

