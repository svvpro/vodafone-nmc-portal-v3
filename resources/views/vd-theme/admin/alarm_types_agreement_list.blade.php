<div class="row">
    <div class="col-md-12">
        <a class="btn btn-primary" href="{{ route('admin.alarm-agreement-type.create') }}">Добавить  <i class="fa fa-plus" aria-hidden="true"></i></a>
    </div>
</div>
@if($atas)
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Название типа шаблона</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($atas as $ata)
            <tr>
                <td>{{ $ata->name }}</td>
                <td style="width: 220px">
                    {{ link_to_route('admin.alarm-agreement-type.edit', 'Редактировать', $ata->id, ['class'=>'btn btn-warning pull-left']) }}

                    {!! Form::open(['route'=>['admin.alarm-agreement-type.destroy', $ata->id], 'method'=>'DELETE']) !!}
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
