<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Videojuego</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f5f5f5; }
        h1 { color: #333; }
        form { background-color: white; padding: 20px; border-radius: 5px; max-width: 500px; }
        label { display: block; margin-top: 15px; font-weight: bold; }
        input, select { width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ddd; border-radius: 3px; box-sizing: border-box; }
        input[type="checkbox"] { width: auto; }
        .btn { padding: 10px 20px; margin-top: 20px; border: none; cursor: pointer; }
        .btn-save { background-color: #4CAF50; color: white; }
        .btn-cancel { background-color: #666; color: white; text-decoration: none; display: inline-block; }
        fieldset { margin-top: 20px; padding: 15px; border: 1px solid #ddd; }
        legend { font-weight: bold; color: #4CAF50; }
    </style>
</head>
<body>
    <h1>🎮 Editar Videojuego</h1>
    
    <form action="{{ route('videojuegos.update', $videojuego->_id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" value="{{ $videojuego->titulo }}" required>
        
        <label for="genero">Género:</label>
        <select name="genero" id="genero" required>
            @foreach(['Acción', 'Aventura', 'RPG', 'Shooter', 'Deportes', 'Carreras', 'Estrategia', 'Puzzle', 'Terror', 'Plataformas'] as $genero)
                <option value="{{ $genero }}" {{ $videojuego->genero == $genero ? 'selected' : '' }}>{{ $genero }}</option>
            @endforeach
        </select>
        
        <label for="precio">Precio (€):</label>
        <input type="number" name="precio" id="precio" step="0.01" value="{{ $videojuego->precio }}" required>
        
        <label for="fecha_lanzamiento">Fecha de Lanzamiento:</label>
        <input type="date" name="fecha_lanzamiento" id="fecha_lanzamiento" value="{{ $videojuego->fecha_lanzamiento }}" required>
        
        <label for="puntuacion">Puntuación (1-10):</label>
        <input type="number" name="puntuacion" id="puntuacion" min="1" max="10" step="0.1" value="{{ $videojuego->puntuacion }}" required>
        
        <label for="ventas_millones">Ventas (millones):</label>
        <input type="number" name="ventas_millones" id="ventas_millones" step="0.1" value="{{ $videojuego->ventas_millones }}" required>
        
        <label>
            <input type="checkbox" name="multijugador" {{ $videojuego->multijugador ? 'checked' : '' }}> Multijugador
        </label>
        
        <fieldset>
            <legend>Detalles (Subdocumento)</legend>
            
            <label for="desarrollador">Desarrollador:</label>
            <input type="text" name="desarrollador" id="desarrollador" value="{{ $videojuego->detalles['desarrollador'] ?? '' }}" required>
            
            <label for="plataforma">Plataforma:</label>
            <select name="plataforma" id="plataforma" required>
                @foreach(['PC', 'PlayStation 5', 'Xbox Series X', 'Nintendo Switch', 'Multiplataforma'] as $plataforma)
                    <option value="{{ $plataforma }}" {{ ($videojuego->detalles['plataforma'] ?? '') == $plataforma ? 'selected' : '' }}>{{ $plataforma }}</option>
                @endforeach
            </select>
            
            <label for="clasificacion_edad">Clasificación de Edad:</label>
            <select name="clasificacion_edad" id="clasificacion_edad" required>
                @foreach(['PEGI 3', 'PEGI 7', 'PEGI 12', 'PEGI 16', 'PEGI 18'] as $pegi)
                    <option value="{{ $pegi }}" {{ ($videojuego->detalles['clasificacion_edad'] ?? '') == $pegi ? 'selected' : '' }}>{{ $pegi }}</option>
                @endforeach
            </select>
        </fieldset>
        
        <button type="submit" class="btn btn-save">Actualizar</button>
        <a href="{{ route('videojuegos.index') }}" class="btn btn-cancel">Cancelar</a>
    </form>
</body>
</html>