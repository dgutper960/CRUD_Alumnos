<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista de estudiantes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                    <!-- Pintamos la tabla para mostrar los alumnos -->
                    <table class="min-w-full bg-white dark:bg-gray-800 rounded-lg">
                        <thead>
                            <tr class="w-full bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-300 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">ID</th>
                                <th class="py-3 px-6 text-left">Nombre</th>
                                <th class="py-3 px-6 text-left">Apellidos</th>
                                <th class="py-3 px-6 text-left">Fecha Nac</th>
                                <th class="py-3 px-6 text-left">Teléfono</th>
                                <th class="py-3 px-6 text-left">Email</th>
                                <th class="py-3 px-6 text-left">Curso</th>
                                <th class="py-3 px-6 text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 dark:text-gray-400 text-sm font-light">
                            <!-- Recorremos los alumnos -->
                            @forelse ($alumnos as $alumno)
                                <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <td class="py-3 px-6 text-left">{{ $alumno['id'] }}</td>
                                    <td class="py-3 px-6 text-left">{{ $alumno->name }}</td>
                                    <td class="py-3 px-6 text-left">{{ $alumno['lastname'] }}</td>
                                    <td class="py-3 px-6 text-left">{{ $alumno['birth_date'] }}</td>
                                    <td class="py-3 px-6 text-left">{{ $alumno->phone }}</td>
                                    <td class="py-3 px-6 text-left">{{ $alumno['email'] }}</td>
                                    <td class="py-3 px-6 text-left">{{ $alumno->course->course }}</td>
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex item-center justify-center space-x-2">
                                            <!-- editar -->
                                            <a href="{{ route('students.edit', $alumno->id) }}" title="Editar" class="text-blue-600 hover:text-blue-800">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 11.036L3.268 16.768a4 4 0 005.656 5.656L14.964 15M9 11.036l3.536-3.536a2 2 0 012.828 0L18 9.036a2 2 0 010 2.828L13.964 15M9 11.036L3.268 16.768m0 0a4 4 0 005.656 5.656L14.964 15m0 0L18 9.036"></path></svg>
                                            </a>
                                            <!-- mostrar -->
                                            <a href="{{ route('students.show', $alumno->id) }}" title="Mostrar" class="text-yellow-600 hover:text-yellow-800">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553 4.553a2.828 2.828 0 010 4 2.828 2.828 0 01-4 0L10 15m-4 0L5.447 5.447a2.828 2.828 0 00-4 0 2.828 2.828 0 000 4L9 15"></path></svg>
                                            </a>
                                            <!-- borrar -->
                                            <form style="display:inline;" method="POST" action="{{ route('students.destroy', $alumno->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('¿Borrar alumno {{$alumno->name}} de forma irreversible?')">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center py-4">No hay estudiantes registrados.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

            </div>
        </div>
    </div>
</x-app-layout>
