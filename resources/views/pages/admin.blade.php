@extends('template.app')
@section('title', 'register')
@section('content')
    <main>
        <section class="admin-requests">
            <h2>Все заявки</h2>
            <!-- Здесь будут отображаться все заявки для администратора -->
            <table>
                <thead>
                    <tr>
                        <th>ФИО</th>
                        <th>Контактные данные</th>
                        <th>Адрес</th>
                        <th>Дата и время</th>
                        <th>Вид услуги</th>
                        <th>Оплата</th>
                        <th>Статус</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                        <tr>
                            <td>{{ $order->user->username }} {{ $order->user->surname }} {{ $order->user->patronymic }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->address }}</td>
                            <td>{{ $order->date }} {{ $order->time }}</td>
                            <td>
                                @if (!empty($order->service_id))
                                    {{ $order->service->title }}
                                @else
                                    {{ $order->other_service }}
                                @endif
                            </td>
                            <td>{{ $order->payment }}</td>
                            <td>
                                <form action="{{ route('update.status', $order->id) }}" method="post">
                                    @csrf
                                    <select name="status">
                                        <option value="в работе" {{ $order->status === 'в работе' ? 'selected' : '' }}>В
                                            работе</option>
                                        <option value="выполнено" {{ $order->status === 'выполнено' ? 'selected' : '' }}>
                                            Выполнено</option>
                                        <option value="отменено" {{ $order->status === 'отменено' ? 'selected' : '' }}>
                                            Отменено</option>
                                    </select>
                                    <input type="text" name="comment" placeholder="Причина отмены" value="{{ !empty($order->comment) ? $order->comment : '' }}" />
                                    @error('error')
                                        {{ $message }}
                                    @enderror
                                    <button>Сохранить</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <p>Заказов не обнаружено</p>
                    @endforelse

                    <!-- Другие заявки -->
                </tbody>
            </table>
        </section>
    </main>
@endsection
