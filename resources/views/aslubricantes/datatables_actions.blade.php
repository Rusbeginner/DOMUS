{!! Form::open(['route' => ['aslubricantes.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('aslubricantes.edit', $id) }}" class='btn btn-info btn-xs'>
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
