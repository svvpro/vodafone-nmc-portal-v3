<div class="row">
    <div class="col-md-12">
        <a class="btn btn-primary" href="{{ route('admin.alarm-template-type.create') }}">Добавить  <i class="fa fa-plus" aria-hidden="true"></i></a>
    </div>
</div>
@if($atts)
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Название типа шаблона</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($atts as $att)
            <tr>
                <td>{{ $att->name }}</td>
                <td style="width: 220px">
                    {{ link_to_route('admin.alarm-template-type.edit', 'Редактировать', $att->id, ['class'=>'btn btn-warning pull-left']) }}

                    {!! Form::open(['route'=>['admin.alarm-template-type.destroy', $att->id], 'method'=>'DELETE']) !!}
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
