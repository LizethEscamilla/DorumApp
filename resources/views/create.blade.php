<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Donor') }}
        </h2>
    </x-slot>

    <div class="container mt-4">
        <form class="form-group" method="POST" action="/donors" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label for="name">Nombre:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                <input type="date" name="fecha_nacimiento" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="tipo_sangre">Tipo de Sangre:</label>
                <input type="text" name="tipo_sangre" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="genero">Género:</label>
                <select name="genero" class="form-control" required>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="historial_medico">Historial Médico:</label>
                <textarea name="historial_medico" class="form-control" required></textarea>
            </div>
            <div class="form-group mb-3">
                <label for="avatar">Avatar:</label>
                <input type="file" name="avatar" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</x-app-layout>
