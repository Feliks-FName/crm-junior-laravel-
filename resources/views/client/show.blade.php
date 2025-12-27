<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Клиент: {{ $client->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            <!-- Шапка сделки -->
            <div class="bg-white p-6 rounded shadow mb-6">
                <div class="flex justify-between items-center">
                    <div>
                        <h1 class="text-2xl font-bold">{{ $client->name }}</h1>
                        <p class="text-sm text-gray-500">
                            Создан {{ $client->created_at->format('d.m.Y H:i:s') }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Основной контент -->
            <div class="grid grid-cols-3 gap-6">

                <!-- Левая колонка -->
                <div class="col-span-2 bg-white p-6 rounded shadow">
                    <h3 class="text-lg font-semibold mb-4">Информация о контакте</h3>

                    <div class="space-y-3">
                        <div>
                            <span class="text-gray-500 text-sm">Имя</span>
                            <div class="font-medium">
                                {{ $client->name }}
                            </div>
                        </div>

                        <div>
                            <span class="text-gray-500 text-sm">Телефон</span>
                            <div class="font-medium">
                                {{ $client->phone  }}
                            </div>
                        </div>

                        <div>
                            <span class="text-gray-500 text-sm">Email</span>
                            <div class="font-medium">
                                {{ $client->email  }}
                            </div>
                        </div>

                        <div>
                            <span class="text-gray-500 text-sm">Название компании</span>
                            <div class="font-medium">
                                {{ $client->company  }}
                            </div>
                        </div>

                        <div>
                            <span class="text-gray-500 text-sm">Участвует в сделках:</span>
                            <div class="font-medium">
                                <div class="flex">
                                    @foreach($client->deals as $deal)
                                        <a href=" {{ route('deals.show', $deal->id) }}" class="underline">{{ $deal->name }}</a> <span>в статусе {{ $deal->status->code }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Правая колонка -->
                <div class="bg-white p-6 rounded shadow">
                    <h3 class="text-lg font-semibold mb-4">Действия</h3>

                    <div class="space-y-3">
                        <a href="{{ route('clients.edit', $client->id) }}"
                           class="block text-center bg-blue-600 text-white py-2 rounded hover:bg-blue-700 mb-4">
                            Редактировать
                        </a>

                        <form method="POST" action="">
                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700"
                                onclick="return confirm('Удалить клиента?')"
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


