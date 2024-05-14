<x-app-layout>

    <div class="flex justify-end mb-4">
        <a class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 
            dark:bg-gray-200 dark:hover:bg-white focus:outline-none dark:text-black"
            href="{{ route('admin.users.create') }}">Nuevo</a>
    </div>

    @if ($users->count())
        <div class="relative overflow-x-auto mb-4">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr class="text-center">
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($users as $user)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $user->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $user->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $user->email }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('admin.users.edit', $user) }}">Editar</a>
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
                                    class="inline-block" id="deleteForm{{ $user->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="confirmDelete({{ $user->id }})"
                                        class="ml-2">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="p-4 mb-4 text-sm text-center text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-white"
            role="alert">
            Todavía no tiene roles registrados.
        </div>
    @endif

    <div class="mt-4">
        {{ $users->links() }}
    </div>

    @push('js')
        <script>
            function confirmDelete(id) {
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "No podrás revertir esta acción",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: 'green',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('deleteForm' + id).submit();
                    }
                })
            }
        </script>
    @endpush

</x-app-layout>
