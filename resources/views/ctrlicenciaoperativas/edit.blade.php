@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>
                    Editar control de licencia
                </h1>
            </div>
        </div>
    </div>
</section>

<div class="content px-3">

    @include('adminlte-templates::common.errors')

    <div class="card">

        {!! Form::model($ctrlicenciaoperativa, ['route' => ['ctrlicenciaoperativas.update', $ctrlicenciaoperativa->id], 'method' => 'patch']) !!}

        <div class="card-body">
            <div class="row">
                @include('ctrlicenciaoperativas.fields')
            </div>
        </div>

        <div class="card-footer">
            {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
            <a href="{{ route('ctrlicenciaoperativas.index') }}" class="btn btn-secondary"> Cancelar </a>
        </div>

        {!! Form::close() !!}

    </div>
</div>
@endsection
