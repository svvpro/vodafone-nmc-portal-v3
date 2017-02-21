<div class="row">
    <div class="col-md-12">
        <a class="btn btn-primary" href="{{ route('admin.category.create') }}">Добавить  <i class="fa fa-plus" aria-hidden="true"></i></a>
    </div>
</div>

@if($categories)
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Название</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td style="width: 220px">
                    {{ link_to_route('admin.category.edit', 'Редактировать', $category->id, ['class'=>'btn btn-warning pull-left']) }}

                    {!! Form::open(['route'=>['admin.category.destroy', $category->id], 'method'=>'DELETE']) !!}
                    {!! Form::submit('Удалить', ['class'=>'btn btn-danger pull-right']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <h2>Нет данных</h2>
@endif