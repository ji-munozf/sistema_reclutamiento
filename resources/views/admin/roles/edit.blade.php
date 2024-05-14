<x-app-layout>

    <form action="{{ route('admin.roles.update', $role) }}" method="POST"
        class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">

        @csrf
        @method('PUT')

        <x-validation-errors class="mb-4" />

        <div class="mb-4">
            <x-label class="mb-2">
                Nombre del rol
            </x-label>

            <x-input type="text" id="name" name="name" class="w-full" value="{{ old('name', $role->name) }}" />
        </div>

        <div class="mb-4">
            <x-label class="mb-2">
                Permisos
            </x-label>
            <ul>
                @foreach ($permissions as $permission)
                    <li>
                        <x-label>
                            <x-checkbox name="permissions[]"
                            value="{{ $permission->id }}"
                            :checked="in_array($permission->id, old('permissions', $role->permissions->pluck('id')->toArray()))" />
                            {{ $permission->name }}
                        </x-label>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="flex justify-end">
            <x-button>
                Actualizar rol
            </x-button>
        </div>
    </form>

</x-app-layout>
