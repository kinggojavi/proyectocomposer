<!-- resources/views/cases/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Lista de Casos</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Municipality</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Type of Contagion</th>
                <th>Status</th>
                <th>Date of Symptom</th>
                <th>Date of Death</th>
                <th>Date of Diagnosis</th>
                <th>Date of Recovery</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($cases as $case)
                <tr>
                    <td>{{ $case->id_case }}</td>
                    <td>{{ $case->id_municipality }}</td>
                    <td>{{ $case->age }}</td>
                    <td>{{ $case->id_gender }}</td>
                    <td>{{ $case->id_type_contagion }}</td>
                    <td>{{ $case->id_status }}</td>
                    <td>{{ $case->date_symptom }}</td>
                    <td>{{ $case->date_death }}</td>
                    <td>{{ $case->date_diagnosis }}</td>
                    <td>{{ $case->date_recovery }}</td>
                    <td>
                        <a href="{{ url('/cases/' . $case->id_case . '/edit') }}">Editar</a>
                        <form action="{{ url('/cases/' . $case->id_case) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="11">No hay casos registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ url('/cases/create') }}">Crear Nuevo Caso</a>
    @endsection

