<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Videojuego</title>
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
    <h1>🎮 Añadir Nuevo Videojuego</h1>
    
    <form action="{{ route('videojuegos.store') }}" method="POST">
        @csrf
        
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" required>
        
        <label for="genero">Género:</label>
        <select name="genero" id="genero" required>
            <option value="Acción">Acción</option>
            <option value="Aventura">Aventura</option>
            <option value="RPG">RPG</option>
            <option value="Shooter">Shooter</option>
            <option value="Deportes">Deportes</option>
            <option value="Carreras">Carreras</option>
            <option value="Estrategia">Estrategia</option>
            <option value="Puzzle">Puzzle</option>
            <option value="Terror">Terror</option>
            <option value="Plataformas">Plataformas</option>
        </select>
        
        <label for="precio">Precio (€):</label>
        <input type="number" name="precio" id="precio" step="0.01" required>
        
        <label for="fecha_lanzamiento">Fecha de Lanzamiento:</label>
        <input type="date" name="fecha_lanzamiento" id="fecha_lanzamiento" required>
        
        <label for="puntuacion">Puntuación (1-10):</label>
        <input type="number" name="puntuacion" id="puntuacion" min="1" max="10" step="0.1" required>
        
        <label for="ventas_millones">Ventas (millones):</label>
        <input type="number" name="ventas_millones" id="ventas_millones" step="0.1" required>
        
        <label>
            <input type="checkbox" name="multijugador"> Multijugador
        </label>
        
        <fieldset>
            <legend>Detalles (Subdocumento)</legend>
            
            <label for="desarrollador">Desarrollador:</label>
            <input type="text" name="desarrollador" id="desarrollador" required>
            
            <label for="plataforma">Plataforma:</label>
            <select name="plataforma" id="plataforma" required>
                <option value="PC">PC</option>
                <option value="PlayStation 5">PlayStation 5</option>
                <option value="Xbox Series X">Xbox Series X</option>
                <option value="Nintendo Switch">Nintendo Switch</option>
                <option value="Multiplataforma">Multiplataforma</option>
            </select>
            
            <label for="clasificacion_edad">Clasificación de Edad:</label>
            <select name="clasificacion_edad" id="clasificacion_edad" required>
                <option value="PEGI 3">PEGI 3</option>
                <option value="PEGI 7">PEGI 7</option>
                <option value="PEGI 12">PEGI 12</option>
                <option value="PEGI 16">PEGI 16</option>
                <option value="PEGI 18">PEGI 18</option>
            </select>
        </fieldset>
        
        <button type="submit" class="btn btn-save">Guardar</button>
        <a href="{{ route('videojuegos.index') }}" class="btn btn-cancel">Cancelar</a>
    </form>
</body>
</html>