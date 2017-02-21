<div class="row">
    <div class="col-md-12">
        <a class="btn btn-primary" href="{{ route('admin.alarm-informing-type.create') }}">Добавить  <i class="fa fa-plus" aria-hidden="true"></i></a>
    </div>
</div>
@if($aits)
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Тип информирования</th>
            <th>E-mail</th>
            <th>Формат отоображения отв.инженера</th>
            <th>Категория</th>
        </tr>
        </thead>
        <tbody>
        @foreach($aits as $ait)
            <tr>
                <td>{{ $ait->name }}</td>
                <td>{{ $ait->email }}</td>
                <td>{{ $ait->engineer_prefix }}</td>
                <td>{{ $ait->category->name }}</td>
                <td style="width: 220px">
                    {{ link_to_route('admin.alarm-informing-type.edit', 'Редактировать', $ait->id, ['class'=>'btn btn-warning pull-left']) }}

                    {!! Form::open(['route'=>['admin.alarm-informing-type.destroy', $ait->id], 'method'=>'DELETE']) !!}
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
