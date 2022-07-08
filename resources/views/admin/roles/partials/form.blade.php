<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class'=>'form-control', 'placeholder' =>'ingrese el nombre del rol']) !!}
    @error('name')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>
<h2 class="h3">Listado de permisos</h2>
@foreach ($permissions as $permission)
    <div>
        <label>
            {!! Form::checkbox('permissions[]', $permission->id, null, ['class'=>'mr1']) !!}
            {{$permission->description}}
        </label>
    </div>
@endforeach