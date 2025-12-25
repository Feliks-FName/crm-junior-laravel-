<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Добавить клиента
            </h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="post" action="{{ route('clients.store') }}" class="mt-6 space-y-6 max-w-2xl" autocomplete="off">
                @csrf
                @method('post')

                <div>
                    <x-input-label :value="__('Имя*')"/>
                    <input type="text" name="name" value="{{ old('name') }}"
                           class="w-full rounded-md px-3 py-2 text-sm border {{ $errors->has('name') ? 'border-red-500 focus:ring-red-500 focus:border-red-500' : 'border-gray-300 focus:ring-indigo-500 focus:border-indigo-500' }} focus:ring-2 focus:outline-none transition">

                    @error('name')
                    <x-input-error :messages="[$message]" class="mt-2"></x-input-error>
                    @enderror
                </div>

                <div>
                    <x-input-label :value="__('Телефон*')"/>
                    <input type="tel" name="phone" value="{{ old('phone') }}"
                           class="w-full rounded-md px-3 py-2 text-sm border {{ $errors->has('phone') ? 'border-red-500 focus:ring-red-500 focus:border-red-500' : 'border-gray-300 focus:ring-indigo-500 focus:border-indigo-500' }} focus:ring-2 focus:outline-none transition">

                    @error('phone')
                    <x-input-error :messages="[$message]" class="mt-2"></x-input-error>
                    @enderror
                </div>

                <div>
                    <x-input-label :value="__('Email')"/>
                    <input type="text" name="email" value="{{ old('email') }}"
                           class="w-full rounded-md px-3 py-2 text-sm border {{ $errors->has('email') ? 'border-red-500 focus:ring-red-500 focus:border-red-500' : 'border-gray-300 focus:ring-indigo-500 focus:border-indigo-500' }} focus:ring-2 focus:outline-none transition">

                    @error('email')
                    <x-input-error :messages="[$message]" class="mt-2"></x-input-error>
                    @enderror
                </div>

                <div>
                    <x-input-label :value="__('Название компании')"/>
                    <input type="text" name="company" value="{{ old('company') }}"
                           class="w-full rounded-md px-3 py-2 text-sm border {{ $errors->has('company') ? 'border-red-500 focus:ring-red-500 focus:border-red-500' : 'border-gray-300 focus:ring-indigo-500 focus:border-indigo-500' }} focus:ring-2 focus:outline-none transition">

                    @error('company')
                    <x-input-error :messages="[$message]" class="mt-2"></x-input-error>
                    @enderror
                </div>

                <button type="submit" class="w-full rounded-md px-3 py-2 text-sm border bg-gray-300 hover:bg-gray-100 transition">Добавить</button>

            </form>

        </div>
    </div>
</x-app-layout>
