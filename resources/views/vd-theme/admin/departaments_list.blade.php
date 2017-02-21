<div class="row">
    <div class="col-md-12">
        <a class="btn btn-primary" href="{{ route('admin.departament.create') }}">Добавить  <i class="fa fa-plus" aria-hidden="true"></i></a>
    </div>
</div>

@if($departaments)
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Название</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($departaments as $departament)
            <tr>
                <td>{{ $departament->name }}</td>
                <td style="width: 220px">
                    {{ link_to_route('admin.departament.edit', 'Редактировать', $departament->id, ['class'=>'btn btn-warning pull-left']) }}

                    {!! Form::open(['route'=>['admin.departament.destroy', $departament->id], 'method'=>'DELETE']) !!}
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