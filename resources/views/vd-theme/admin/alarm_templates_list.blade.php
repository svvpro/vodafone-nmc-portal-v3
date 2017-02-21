<div class="row">
    <div class="col-md-12">
        <a class="btn btn-primary" href="{{ route('admin.alarm-template.create') }}">Добавить  <i class="fa fa-plus" aria-hidden="true"></i></a>
    </div>
</div>
@if($alarm_templates)
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Текст шаблона</th>
            <th>Система</th>
            <th>Тип шаблона</th>
            <th>Тип согласования</th>
        </tr>
        </thead>
        <tbody>
        @foreach($alarm_templates as $alarm_template)
            <tr>
                <td>{{ $alarm_template->text }}</td>
                <td>{{ $alarm_template->system->name }}</td>
                <td>{{ $alarm_template->templateType->name }}</td>
                <td>{{ $alarm_template->agreementType->name }}</td>
                <td style="width: 220px">
                    {{ link_to_route('admin.alarm-template.edit', 'Редактировать', $alarm_template->id, ['class'=>'btn btn-warning pull-left']) }}

                    {!! Form::open(['route'=>['admin.alarm-template.destroy', $alarm_template->id], 'method'=>'DELETE']) !!}
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