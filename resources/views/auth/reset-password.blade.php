@extends('layouts.auth')

@section('title',"Восстановление пароля")
@section('content')
    @dump($errors)
    <x-forms.auth-forms title="Восстановление пароля" action="{{route('password.update')}}" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{$token}}">
        <x-forms.text-input
            name='email'
            type='email'
            placeholder='E-mail'
            value="{{request('email')}}"
            :isError="$errors->has('email')"
            required='true'
        />
        @error('email')
        <x-forms.error>
            {{$message}}
        </x-forms.error>
        @enderror

        <x-forms.text-input
            name='password'
            placeholder='Пароль'
            type="password"
            :isError="$errors->has('password')"
            required='true'
        />
        @error('password')
        <x-forms.error>
            {{$message}}
        </x-forms.error>
        @enderror

        <x-forms.text-input
            name='password_confirmation'
            placeholder='Повторите пароль'
            type="password"
            :isError="$errors->has('password')"
            required='true'
        />
        @error('password')
        <x-forms.error>
            {{$message}}
        </x-forms.error>
        @enderror

        <x-forms.primary-button>
            Обновить пароль
        </x-forms.primary-button>
        <x-slot:socialAuth></x-slot:socialAuth>
        <x-slot:buttons>
            <div class="space-y-3 mt-5">

                <div class="text-xxs md:text-xs">
                    <a href="{{route('login')}}"
                       class="text-white hover:text-white/70 font-bold">Вспомнил пароль</a>
                </div>
            </div>
        </x-slot:buttons>
    </x-forms.auth-forms>

@endsection
