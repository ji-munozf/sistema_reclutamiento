<x-app-layout>
    
    <form action="{{ route('admin.permissions.update', $permission) }}" method="POST"
        class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">

        @csrf
        @method('PUT')

        <x-validation-errors class="mb-4" />

        <div class="mb-4">
            <x-label class="mb-2">
                Nombre del permiso
            </x-label>

            <x-input type="text" id="name" name="name" class="w-full" value="{{ old('name', $permission->name) }}" />
        </div>

        <div class="flex justify-end">
            <x-button>
                Actualizar permiso
            </x-button>
        </div>
    </form>

</x-app-layout>
