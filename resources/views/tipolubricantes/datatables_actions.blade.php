{!! Form::open(['route' => ['tipolubricantes.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('tipolubricantes.edit', $id) }}" class='btn btn-info btn-xs'>
        <i class="fa fa-edit"></i>
        <smallspan>Editar</smallspan>
    </a>
    {!! Form::button('<i class="fa fa-trash"></i> <small>Eliminar</small>', [
    'type' => 'submit',
    'class' => 'btn btn-danger btn-xs',
    'onclick' => 'return confirm("Confirma que desea elimnar el registro?")'

    ]) !!}
</div>
{!! Form::close() !!}
