<div class="row">
    <div class="col-md-12">
        <a class="btn btn-primary" href="{{ route('admin.system.create') }}">Добавить  <i class="fa fa-plus" aria-hidden="true"></i></a>
    </div>
</div>
@if($systems)
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Название</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($systems as $system)
            <tr>
                <td>{{ $system->name }}</td>
                <td style="width: 220px">
                    {{ link_to_route('admin.system.edit', 'Редактировать', $system->id, ['class'=>'btn btn-warning pull-left']) }}

                    {!! Form::open(['route'=>['admin.system.destroy', $system->id], 'method'=>'DELETE']) !!}
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
