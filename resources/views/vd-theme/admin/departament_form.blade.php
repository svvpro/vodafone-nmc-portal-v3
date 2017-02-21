{!! Form::open(['url' => isset($departament->id) ? route('admin.departament.update', $departament->id) : route('admin.departament.store'), 'class'=>'form-horizontal well']) !!}

@if(isset($departament->id))
    {!! Form::hidden('_method', 'PUT') !!}
@endif

<div class="form-group">
    {!! Form::label('name', 'Название', ['class'=>'label-control col-md-2']) !!}
    <div class="col-md-10">
        {!! Form::text('name', isset($departament->name) ? $departament->name : old('name'), ['class'=>'form-control'] ) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-10 col-md-offset-2">
        {!! Form::submit('Сохранить изменения', ['class'=>'btn btn-primary btn-block']) !!}
    </div>
</div>
{!! Form::close() !!}

<a href="{{ URL::previous() }}" class="btn btn-primary">Назад</a>