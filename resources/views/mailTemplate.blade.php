{{-- @extends('layouts.base')
@section('title', 'Contacts')
@section('content') --}}

<div class="w-50 m-auto">
    <p>
        Ваша форма отправлена успешно!
    </p>
    <p>
        Имя : {{$data->name}} {{$data->surname ?? ''}}
    </p>
    <p>
    Почта : {{$data->email}}    
    </p>
    <p>
   Проект : {{$data->subject ?? 'Заявка на работу'}}    
    </p>
    <p>
    Сообщение : {{$data->message ?? ($data->professional_plans ?? 'Заявка отправлена')}}    
    </p>
    @if(isset($data->phone))
    <p>
    Телефон : {{$data->phone}}    
    </p>
    @endif
    @if(isset($data->expected_salary))
    <p>
    Ожидаемая зарплата : {{$data->expected_salary}}    
    </p>
    @endif
</div>
{{-- @endsection --}}

{{-- @endsection --}}
