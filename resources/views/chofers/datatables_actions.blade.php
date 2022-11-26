@include('sweetalert::alert')

{!! Form::open(['route' => ['chofers.destroy', $id], 'method' => 'delete', 'class' => 'form-eliminar']) !!}
<div class='btn-group'>
    <a href="{{ route('chofers.edit', $id) }}" class='btn btn-info btn-xs'>
        <i class="fa fa-edit"></i>
        <small>Editar</small>
    </a>
    {!! Form::button('<i class="fa fa-trash"></i> <small>Eliminar</small>', [
    'type' => 'submit',
    'class' => 'btn btn-danger btn-xs',
    'onclick' => 'return confirm("Confirma que desea eliminar el registro?")'

    ]) !!}
</div>

{!! Form::close() !!}

