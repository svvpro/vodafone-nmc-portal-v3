{!! Form::open(['url' => isset($ata->id) ? route('admin.alarm-agreement-type.update', $ata->id) : route('admin.alarm-agreement-type.store'), 'class'=>'form-horizontal well']) !!}
@if(isset($ata->id))
    {!! Form::hidden('_method', 'PUT') !!}
@endif

<div class="form-group">
    {!! Form::label('name', 'Название типа согласования шаблона', ['class'=>'label-control col-md-2']) !!}
    <div class="col-md-10">
        {!! Form::text('name', isset($ata->name) ? $ata->name : old('name'), ['class'=>'form-control'] ) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-10 col-md-offset-2">
        {!! Form::submit('Сохранить изменения', ['class'=>'btn btn-primary btn-block']) !!}
    </div>
</div>
{!! Form::close() !!}

<a href="{{ URL::previous() }}" class="btn btn-primary">Назад</a>