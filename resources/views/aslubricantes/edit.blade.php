@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>
                    Modificando asignación de lubricante
                </h1>
            </div>
        </div>
    </div>
</section>

<div class="content px-3">

    @include('adminlte-templates::common.errors')

    <div class="card">

        {!! Form::model($aslubricante, ['route' => ['aslubricantes.update', $aslubricante->id], 'method' => 'patch']) !!}

        <div class="card-body">
            <div class="row">
                @include('aslubricantes.fields')
            </div>
        </div>

        <div class="card-footer">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            <a href="{{ route('aslubricantes.index') }}" class="btn btn-secondary"> Cancel </a>

        </div>

        {!! Form::close() !!}

    </div>
</div>
@endsection
