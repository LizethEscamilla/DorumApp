@extends('layouts.app')
@section('title', 'Donors Edit')
@section('content')
<form class="form-group" method="POST" action="{{ action([\App\Http\Controllers\DonorController::class, 'update'], $donor->id) }}"
    enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="form-group">
        <label for="">Nombre:</label>
        <input type="text" name="name" value="{{$donor->name}}" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="">Fecha de Nacimiento:</label>
        <input type="date" name="fecha_nacimiento" value="{{$donor->fecha_nacimiento}}" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="">Tipo de Sangre:</label>
        <input type="text" name="tipo_sangre" value="{{$donor->tipo_sangre}}" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="">Género:</label>
        <select name="genero" value="{{$donor->genero}}" class="form-control" required>
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
        </select>
    </div>
    <div class="form-group">
        <label for="">Historial Médico:</label>
        <textarea name="historial_medico" value="{{$donor->historial_medico}}" class="form-control" required></textarea>
    </div>
    <div class="form-group">
        <label for="">Avatar:</label>
        <input type="file" name="avatar" value="{{$donor->avatar}}">
    </div>
    <button type="submit" class="btn btn-primary">Editar</button>
</form>

@endsection