<!--Néstor Naranjo Rodriguez-->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRODUCTOS</title>
</head>
<body>
    <header>
        <h1>INSERTE UN PRODUCTO</h1>
    </header>
    @if(session('status'))
        <div class="exito">
            {{session('status')}}
        </div>
    @endif
    @if($errors->any())
        <div class="errores">
            <ul>
                <div>
                    @foreach($errors->all() as $error)
                        <div>⮞&nbsp;&nbsp;{{ $error }}</div>
                    @endforeach
                </div>
            </ul>
        </div>
    @endif

    <form action="{{ route('product.store') }}" method="POST">
    @csrf
        <label for="nombre-producto">Nombre del producto:</label>
        <input type="text" name="nombre-producto" value="{{ old('nombre-producto') }}" placeholder="Ejemplo: Cables">

        <label for="descripcion-producto">Describa el producto:</label>
        <textarea name="descripcion-producto" placeholder="Escribe aquí la descripción...">{{ old('descripcion-producto') }}</textarea>

        
        <label for="precio-producto">Precio:</label>
        <input type="number" name="precio-producto" min="0" value="{{ old('precio-producto') }}" placeholder="Ejemplo: 1">
        
        <label for="unidades-producto">unidades:</label>
        <input type="number" name="unidades-producto" min="0" value="{{ old('unidades-producto') }}" placeholder="Ejemplo: 3">
        
        <label for="categoria-producto">Categoría:</label>
        <select name="categoria-producto">
            <option value="">Seleccione una opción</option>
            <option value="Electrónica">Electrónica</option>
            <option value="Deporte">Deporte</option>
        </select>
        
        <button type="submit">Registrar producto</button>

        <p><a href="{{ route('product.home') }}">← Volver a la página principal</a></p>

    </form>
</body>
</html>
