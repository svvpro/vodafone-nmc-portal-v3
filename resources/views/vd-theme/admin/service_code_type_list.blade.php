<div class="row">
    <div class="col-md-12">
        <a class="btn btn-primary" href="{{ route('admin.service-code-type.create') }}">Добавить  <i class="fa fa-plus" aria-hidden="true"></i></a>
    </div>
</div>
@if($scts)
<table class="table table-striped">
    <thead>
    <tr>
        <th>name</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
        @foreach($scts as $sct)
            <tr>
                <td>{{ $sct->name }}</td>
                <td style="width: 220px">
                    {{ link_to_route('admin.service-code-type.edit', 'Редактировать', $sct->id, ['class'=>'btn btn-warning pull-left']) }}

                    {!! Form::open(['route'=>['admin.service-code-type.destroy', $sct->id], 'method'=>'DELETE']) !!}
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
