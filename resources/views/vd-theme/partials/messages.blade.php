{{-- Ошибки валидации --}}

@if(count($errors)>0)
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
        <li>
            {{ $error }}
        </li>
        @endforeach
    </ul>
@endif

{{--Статусы ошибочных операций CRUD--}}

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

{{--Статусы  успешных операций CRUD--}}

@if(session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
@endif