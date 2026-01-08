<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Клиенты
            </h2>

            @can('create')
                <a href="{{ route('clients.create') }}"
                   class="bg-indigo-600 text-white px-4 py-2 rounded-md text-sm hover:bg-indigo-700 transition">
                    + Добавить клиента
                </a>
            @endcan
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded shadow overflow-hidden">

                <table class="min-w-full border-collapse">
                    <thead class="bg-gray-50 border-b">
                    <tr>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">
                            Имя
                        </th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">
                            Телефон
                        </th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">
                            Email
                        </th>
                        <th class="px-4 py-3 text-right text-sm font-semibold text-gray-600">
                            Действия
                        </th>
                    </tr>
                    </thead>

                    <tbody class="divide-y">
                    @foreach($clients as $client)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-3 font-medium">
                                {{ $client->name }}
                            </td>

                            <td class="px-4 py-3 text-gray-600">
                                {{ $client->phone }}
                            </td>

                            <td class="px-4 py-3 text-gray-600">
                                {{ $client->email }}
                            </td>

                            <td class="px-4 py-3 text-right space-x-2">
                                <a href="{{ route('clients.show', $client->id) }}"
                                   class="text-indigo-600 hover:underline text-sm">
                                    Смотреть
                                </a>
                                @can('update', $client)
                                    <a href="{{ route('clients.edit', $client->id) }}"
                                       class="text-gray-600 hover:underline text-sm">
                                        Редактировать
                                    </a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                @if($clients->isEmpty())
                    <div class="p-6 text-center text-gray-500">
                        Клиентов пока нет
                    </div>
                @endif


            </div>

            <!-- Пагинация -->
            <div class="mt-4">
                {{ $clients->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
