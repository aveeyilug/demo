@extends('template.app')
@section('title', 'register')
@section('content')
    <section class="new-request">
        <h2>Оставить новую заявку</h2>
        <form action="{{ route('create.order') }}" method="post" class="form-container">
            @csrf
            <label for="address">Адрес:</label>
            <input type="text" id="address" name="address" />
            @error('address')
                {{ $message }}
            @enderror
            <label for="phone">Телефон (+7(XXX)-XXX-XX-XX):</label>
            <input type="text" id="phone" name="phone" value="{{ auth()->user()->phone }}" pattern="\+7\(\d{3}\)-\d{3}-\d{2}-\d{2}"
                placeholder="+7(999)-123-45-67" />
            @error('phone')
                {{ $message }}
            @enderror
            <label for="date">Желаемая дата:</label>
            <input type="date" id="date" name="date" />
            @error('date')
                {{ $message }}
            @enderror
            <label for="time">Желаемое время:</label>
            <input type="time" id="time" name="time" />
            @error('time')
                {{ $message }}
            @enderror
            <label for="service">Вид услуги:</label>
            <select id="service" name="service_id">
                <option value="">Не выбрано</option>
                @foreach ($services as $service)
                    <option value="{{ $service->id }}">{{ $service->title }}</option>
                @endforeach
            </select>
            @error('service_id')
                {{ $message }}
            @enderror
            <div>
                <input type="checkbox" id="otherService" name="otherService" />
                <label for="otherService">Иная услуга</label>
            </div>

            <div id="otherServiceDescContainer">
                <label for="otherServiceDesc">Опишите услугу:</label>
                <textarea id="otherServiceDesc" name="other_service"></textarea>
            </div>
            @error('other_service')
                {{ $message }}
            @enderror

            <p>Предпочтительный тип оплаты:</p>
            <div>
                <input type="radio" id="cash" name="payment" value="cash" />
                <label for="cash">Наличные</label>
            </div>
            <div>
                <input type="radio" id="card" name="payment" value="card" checked />
                <label for="card">Банковская карта</label>
            </div>

            @error('payment')
                {{ $message }}
            @enderror
            <button type="submit">Отправить заявку</button>
        </form>
    </section>
@endsection
