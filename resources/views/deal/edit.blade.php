<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Обновить сделку: ') . $deal->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="post" action="{{ route('deal.update', $deal->id) }}" class="mt-6 space-y-6 max-w-2xl">
                @csrf
                @method('PUT')

                <div class="">
                    <p class="text-xl">Данные сделки</p>
                </div>
                <div>
                    <x-input-label :value="__('Название сделки*')"/>
                    <input type="text" name="name" value="{{ old('name') ?? $deal->name }}"
                           class="w-full rounded-md px-3 py-2 text-sm border {{ $errors->has('name') ? 'border-red-500 focus:ring-red-500 focus:border-red-500' : 'border-gray-300 focus:ring-indigo-500 focus:border-indigo-500' }} focus:ring-2 focus:outline-none transition">

                    @error('name')
                    <x-input-error :messages="[$message]" class="mt-2"></x-input-error>
                    @enderror
                </div>

                <div>
                    <x-input-label :value="__('Ответственный*')"/>
                    <select name="user_id"
                            class="w-full rounded-md px-3 py-2 text-sm border {{ $errors->has('user_id') ? 'border-red-500 focus:ring-red-500 focus:border-red-500' : 'border-gray-300 focus:ring-indigo-500 focus:border-indigo-500' }} focus:ring-2 focus:outline-none transition">
                        @foreach($users as $user)
                            <option
                                value="{{ $user->id }}" {{ $deal->user->id === $user->id ? 'selected' : ''}}>{{ $user->name}}
                                - {{ $user->email }}</option>
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

                        @foreach($statuses as $status)
                            <option
                                value="{{ $status->id }}" {{ $deal->status->id === $status->id ? 'selected' : '' }}>{{ $status->code }}</option>
                        @endforeach
                    </select>

                    @error('status_id')
                    <x-input-error :messages="[$message]" class="mt-2"></x-input-error>
                    @enderror
                </div>

                <div>
                    <x-input-label :value="__('Комментарий')"/>
                    <textarea type="text" name="comments"
                              class="w-full rounded-md px-3 py-2 text-sm border {{ $errors->has('comments') ? 'border-red-500 focus:ring-red-500 focus:border-red-500' : 'border-gray-300 focus:ring-indigo-500 focus:border-indigo-500' }} focus:ring-2 focus:outline-none transition">{{ old('comments') ?? $deal->comments }}</textarea>

                    @error('comments')
                    <x-input-error :messages="[$message]" class="mt-2"></x-input-error>
                    @enderror
                </div>

                <button type="submit" class="w-full rounded-md px-3 py-2 text-sm border bg-gray-300 hover:bg-gray-100 transition">Обновить сделку</button>

            </form>
        </div>
    </div>
</x-app-layout>
