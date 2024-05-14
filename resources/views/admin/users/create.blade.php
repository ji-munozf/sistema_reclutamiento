<x-app-layout>
    <form action="{{ route('admin.users.store') }}" method="POST"
        class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">

        @csrf

        <x-validation-errors class="mb-4" />

        <div class="mb-4">
            <x-label class="mb-2">
                Nombre del usuario
            </x-label>

            <x-input name="name" type="text" class="w-full" placeholder="Ingrese el nombre del usuario" value="{{ old('name') }}" />
        </div>

        <div class="mb-4">
            <x-label class="mb-2">
                Email del usuario
            </x-label>

            <x-input name='email' type="email" class="w-full" placeholder="Ingrese el email del usuario" value="{{ old('email') }}" />
        </div>

        <div class="mb-4">
            <x-label class="mb-2">
                Contraseña
            </x-label>

            <x-input name='password' type="password" class="w-full" placeholder="Ingrese la contraseña del usuario" />
        </div>

        <div class="mb-4">
            <x-label class="mb-2">
                Confirmar contraseña
            </x-label>

            <x-input name='confirm_password' type="password" class="w-full" placeholder="Ingrese nuevamente la contraseña del usuario" />
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
                            :checked="in_array($role->id, old('roles', old('users', [])))" />
                            {{ $role->name }}
                        </x-lalbel>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="flex justify-end">
            <x-button>
                Crear usuario
            </x-button>
        </div>

    </form>
</x-app-layout>
