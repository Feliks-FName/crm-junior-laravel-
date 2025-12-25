<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Добавить сделку') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="post" action="{{ route('deals.store') }}" class="mt-6 space-y-6 max-w-2xl" autocomplete="off">
                @csrf
                @method('post')

                <div class="">
                    <p class="text-xl">Данные сделки</p>
                </div>
                <div>
                    <x-input-label :value="__('Название сделки*')"/>
                    <input type="text" name="name" value="{{ old('name') }}"
                           class="w-full rounded-md px-3 py-2 text-sm border {{ $errors->has('name') ? 'border-red-500 focus:ring-red-500 focus:border-red-500' : 'border-gray-300 focus:ring-indigo-500 focus:border-indigo-500' }} focus:ring-2 focus:outline-none transition">

                    @error('name')
                    <x-input-error :messages="[$message]" class="mt-2"></x-input-error>
                    @enderror
                </div>

                <div>
                    <x-input-label :value="__('Ответственный*')"/>
                    <select name="user_id"
                            class="w-full rounded-md px-3 py-2 text-sm border {{ $errors->has('user_id') ? 'border-red-500 focus:ring-red-500 focus:border-red-500' : 'border-gray-300 focus:ring-indigo-500 focus:border-indigo-500' }} focus:ring-2 focus:outline-none transition">
                        <option disabled value="" selected>Выбрать ответсвенного</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name}} - {{ $user->email }}</option>
                        @endforeach
                    </select>

                    @error('user_id')
                    <x-input-error :messages="[$message]" class="mt-2"></x-input-error>
                    @enderror
                </div>

                <div>
                    <x-input-label :value="__('Статус сделки*')"/>
                    <select name="status_id"
                            class="w-full rounded-md px-3 py-2 text-sm border {{ $errors->has('status_id') ? 'border-red-500 focus:ring-red-500 focus:border-red-500' : 'border-gray-300 focus:ring-indigo-500 focus:border-indigo-500' }} focus:ring-2 focus:outline-none transition">
                        <option disabled value="" selected>Выбрать статус</option>
                        @foreach($statuses as $status)
                            <option value="{{ $status->id }}">{{ $status->code }}</option>
                        @endforeach
                    </select>

                    @error('status_id')
                    <x-input-error :messages="[$message]" class="mt-2"></x-input-error>
                    @enderror
                </div>

                <div>
                    <x-input-label :value="__('Комментарий')"/>
                    <textarea type="text" name="comments"
                              class="w-full rounded-md px-3 py-2 text-sm border {{ $errors->has('comments') ? 'border-red-500 focus:ring-red-500 focus:border-red-500' : 'border-gray-300 focus:ring-indigo-500 focus:border-indigo-500' }} focus:ring-2 focus:outline-none transition">{{ old('comments') }}</textarea>

                    @error('comments')
                        <x-input-error :messages="[$message]" class="mt-2"></x-input-error>
                    @enderror
                </div>

                <div class="">
                    <p class="text-xl">Данные клиента</p>
                </div>

                <div>
                    <x-input-label :value="__('Телефон*')"/>
                    <input type="tel" name="phone_client" value="{{ old('phone_client') }}"
                           class="w-full rounded-md px-3 py-2 text-sm border {{ $errors->has('phone_client') ? 'border-red-500 focus:ring-red-500 focus:border-red-500' : 'border-gray-300 focus:ring-indigo-500 focus:border-indigo-500' }} focus:ring-2 focus:outline-none transition">

                    @error('phone_client')
                    <x-input-error :messages="[$message]" class="mt-2"></x-input-error>
                    @enderror
                </div>

                <div>
                    <x-input-label :value="__('Имя клиента*')"/>
                    <input type="text" name="name_client" value="{{ old('name_client') }}"
                           class="w-full rounded-md px-3 py-2 text-sm border {{ $errors->has('name_client') ? 'border-red-500 focus:ring-red-500 focus:border-red-500' : 'border-gray-300 focus:ring-indigo-500 focus:border-indigo-500' }} focus:ring-2 focus:outline-none transition">

                    @error('name_client')
                    <x-input-error :messages="[$message]" class="mt-2"></x-input-error>
                    @enderror
                </div>

                <div>
                    <x-input-label :value="__('Email клиента')"/>
                    <input type="text" name="email_client" value="{{ old('name') }}"
                           class="w-full rounded-md px-3 py-2 text-sm border {{ $errors->has('email_client') ? 'border-red-500 focus:ring-red-500 focus:border-red-500' : 'border-gray-300 focus:ring-indigo-500 focus:border-indigo-500' }} focus:ring-2 focus:outline-none transition">

                    @error('email_client')
                    <x-input-error :messages="[$message]" class="mt-2"></x-input-error>
                    @enderror
                </div>
                <div>
                    <x-input-label :value="__('Название компании клиента')"/>
                    <input type="text" name="company_client_name" value="{{ old('company_client_name') }}"
                           class="w-full rounded-md px-3 py-2 text-sm border {{ $errors->has('company_client_name') ? 'border-red-500 focus:ring-red-500 focus:border-red-500' : 'border-gray-300 focus:ring-indigo-500 focus:border-indigo-500' }} focus:ring-2 focus:outline-none transition">

                    @error('company_client_name')
                    <x-input-error :messages="[$message]" class="mt-2"></x-input-error>
                    @enderror
                </div>

                <button type="submit" class="w-full rounded-md px-3 py-2 text-sm border bg-gray-300 hover:bg-gray-100 transition">Создать сделку</button>

            </form>
        </div>
    </div>
</x-app-layout>
