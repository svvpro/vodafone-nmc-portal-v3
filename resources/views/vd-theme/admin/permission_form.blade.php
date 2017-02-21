{!! Form::open(['route'=>'admin.permission.store']) !!}
<table class="table table-striped">
    <thead>
    <tr>
        <th>
            Привилегии
        </th>
        @foreach($roles as $role)
            <th>{{ $role->name }}</th>
        @endforeach
    </tr>
    </thead>
    <tbody>
    @foreach($permissions as $permission)
        <tr>
            <td>{{ $permission->name }}</td>
            @foreach($roles as $role)
                <td>
                    @if($role->hasPermission($permission->name))
                        <input type="checkbox" checked name="{{ $role->id }}[]" value="{{ $permission->id }}">
                    @else
                        <input type="checkbox" name="{{ $role->id }}[]" value="{{ $permission->id }}">
                    @endif
                </td>
            @endforeach
        </tr>
    @endforeach

    </tbody>

</table>
{!! Form::submit('Сохранить изменения', ['class'=>'btn btn-primary btn-block']) !!}
{!! Form::close() !!}