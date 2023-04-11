@if (session()->has('message'))
<div class="alert alert-success">
        {{ session()->get('message') }}
</div>
@endif
<h2>Editar Bebida</h2>

@if (count($errors) > 0)
<div class = "alert alert-danger">
   <ul>
      @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
      @endforeach
   </ul>
</div>
@endif


<form method="POST" action="{{ route('bebidas.update', $bebida->id) }}">
    @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" id="Nombre" value="{{ $bebida->Nombre }}" name="Nombre" required>
        <br>
        <label for="Sabor">Sabor:</label>
        <input id="Sabor" name="Sabor" value="{{ $bebida->Sabor }}"/>
        <br>
        <label for="Cantidad">Cantidad:</label>
        <input id="Cantidad" name="Cantidad" value="{{ $bebida->Cantidad }}"/>
        <br>
        <label for="Calorico">Calorías:</label>
        <input id="Calorico" name="Calorico" value="{{ (string)$bebida->Calorico }}"/>
        <br>
        <label for="precio">Precio:</label>
        <input type="number" id="Precio" value="{{ (string)$bebida->Precio }}" name="Precio" step="0.01" min="0" required>
        <br>
    <button type="submit">Actualizar Bebida</button>
</form>
