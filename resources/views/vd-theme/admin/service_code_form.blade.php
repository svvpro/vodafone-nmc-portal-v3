{!! Form::open(['url' => isset($service_code->id) ? route('admin.service-code.update', $service_code->id) : route('admin.service-code.store'), 'class'=>'form-horizontal well']) !!}
@if(isset($service_code->id))
    {!! Form::hidden('_method', 'PUT') !!}
@endif

<div class="form-group">
    {!! Form::label('name', 'Описание', ['class'=>'label-control col-md-2']) !!}
    <div class="col-md-10">
        {!! Form::text('name', isset($service_code->name) ? $service_code->name : old('name'), ['class'=>'form-control'] ) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('code', 'Код', ['class'=>'label-control col-md-2']) !!}
    <div class="col-md-10">
        {!! Form::text('code_id', isset($service_code->code_id) ? $service_code->code_id : old('code_id'), ['class'=>'form-control'] ) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('type', 'Тип', ['class'=>'label-control col-md-2']) !!}
    <div class="col-md-10">
        {!! Form::select('sct_id', $service_code_type, isset($service_code->sct_id) ? $service_code->sct_id : old('sct_id'), ['class'=>'form-control'] ) !!}
    </div>
</div>


<div class="form-group">
    <div class="col-md-10 col-md-offset-2">
        {!! Form::submit('Сохранить изменения', ['class'=>'btn btn-primary btn-block']) !!}
    </div>
</div>
{!! Form::close() !!}

<a href="{{ URL::previous() }}" class="btn btn-primary">Назад</a>