@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>
                    Agregar control de combustible
                </h1>
            </div>
        </div>
    </div>
</section>

<div class="content px-3">

    @include('adminlte-templates::common.errors')

    <div class="card">

        {!! Form::open(['route' => 'ctrlcombustibles.store']) !!}

        <div class="card-body">

            <div class="row">
                @include('ctrlcombustibles.fields')
            </div>

        </div>

        <div class="card-footer">
            {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
            <a href="{{ route('ctrlcombustibles.index') }}" class="btn btn-secondary"> Cancelar </a>

        </div>

        {!! Form::close() !!}

    </div>
</div>
@endsection
