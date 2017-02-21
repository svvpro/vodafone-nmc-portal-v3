{!! Form::open(['url' => isset($alarm_template->id) ? route('admin.alarm-template.update', $alarm_template->id) : route('admin.alarm-template.store'), 'class'=>'form-horizontal well']) !!}

@if(isset($alarm_template->id))
    {!! Form::hidden('_method', 'PUT') !!}
@endif

<div class="form-group">
    {!! Form::label('text', 'Текст шаблона', ['class'=>'control-label col-md-2']) !!}
    <div class="col-md-10">
        {!! Form::textarea('text', isset($alarm_template->text) ? $alarm_template->text : old('text'), ['class'=>'form-control'] ) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('system_id', 'Система', ['class'=>'control-label col-md-2']) !!}
    <div class="col-md-10">
        {!! Form::select('system_id', $systems, isset($alarm_template->system_id) ? $alarm_template->system_id : old('system_id'), ['class'=>'form-control'] ) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('template_type_id', 'Тип шаблона', ['class'=>'control-label col-md-2']) !!}
    <div class="col-md-10">
        {!! Form::select('template_type_id', $template_types, isset($alarm_template->template_type_id) ? $alarm_template->template_type_id : old('template_type_id'), ['class'=>'form-control'] ) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('agreement_type_id', 'Тип согласования', ['class'=>'control-label col-md-2']) !!}
    <div class="col-md-10">
        {!! Form::select('agreement_type_id', $agreement_types, isset($alarm_template->agreement_type_id) ? $alarm_template->agreement_type_id : old('agreement_type_id'), ['class'=>'form-control'] ) !!}
    </div>
</div>


<div class="form-group">
    <div class="col-md-10 col-md-offset-2">
        {!! Form::submit('Сохранить изменения', ['class'=>'btn btn-primary btn-block']) !!}
    </div>
</div>
{!! Form::close() !!}

<a href="{{ URL::previous() }}" class="btn btn-primary">Назад</a>