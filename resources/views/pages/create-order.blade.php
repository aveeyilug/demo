@extends('template.app')
@section('title', 'register')
@section('content')
    <main>
        <section class="history">
            <h2>История заявок</h2>
            <!-- Здесь будет история заявок пользователя -->
            <ul>
                @forelse ($orders as $order)
                    <li>Заявка #{{ $order->id }}</li>
                @empty
                    <p>Заявок нету</p>
                @endforelse
            </ul>
        </section>
        <a href="{{ route('view.order.form') }}">Создание заявки</a>
    </main>
@endsection
