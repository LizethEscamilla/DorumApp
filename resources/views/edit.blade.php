<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Donor') }}
        </h2>
    </x-slot>

    <div class="container mt-4">
        <form class="form-group" method="POST" action="{{ action([\App\Http\Controllers\DonorController::class, 'update'], $donor->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group mb-3">
                <label for="name">Nombre:</label>
                <input type="text" name="name" value="{{ $donor->name }}" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                <input type="date" name="fecha_nacimiento" value="{{ $donor->fecha_nacimiento }}" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="tipo_sangre">Tipo de Sangre:</label>
                <input type="text" name="tipo_sangre" value="{{ $donor->tipo_sangre }}" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="genero">Género:</label>
                <select name="genero" value="{{ $donor->genero }}" class="form-control" required>
                    <option value="Masculino" {{ $donor->genero == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                    <option value="Femenino" {{ $donor->genero == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="historial_medico">Historial Médico:</label>
                <textarea name="historial_medico" class="form-control" required>{{ $donor->historial_medico }}</textarea>
            </div>
            <div class="form-group mb-3">
                <label for="avatar">Avatar:</label>
                <input type="file" name="avatar" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Editar</button>
        </form>
    </div>
</x-app-layout>
