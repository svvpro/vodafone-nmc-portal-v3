<div class="row">
    <div class="col-md-12">
        <a class="btn btn-primary" href="{{ route('admin.user.create') }}">Добавить пользователя <i class="fa fa-plus" aria-hidden="true"></i></a>
    </div>
</div>
@if($users)
<table class="table table-striped">
    <thead>
    <tr>
        <th>Фамилия</th>
        <th>Имя</th>
    </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td style="width: 220px">
                    {{ link_to_route('admin.user.edit', 'Редактировать', $user->id, ['class'=>'btn btn-warning pull-left']) }}

                    {!! Form::open(['route'=>['admin.user.destroy', $user->id], 'method'=>'DELETE']) !!}
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
