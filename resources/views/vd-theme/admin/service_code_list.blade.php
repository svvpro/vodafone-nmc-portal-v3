<div class="row">
    <div class="col-md-12">
        <a class="btn btn-primary" href="{{ route('admin.service-code.create') }}">Добавить <i class="fa fa-plus" aria-hidden="true"></i></a>
    </div>
</div>
@if($service_codes)
    <table class="table table-striped">
        <thead>
        <tr>
            <th>id</th>
            <th>Код</th>
            <th>Тип</th>
            <th>Описание</th>
        </tr>
        </thead>
        <tbody>
        @foreach($service_codes as $service_code)
            <tr>
                <td>{{ $service_code->id }}</td>
                <td>{{ $service_code->code_id }}</td>
                <td>{{ $service_code->serviceCodeType->name }}</td>
                <td>{{ $service_code->name}}</td>

                <td style="width: 220px">
                    {{ link_to_route('admin.service-code.edit', 'Редактировать', $service_code->id, ['class'=>'btn btn-warning pull-left']) }}

                    {!! Form::open(['route'=>['admin.service-code.destroy', $service_code->id], 'method'=>'DELETE']) !!}
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
