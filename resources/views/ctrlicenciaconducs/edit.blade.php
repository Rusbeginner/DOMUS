@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>
                    Editando licencia de conducción
                </h1>
            </div>
        </div>
    </div>
</section>

<div class="content px-3">

    @include('adminlte-templates::common.errors')

    <div class="card">

        {!! Form::model($ctrlicenciaconduc, ['route' => ['ctrlicenciaconducs.update', $ctrlicenciaconduc->id], 'method' => 'patch']) !!}

        <div class="card-body">
            <div class="row">
                @include('ctrlicenciaconducs.fields')
            </div>
        </div>

        <div class="card-footer">
            {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
            <a href="{{ route('ctrlicenciaconducs.index') }}" class="btn btn-secondary"> Cancelar </a>
        </div>

        {!! Form::close() !!}

    </div>
</div>
@endsection
