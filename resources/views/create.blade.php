@extends('layouts.app')
@section('title', 'Donors Create')
@section('content')
<form class="form-group" method="POST" action="/donors" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="">Nombre:</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="">Fecha de Nacimiento:</label>
        <input type="date" name="fecha_nacimiento" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="">Tipo de Sangre:</label>
        <input type="text" name="tipo_sangre" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="">Género:</label>
        <select name="genero" class="form-control" required>
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
        </select>
    </div>
    <div class="form-group">
        <label for="">Historial Médico:</label>
        <textarea name="historial_medico" class="form-control" required></textarea>
    </div>
    <div class="form-group">
        <label for="">Avatar:</label>
        <input type="file" name="avatar">
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection