<!DOCTYPE html>
<html>
<head>
    <title>CRUD de Bebidas</title>
</head>
<body>
    <h1>CRUD de Bebidas</h1>

    <h2>Crear Bebida</h2>
    @if (count($errors) > 0)
         <div class = "alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
      @endif
    <form method="POST" action="{{ route('bebidas.store') }}">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" id="Nombre" name="Nombre" required>
        <br>
        <label for="Sabor">Sabor:</label>
        <input id="Sabor" name="Sabor"/>
        <br>
        <label for="Cantidad">Cantidad:</label>
        <input id="Cantidad" name="Cantidad"/>
        <br>
        <label for="Calorias">Calorías:</label>
        <input id="Calorias" name="Calorias"/>
        <br>
        <label for="precio">Precio:</label>
        <input type="number" id="Precio" name="Precio" step="0.01" min="0" required>
        <br>
        <button type="submit">Crear Bebida</button>
    </form>

    <h2>Lista de Bebidas</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Sabor</th>
                <th>Cantidad</th>
                <th>Calorias</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bebidas as $bebida)
            <tr>
                <td>{{ $bebida->id }}</td>
                <td>{{ $bebida->Nombre }}</td>
                <td>{{ $bebida->Sabor }}</td>
                <td>{{ $bebida->Cantidad }}</td>
                <td>{{ $bebida->Calorico }}</td>
                <td>{{ $bebida->Precio }}</td>
                <td>
                    <a href="{{ route('bebidas.edit', $bebida->id) }}">Editar</a>
                    <form method="POST" action="{{ route('bebidas.destroy', $bebida->id) }}">
                        @csrf
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>







</body>
</html>
