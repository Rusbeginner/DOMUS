@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>
                    Editando lubricante {{ $lubricante->nombre }}
                </h1>
            </div>
        </div>
    </div>
</section>

<div class="content px-3">

    @include('adminlte-templates::common.errors')

    <div class="card">

        {!! Form::model($lubricante, ['route' => ['lubricantes.update', $lubricante->id], 'method' => 'patch']) !!}

        <div class="card-body">
            <div class="row">
                @include('lubricantes.fields')
            </div>
        </div>

        <div class="card-footer">
            {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
            <a href="{{ route('lubricantes.index') }}" class="btn btn-secondary"> Cancelar </a>
        </div>

        {!! Form::close() !!}

    </div>
</div>
@endsection
