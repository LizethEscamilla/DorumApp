<!DOCTYPE html>
<html>
<head>
    <title>Generate PDF Donors</title>
</head>
<body>
    <h1>Donadores en DorumApp</h1>
    <p>{{ $date }}</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua.</p>
  
    <table border="1" cellpadding="5" cellspacing="0" width="100%">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Fecha_Nacimiento</th>
            <th>Tipo_Sangre</th>
            <th>Genero</th>
            <th>Historial_Medico</th>
            <th>Avatar</th>
        </tr>
        @foreach($donors as $donor)
        <tr>
            <td>{{ $donor->id }}</td>
            <td>{{ $donor->name }}</td>
            <td>{{ $donor->fecha_nacimiento }}</td>
            <td>{{ $donor->tipo_sangre }}</td>
            <td>{{ $donor->genero }}</td>
            <td>{{ $donor->historial_medico }}</td>
            <td>
                <!-- Opción 1: Rutas locales absolutas -->
                <img src="{{ public_path('images/' . $donor->avatar) }}" alt="Avatar" style="width:50px; height:50px;">

                <!-- Opción 2: Rutas públicas accesibles por URL -->
                <!-- <img src="{{ asset('images/' . $donor->avatar) }}" alt="Avatar" style="width:50px; height:50px;"> -->
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
