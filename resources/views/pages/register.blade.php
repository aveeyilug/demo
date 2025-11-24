@extends('template.app')
@section('title', 'register')
@section('content')
    <main>
        <form action="{{ route('register') }}" method="post" class="form-container">
            @csrf
            <label for="login">Логин (уникальный):</label>
            <input type="text" id="login" name="login" minlength="3" />
            @error('login')
                {{ $message }}
            @enderror
            <label for="username">ФИО (только кириллица и пробелы):</label>
            <input type="text" id="username" name="username" pattern="^[А-Яа-я\s]+$" />
            @error('username')
                {{ $message }}
            @enderror
            <label for="surname">ФИО (только кириллица и пробелы):</label>
            <input type="text" id="surname" name="surname" pattern="^[А-Яа-я\s]+$" />
            @error('surname')
                {{ $message }}
            @enderror
            <label for="patronymic">ФИО (только кириллица и пробелы):</label>
            <input type="text" id="patronymic" name="patronymic" pattern="^[А-Яа-я\s]+$" />
            @error('patronymic')
                {{ $message }}
            @enderror
            <label for="phone">Телефон (+7(XXX)-XXX-XX-XX):</label>
            <input type="text" id="phone" name="phone" pattern="\+7\(\d{3}\)-\d{3}-\d{2}-\d{2}"
                placeholder="+7(999)-123-45-67" />
            @error('phone')
                {{ $message }}
            @enderror
            <label for="email">Электронная почта:</label>
            <input type="email" id="email" name="email" />
            @error('email')
                {{ $message }}
            @enderror
            <label for="password">Пароль (минимум 6 символов):</label>
            <input type="password" id="password" name="password" minlength="6" />
            @error('password')
                {{ $message }}
            @enderror
            <label for="password">Подтверждение пароль (минимум 6 символов):</label>
            <input type="password" id="password" name="password_confirmation" minlength="6" />

            <button type="submit">Зарегистрироваться</button>
        </form>
    </main>
@endsection
