<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videojuegos CRUD</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f5f5f5; }
        h1 { color: #333; }
        table { width: 100%; border-collapse: collapse; background-color: white; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #4CAF50; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        .btn { padding: 8px 16px; margin: 2px; border: none; cursor: pointer; text-decoration: none; display: inline-block; }
        .btn-edit { background-color: #2196F3; color: white; }
        .btn-delete { background-color: #f44336; color: white; }
        .btn-create { background-color: #4CAF50; color: white; margin-bottom: 20px; }
        .filter-form { margin-bottom: 20px; padding: 15px; background-color: white; border-radius: 5px; }
        .filter-form select, .filter-form button { padding: 10px; margin-right: 10px; }
        .success { background-color: #dff0d8; color: #3c763d; padding: 10px; margin-bottom: 20px; border-radius: 5px; }
        .subdocument { font-size: 12px; color: #666; }
    </style>
</head>
<body>
    <h1>🎮 Gestión de Videojuegos</h1>
    
    @if(session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif
    
    <a href="{{ route('videojuegos.create') }}" class="btn btn-create">+ Añadir Videojuego</a>
    
    <div class="filter-form">
        <form method="GET" action="{{ route('videojuegos.index') }}">
            <label for="genero">Filtrar por género:</label>
            <select name="genero" id="genero">
                <option value="">Todos</option>
                @foreach($generos as $genero)
                <option value="{{ $genero }}" {{ request('genero') == $genero ? 'selected' : '' }}>
                    {{ $genero }}
                </option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-edit">Filtrar</button>
        </form>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Género</th>
                <th>Precio</th>
                <th>Fecha</th>
                <th>Puntuación</th>
                <th>Multijugador</th>
                <th>Ventas (M)</th>
                <th>Detalles</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($videojuegos as $videojuego)
                <tr>
                    <td>{{ $videojuego->titulo }}</td>
                    <td>{{ $videojuego->genero }}</td>
                    <td>{{ $videojuego->precio }}€</td>
                    <td>{{ $videojuego->fecha_lanzamiento }}</td>
                    <td>{{ $videojuego->puntuacion }}/10</td>
                    <td>{{ $videojuego->multijugador ? 'Sí' : 'No' }}</td>
                    <td>{{ $videojuego->ventas_millones }}</td>
                    <td class="subdocument">
                        {{ $videojuego->detalles['desarrollador'] ?? 'N/A' }}<br>
                        {{ $videojuego->detalles['plataforma'] ?? 'N/A' }}<br>
                        {{ $videojuego->detalles['clasificacion_edad'] ?? 'N/A' }}
                    </td>
                    <td>
                        <a href="{{ route('videojuegos.edit', $videojuego->_id) }}" class="btn btn-edit">Editar</a>
                        <form action="{{ route('videojuegos.destroy', $videojuego->_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete" onclick="return confirm('¿Seguro que quieres eliminar este videojuego?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>