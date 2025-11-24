@extends('template.app')
@section('title', 'register')
@section('content')
<main>
    <form action="{{ route('login' )}}" method="post" class="form-container">
        @csrf
        <label for="login">Логин:</label>
        <input type="text" id="login" name="login" />
        @error('login')
            {{ $message }}
        @enderror
        <label for="password">Пароль:</label>
        <input type="password" id="password" name="password"/>
        @error('password')
            {{ $message }}
        @enderror

        <button type="submit">Войти</button>
    </form>
</main>
@endsection
