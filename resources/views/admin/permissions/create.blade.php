<x-app-layout>

    <div class="bg-white shadow rounded-lg p-6 dark:bg-gray-700">
        <form action="{{ route('admin.permissions.store') }}" method="POST">
            @csrf   

            <x-validation-errors class="mb-4" />

            <div class="mb-4">
                <x-label class="mb-2">
                    Nombre del permiso
                </x-label>
                <x-input name="name" type="text" class="w-full" placeholder="Ingrese el nombre del permiso" value="{{ old('name') }}" />
            </div>

            <div class="flex justify-end">
                <x-button>
                    Crear permiso
                </x-button>
            </div>
        </form>
    </div>

</x-app-layout>
