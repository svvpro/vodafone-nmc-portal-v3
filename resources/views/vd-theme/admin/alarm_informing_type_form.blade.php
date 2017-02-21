{!! Form::open(['url' => isset($ait->id) ? route('admin.alarm-informing-type.update', $ait->id) : route('admin.alarm-informing-type.store'), 'class'=>'form-horizontal well']) !!}

@if(isset($ait->id))
    {!! Form::hidden('_method', 'PUT') !!}
@endif

<div class="form-group">
    {!! Form::label('name', 'Тип инфорирования', ['class'=>'control-label col-md-2']) !!}
    <div class="col-md-10">
        {!! Form::text('name', isset($ait->name) ? $ait->name : old('name'), ['class'=>'form-control'] ) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('email', 'E-mail', ['class'=>'control-label col-md-2']) !!}
    <div class="col-md-10">
        {!! Form::text('email', isset($ait->email) ? $ait->email : old('email'), ['class'=>'form-control'] ) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('engineer_prefix', 'Формат отоображения отв.инженера', ['class'=>'control-label col-md-2']) !!}
    <div class="col-md-10">
        {!! Form::text('engineer_prefix', isset($ait->engineer_prefix) ? $ait->engineer_prefix: old('engineer_prefix'), ['class'=>'form-control'] ) !!}
    </div>
</div>


<div class="form-group">
    {!! Form::label('categorty_id', 'Категория', ['class'=>'control-label col-md-2']) !!}
    <div class="col-md-10">
        {!! Form::select('category_id', $categories, isset($ait->category_id) ? $ait->category_id : old('category_id'), ['class'=>'form-control'] ) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-10 col-md-offset-2">
        {!! Form::submit('Сохранить изменения', ['class'=>'btn btn-primary btn-block']) !!}
    </div>
</div>
{!! Form::close() !!}

<a href="{{ URL::previous() }}" class="btn btn-primary">Назад</a>