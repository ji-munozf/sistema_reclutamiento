<x-app-layout>

    <form action="{{ route('admin.users.update', $user) }}" method="POST"
        class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">

        @csrf
        @method('PUT')

        <x-validation-errors class="mb-4" />

        <div class="mb-4">
            <x-label class="mb-2">
                Nombre del usuario
            </x-label>

            <x-input type="text" id="name" name="name" class="w-full" value="{{ old('name', $user->name) }}" />
        </div>

        <div class="mb-4">
            <x-label class="mb-2">
                Email del usuario
            </x-label>

            <x-input type="email" id="email" name="email" class="w-full"
                value="{{ old('email', $user->email) }}" />
        </div>

        <div class="mb-4">
            <x-label class="mb-2">
                Rol del usuario
            </x-label>
            <ul>
                @foreach ($roles as $role)
                    <li>
                        <x-label>
                            <x-checkbox name="roles[]"
                            value="{{ $role->id }}"
                            :checked="in_array($role->id, old('roles', $user->roles->pluck('id')->toArray()))" />
                            {{ $role->name }}
                        </x-lalbel>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="flex justify-end">
            <x-button>
                Actualizar usuario
            </x-button>
        </div>

    </form>
</x-app-layout>
