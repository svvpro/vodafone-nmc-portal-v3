{!! Form::open(['url' => isset($category->id) ? route('admin.category.update', $category->id) : route('admin.category.store'), 'class'=>'form-horizontal well']) !!}

@if(isset($category->id))
    {!! Form::hidden('_method', 'PUT') !!}
@endif

<div class="form-group">
    {!! Form::label('name', 'Название', ['class'=>'control-label col-md-2']) !!}
    <div class="col-md-10">
        {!! Form::text('name', isset($category->name) ? $category->name : old('name'), ['class'=>'form-control'] ) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-10 col-md-offset-2">
        {!! Form::submit('Сохранить изменения', ['class'=>'btn btn-primary btn-block']) !!}
    </div>
</div>
{!! Form::close() !!}

<a href="{{ URL::previous() }}" class="btn btn-primary">Назад</a>