{!! Form::open(['url' => isset($engineer->id) ? route('admin.engineer.update', $engineer->id) : route('admin.engineer.store'), 'class'=>'form-horizontal well']) !!}
@if(isset($engineer->id))
    {!! Form::hidden('_method', 'PUT') !!}
@endif

<div class="form-group">
    {!! Form::label('surname', 'Фамилия', ['class'=>'control-label col-md-2']) !!}
    <div class="col-md-10">
        {!! Form::text('surname', isset($engineer->surname) ? $engineer->surname : old('surname'), ['class'=>'form-control'] ) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('name', 'Имя', ['class'=>'control-label col-md-2']) !!}
    <div class="col-md-10">
        {!! Form::text('name', isset($engineer->name) ? $engineer->name : old('name'), ['class'=>'form-control'] ) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('middle_name', 'Отчество', ['class'=>'control-label col-md-2']) !!}
    <div class="col-md-10">
        {!! Form::text('middle_name', isset($engineer->middle_name) ? $engineer->middle_name : old('middle_name'), ['class'=>'form-control'] ) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('pbx', 'PBX', ['class'=>'control-label col-md-2']) !!}
    <div class="col-md-10">
        {!! Form::text('pbx', isset($engineer->pbx) ? $engineer->pbx : old('pbx'), ['class'=>'form-control'] ) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('mobile_phone', 'Мобильный телефон', ['class'=>'lcontrol-label col-md-2']) !!}
    <div class="col-md-10">
        {!! Form::text('mobile_phone', isset($engineer->mobile_phone) ? $engineer->mobile_phone : old('mobile_phone'), ['class'=>'form-control'] ) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('email', 'E-mail', ['class'=>'control-label col-md-2']) !!}
    <div class="col-md-10">
        {!! Form::text('email', isset($engineer->email) ? $engineer->email : old('email'), ['class'=>'form-control'] ) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('departaments', 'Отдел / Группа', ['class'=>'control-label col-md-2']) !!}
    <div class="col-md-10">
        {!! Form::select('departament_id', $departaments, isset($engineer->departament_id) ? $engineer->departament_id : old('departament_id'), ['class'=>'form-control'] ) !!}
    </div>
</div>


<div class="form-group">
    <div class="col-md-10 col-md-offset-2">
        {!! Form::submit('Сохранить изменения', ['class'=>'btn btn-primary btn-block']) !!}
    </div>
</div>
{!! Form::close() !!}

<a href="{{ URL::previous() }}" class="btn btn-primary">Назад</a>