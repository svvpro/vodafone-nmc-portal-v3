{!! Form::open(['url' => isset($user->id) ? route('admin.user.edit', $user->id) : route('admin.user.create'), 'class'=>'form-horizontal well']) !!}
<div class="form-group">
    {!! Form::label('surname', 'Фамилия', ['class'=>'label-control col-md-2']) !!}
    <div class="col-md-10">
        {!! Form::text('surname', isset($user->surname) ? $user->surname : old('surname'), ['class'=>'form-control'] ) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('name', 'Имя', ['class'=>'label-control col-md-2']) !!}
    <div class="col-md-10">
        {!! Form::text('name', isset($user->name) ? $user->name : old('name'), ['class'=>'form-control'] ) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('email', 'Email', ['class'=>'label-control col-md-2']) !!}
    <div class="col-md-10">
        {!! Form::text('email', isset($user->email) ? $user->email : old('email'), ['class'=>'form-control'] ) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('role', 'Роль', ['class'=>'label-control col-md-2']) !!}
    <div class="col-md-10">
        {!! Form::select('roles', $roles, null, ['class'=>'form-control'] ) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('email', 'Password', ['class'=>'label-control col-md-2']) !!}
    <div class="col-md-10">
        {!! Form::password('password', ['class'=>'form-control'] ) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-10 col-md-offset-2">
        {!! Form::submit('Сохранить изменения', ['class'=>'btn btn-primary btn-block']) !!}
    </div>
</div>
{!! Form::close() !!}

<a href="{{ URL::previous() }}" class="btn btn-primary">Назад</a>