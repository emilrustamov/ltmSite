{{-- @extends('layouts.base')
@section('title', 'Contacts')
@section('content') --}}

<div class="w-50 m-auto" style="width: 50%; margin: 0 auto; font-family: Arial, sans-serif; padding: 20px;">
    <h2 style="color: #333; margin-bottom: 20px;">
        @if(isset($data->surname))
            Новая заявка на работу
        @else
            Ваша форма отправлена успешно!
        @endif
    </h2>
    
    <div style="background: #f5f5f5; padding: 15px; margin-bottom: 15px; border-radius: 5px;">
        <h3 style="color: #555; margin-top: 0;">Основная информация</h3>
        <p><strong>Имя:</strong> {{$data->name}} {{$data->surname ?? ''}}</p>
        <p><strong>Почта:</strong> {{$data->email}}</p>
        @if(isset($data->phone))
        <p><strong>Телефон:</strong> {{$data->phone}}</p>
        @endif
        @if(isset($data->date_of_birth) && $data->date_of_birth)
        <p><strong>Дата рождения:</strong> {{$data->date_of_birth->format('d.m.Y')}}</p>
        @endif
    </div>

    @if(isset($data->surname))
    {{-- Это заявка на работу - показываем все поля --}}
    
    @if($data->city || $data->custom_city)
    <div style="background: #f5f5f5; padding: 15px; margin-bottom: 15px; border-radius: 5px;">
        <h3 style="color: #555; margin-top: 0;">Местоположение</h3>
        @if($data->city)
        <p><strong>Город:</strong> {{$data->city->name_ru ?? $data->city->name_en ?? $data->city->name_tm}}</p>
        @elseif($data->custom_city)
        <p><strong>Город:</strong> {{$data->custom_city}}</p>
        @endif
        @if($data->registration_address)
        <p><strong>Адрес регистрации:</strong> {{$data->registration_address}}</p>
        @endif
    </div>
    @endif

    @if($data->source || $data->custom_source)
    <div style="background: #f5f5f5; padding: 15px; margin-bottom: 15px; border-radius: 5px;">
        <h3 style="color: #555; margin-top: 0;">Источник</h3>
        @if($data->source)
        <p><strong>Источник:</strong> {{$data->source->name_ru ?? $data->source->name_en ?? $data->source->name_tm}}</p>
        @elseif($data->custom_source)
        <p><strong>Источник:</strong> {{$data->custom_source}}</p>
        @endif
    </div>
    @endif

    @if($data->workFormat || $data->custom_work_format)
    <div style="background: #f5f5f5; padding: 15px; margin-bottom: 15px; border-radius: 5px;">
        <h3 style="color: #555; margin-top: 0;">Формат работы</h3>
        @if($data->workFormat)
        <p><strong>Формат работы:</strong> {{$data->workFormat->name_ru ?? $data->workFormat->name_en ?? $data->workFormat->name_tm}}</p>
        @elseif($data->custom_work_format)
        <p><strong>Формат работы:</strong> {{$data->custom_work_format}}</p>
        @endif
    </div>
    @endif

    @if($data->education || $data->custom_education)
    <div style="background: #f5f5f5; padding: 15px; margin-bottom: 15px; border-radius: 5px;">
        <h3 style="color: #555; margin-top: 0;">Образование</h3>
        @if($data->education)
        <p><strong>Образование:</strong> {{$data->education->name_ru ?? $data->education->name_en ?? $data->education->name_tm}}</p>
        @elseif($data->custom_education)
        <p><strong>Образование:</strong> {{$data->custom_education}}</p>
        @endif
    </div>
    @endif

    @if($data->jobPositions && $data->jobPositions->count() > 0)
    <div style="background: #f5f5f5; padding: 15px; margin-bottom: 15px; border-radius: 5px;">
        <h3 style="color: #555; margin-top: 0;">Желаемые должности</h3>
        <ul>
            @foreach($data->jobPositions as $position)
            <li>{{$position->name_ru ?? $position->name_en ?? $position->name_tm}}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if($data->languages && $data->languages->count() > 0)
    <div style="background: #f5f5f5; padding: 15px; margin-bottom: 15px; border-radius: 5px;">
        <h3 style="color: #555; margin-top: 0;">Языки</h3>
        <ul>
            @foreach($data->languages as $language)
            <li>{{$language->name_ru ?? $language->name_en ?? $language->name_tm}}</li>
            @endforeach
        </ul>
        @if($data->custom_language)
        <p><strong>Дополнительные языки:</strong> {{$data->custom_language}}</p>
        @endif
    </div>
    @endif

    @if($data->technicalSkills && $data->technicalSkills->count() > 0)
    <div style="background: #f5f5f5; padding: 15px; margin-bottom: 15px; border-radius: 5px;">
        <h3 style="color: #555; margin-top: 0;">Технические навыки</h3>
        <ul>
            @foreach($data->technicalSkills as $skill)
            <li>
                {{$skill->name_ru ?? $skill->name_en ?? $skill->name_tm}}
                @if($skill->pivot->level)
                    (Уровень: {{$skill->pivot->level}})
                @endif
                @if($skill->pivot->experience_years)
                    (Опыт: {{$skill->pivot->experience_years}} лет)
                @endif
            </li>
            @endforeach
        </ul>
        @if($data->custom_technical_skill)
        <p><strong>Дополнительные навыки:</strong> {{$data->custom_technical_skill}}</p>
        @endif
    </div>
    @endif

    @if($data->workExperiences && $data->workExperiences->count() > 0)
    <div style="background: #f5f5f5; padding: 15px; margin-bottom: 15px; border-radius: 5px;">
        <h3 style="color: #555; margin-top: 0;">Опыт работы</h3>
        @foreach($data->workExperiences as $experience)
        <div style="margin-bottom: 10px; padding: 10px; background: #fff; border-left: 3px solid #007bff;">
            <p><strong>Компания:</strong> {{$experience->company_name}}</p>
            <p><strong>Должность:</strong> {{$experience->position}}</p>
            <p><strong>Период:</strong> 
                @if($experience->start_date)
                    {{$experience->start_date->format('d.m.Y')}} 
                @else
                    Не указано
                @endif
                - 
                @if($experience->end_date)
                    {{$experience->end_date->format('d.m.Y')}}
                @else
                    по настоящее время
                @endif
            </p>
            @if($experience->description)
            <p><strong>Описание:</strong> {{$experience->description}}</p>
            @endif
        </div>
        @endforeach
    </div>
    @endif

    @if($data->educationalInstitutions && $data->educationalInstitutions->count() > 0)
    <div style="background: #f5f5f5; padding: 15px; margin-bottom: 15px; border-radius: 5px;">
        <h3 style="color: #555; margin-top: 0;">Образовательные учреждения</h3>
        @foreach($data->educationalInstitutions as $institution)
        <div style="margin-bottom: 10px; padding: 10px; background: #fff; border-left: 3px solid #28a745;">
            <p><strong>Учебное заведение:</strong> {{$institution->institution_name}}</p>
            @if($institution->degree)
            <p><strong>Степень:</strong> {{$institution->degree}}</p>
            @endif
            @if($institution->faculty)
            <p><strong>Факультет:</strong> {{$institution->faculty}}</p>
            @endif
            @if($institution->start_date)
            <p><strong>Период:</strong> 
                {{$institution->start_date->format('d.m.Y')}} 
                - 
                @if($institution->end_date)
                    {{$institution->end_date->format('d.m.Y')}}
                @else
                    по настоящее время
                @endif
            </p>
            @endif
            @if($institution->description)
            <p><strong>Описание:</strong> {{$institution->description}}</p>
            @endif
        </div>
        @endforeach
    </div>
    @endif

    @if($data->linkedin_url || $data->github_url)
    <div style="background: #f5f5f5; padding: 15px; margin-bottom: 15px; border-radius: 5px;">
        <h3 style="color: #555; margin-top: 0;">Профили</h3>
        @if($data->linkedin_url)
        <p><strong>LinkedIn:</strong> <a href="{{$data->linkedin_url}}" target="_blank">{{$data->linkedin_url}}</a></p>
        @endif
        @if($data->github_url)
        <p><strong>GitHub:</strong> <a href="{{$data->github_url}}" target="_blank">{{$data->github_url}}</a></p>
        @endif
    </div>
    @endif

    @if($data->personal_info || $data->contact_info)
    <div style="background: #f5f5f5; padding: 15px; margin-bottom: 15px; border-radius: 5px;">
        <h3 style="color: #555; margin-top: 0;">Дополнительная информация</h3>
        @if($data->personal_info)
        <p><strong>Личная информация:</strong> {{$data->personal_info}}</p>
        @endif
        @if($data->contact_info)
        <p><strong>Контактная информация:</strong> {{$data->contact_info}}</p>
        @endif
    </div>
    @endif

    @if($data->expected_salary)
    <div style="background: #f5f5f5; padding: 15px; margin-bottom: 15px; border-radius: 5px;">
        <h3 style="color: #555; margin-top: 0;">Зарплата</h3>
        <p><strong>Ожидаемая зарплата:</strong> {{$data->expected_salary}}</p>
    </div>
    @endif

    @if($data->professional_plans)
    <div style="background: #f5f5f5; padding: 15px; margin-bottom: 15px; border-radius: 5px;">
        <h3 style="color: #555; margin-top: 0;">Профессиональные планы</h3>
        <p>{{$data->professional_plans}}</p>
    </div>
    @endif

    @if($data->other_notes)
    <div style="background: #f5f5f5; padding: 15px; margin-bottom: 15px; border-radius: 5px;">
        <h3 style="color: #555; margin-top: 0;">Дополнительные примечания</h3>
        <p>{{$data->other_notes}}</p>
    </div>
    @endif

    @if($data->cv_file)
    <div style="background: #f5f5f5; padding: 15px; margin-bottom: 15px; border-radius: 5px;">
        <h3 style="color: #555; margin-top: 0;">Резюме (CV)</h3>
        <p>
            <a href="{{asset('storage/' . $data->cv_file)}}" target="_blank" style="color: #007bff; text-decoration: none; font-weight: bold;">
                Скачать резюме
            </a>
        </p>
        <p style="color: #666; font-size: 12px;">Файл: {{basename($data->cv_file)}}</p>
    </div>
    @endif

    @else
    {{-- Это контактная форма --}}
    <div style="background: #f5f5f5; padding: 15px; margin-bottom: 15px; border-radius: 5px;">
        <p><strong>Проект:</strong> {{$data->subject ?? 'Заявка на работу'}}</p>
        <p><strong>Сообщение:</strong> {{$data->message ?? 'Заявка отправлена'}}</p>
    </div>
    @endif
</div>
{{-- @endsection --}}

{{-- @endsection --}}
