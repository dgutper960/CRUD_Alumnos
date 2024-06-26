<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista de estudiantes') }}
        </h2>
    </x-slot>

    @include('student.partials.menu')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">



            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <!-- Pintamos la tabla para mostrar los alumnos -->
                <table class="min-w-full bg-white dark:bg-gray-800 rounded-lg">
                    <thead>
                        <tr
                            class="w-full bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-300 uppercase text-sm leading-normal">
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
                            <tr
                                class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600">
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
                                        <a href="{{ route('students.edit', $alumno->id) }}" title="Editar"
                                            class="text-blue-600 hover:text-blue-800">
                                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                                viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="square" stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M7 19H5a1 1 0 0 1-1-1v-1a3 3 0 0 1 3-3h1m4-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm7.441 1.559a1.907 1.907 0 0 1 0 2.698l-6.069 6.069L10 19l.674-3.372 6.07-6.07a1.907 1.907 0 0 1 2.697 0Z" />
                                            </svg>

                                        </a>
                                        <!-- mostrar -->
                                        <a href="{{ route('students.show', $alumno->id) }}" title="Mostrar"
                                            class="text-yellow-600 hover:text-yellow-800">
                                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                                viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M18 14v4.833A1.166 1.166 0 0 1 16.833 20H5.167A1.167 1.167 0 0 1 4 18.833V7.167A1.166 1.166 0 0 1 5.167 6h4.618m4.447-2H20v5.768m-7.889 2.121 7.778-7.778" />
                                            </svg>

                                        </a>
                                        <!-- borrar -->
                                        <form style="display:inline;" method="POST"
                                            action="{{ route('students.destroy', $alumno->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800"
                                                onclick="return confirm('¿Borrar alumno {{$alumno->name}} de forma irreversible?')">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
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

            <br><br>
            <!-- Mostramos el num de registros -->
            <p>Número de registros: {{ count($alumnos) }}</p>
        </div>
    </div>

</x-app-layout>

