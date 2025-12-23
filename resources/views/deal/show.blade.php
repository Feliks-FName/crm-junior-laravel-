<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Сделка: {{ $deal->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            <!-- Шапка сделки -->
            <div class="bg-white p-6 rounded shadow mb-6">
                <div class="flex justify-between items-center">
                    <div>
                        <h1 class="text-2xl font-bold">{{ $deal->name }}</h1>
                        <p class="text-sm text-gray-500">
                            Создана {{ $deal->created_at->format('d.m.Y') }}
                        </p>
                    </div>

                    <span class="px-3 py-1 rounded text-sm font-medium
                        @if($deal->status->code === 'new') bg-blue-100 text-blue-700
                        @elseif($deal->status->code === 'in_work') bg-yellow-100 text-yellow-700
                        @elseif($deal->status->code === 'closed') bg-green-100 text-green-700
                        @endif
                    ">
                        {{ $deal->status->name }}
                    </span>
                </div>
            </div>

            <!-- Основной контент -->
            <div class="grid grid-cols-3 gap-6">

                <!-- Левая колонка -->
                <div class="col-span-2 bg-white p-6 rounded shadow">
                    <h3 class="text-lg font-semibold mb-4">Информация о сделке</h3>

                    <div class="space-y-3">
                        <div>
                            <span class="text-gray-500 text-sm">Клиент</span>
                            <div class="font-medium">
                                {{ $deal->client->name ?? '—' }}
                            </div>
                        </div>

                        <div>
                            <span class="text-gray-500 text-sm">Телефон</span>
                            <div class="font-medium">
                                {{ $deal->client->phone ?? '—' }}
                            </div>
                        </div>

                        <div>
                            <span class="text-gray-500 text-sm">Ответственный</span>
                            <div class="font-medium">
                                {{ $deal->user->name }}
                            </div>
                        </div>

                        <div>
                            <span class="text-gray-500 text-sm">Комментарий</span>
                            <div class="font-medium">
                                {{ $deal->comments ?? 'Нет комментариев' }}
                            </div>
                        </div>

                        <!-- UTM -->
                        <div>
                            <div class="text-gray-500 text-sm">utm_source</div>
                            <div class="mt-1 font-medium text-gray-900">
                                {{ $deal->utm_source ?? '' }}
                            </div>
                        </div>

                        <div>
                            <div class="text-gray-500 text-sm">utm_medium</div>
                            <div class="mt-1 font-medium text-gray-900">
                                {{ $deal->utm_medium ?? '' }}
                            </div>
                        </div>

                        <div>
                            <div class="text-gray-500 text-sm">utm_campaign</div>
                            <div class="mt-1 font-medium text-gray-900">
                                {{ $deal->utm_campaign ?? '' }}
                            </div>
                        </div>

                        <div>
                            <div class="text-gray-500 text-sm">utm_content</div>
                            <div class="mt-1 font-medium text-gray-900">
                                {{ $deal->utm_content ?? '' }}
                            </div>
                        </div>

                        <div>
                            <div class="text-gray-500 text-sm">utm_term</div>
                            <div class="mt-1 font-medium text-gray-900">
                                {{ $deal->utm_term ?? '' }}
                            </div>
                        </div>
                    </div>
                </div>



                <!-- Правая колонка -->
                <div class="bg-white p-6 rounded shadow">
                    <h3 class="text-lg font-semibold mb-4">Действия</h3>

                    <div class="space-y-3">
                        <a href="{{ route('deal.edit', $deal->id) }}"
                           class="block text-center bg-blue-600 text-white py-2 rounded hover:bg-blue-700 mb-4">
                            Редактировать
                        </a>

                        <form method="POST" action="">
                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700"
                                onclick="return confirm('Удалить сделку?')"
                            >
                                Удалить
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>


