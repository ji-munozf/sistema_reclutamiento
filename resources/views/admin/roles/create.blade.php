<x-app-layout>

    <div class="bg-white shadow rounded-lg p-6 dark:bg-gray-700">
        <form action="{{ route('admin.roles.store') }}" method="POST">
            @csrf   

            <x-validation-errors class="mb-4" />

            <div class="mb-4">
                <x-label class="mb-2">
                    Nombre del rol
                </x-label>
                <x-input name="name" type="text" class="w-full" placeholder="Ingrese el nombre del rol" value="{{ old('name') }}" />
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
                                :checked="in_array($permission->id, old('permissions', []))" />
                                {{ $permission->name }}
                            </x-label>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="flex justify-end">
                <x-button>
                    Crear rol
                </x-button>
            </div>
        </form>
    </div>

</x-app-layout>
