<div class="row">
    <div class="col-md-12">
        <a class="btn btn-primary" href="{{ route('admin.engineer.create') }}">Добавить <i class="fa fa-plus" aria-hidden="true"></i></a>
    </div>
</div>
@if($engineers)
    <table class="table table-striped">
        <thead>
        <tr>
            <th>id</th>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Отчество</th>
            <th>PBX</th>
            <th>Моб.тел</th>
            <th>E-mail</th>
            <th>Отдел/Группа</th>
        </tr>
        </thead>
        <tbody>
        @foreach($engineers as $engineer)
            <tr>
                <td>{{ $engineer->id }}</td>
                <td>{{ $engineer->surname }}</td>
                <td>{{ $engineer->name }}</td>
                <td>{{ $engineer->middle_name}}</td>
                <td>{{ $engineer->pbx}}</td>
                <td>{{ $engineer->mobile_phone}}</td>
                <td>{{ $engineer->email}}</td>
                <td>{{ $engineer->departament->name}}</td>

                <td style="width: 220px">
                    {{ link_to_route('admin.engineer.edit', 'Редактировать', $engineer->id, ['class'=>'btn btn-warning pull-left']) }}

                    {!! Form::open(['route'=>['admin.engineer.destroy', $engineer->id], 'method'=>'DELETE']) !!}
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