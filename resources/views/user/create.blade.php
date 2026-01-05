<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Добавить сотрудника
            </h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="post" action="{{ route('users.store') }}" class="mt-6 space-y-6 max-w-2xl" autocomplete="off">
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
                    <x-input-label :value="__('Email*')"/>
                    <input type="text" name="email" value="{{ old('email') }}"
                           class="w-full rounded-md px-3 py-2 text-sm border {{ $errors->has('email') ? 'border-red-500 focus:ring-red-500 focus:border-red-500' : 'border-gray-300 focus:ring-indigo-500 focus:border-indigo-500' }} focus:ring-2 focus:outline-none transition">

                    @error('email')
                    <x-input-error :messages="[$message]" class="mt-2"></x-input-error>
                    @enderror
                </div>

                <div>
                    <x-input-label :value="__('Роль*')"/>
                    <select name="role"
                            class="w-full rounded-md px-3 py-2 text-sm border {{ $errors->has('role') ? 'border-red-500 focus:ring-red-500 focus:border-red-500' : 'border-gray-300 focus:ring-indigo-500 focus:border-indigo-500' }} focus:ring-2 focus:outline-none transition">
                        <option value="" selected disabled>Выбрать роль</option>
                        @foreach($roles as $role => $value)
                            <option value="{{ $role }}">{{ $value }}</option>
                        @endforeach
                    </select>

                    @error('role')
                    <x-input-error :messages="[$message]" class="mt-2"></x-input-error>
                    @enderror
                </div>

                <button type="submit"
                        class="w-full rounded-md px-3 py-2 text-sm border bg-gray-300 hover:bg-gray-100 transition">
                    Добавить
                </button>

            </form>

        </div>
    </div>
</x-app-layout>
