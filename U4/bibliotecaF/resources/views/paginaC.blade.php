<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{route('verPrestamos')}}">Volver</a>
    @if (session('mensaje'))
    <p style="color:red;">{{session('mensaje')}}</p>
    @endif
    <h1>CREAR PRÉSTAMO</h1>
    <form action="{{route('crearPrestamo')}}" method="post">
        @csrf
        <div style="border: 1px solid green;width: 23%;" >

            <label for="fecha">Fecha</label><br>
            <input type="date" name="fecha" id="fecha" value="{{date('Y-m-d')}}">

            @error('fecha')
            <p style="color:red;">Rellena Fecha</p>
            @enderror

            <br>
            <label for="cliente">Cliente</label><br>
            <input type="text" name="cliente" id="cliente" value="{{old('cliente')}}"><br>

            @error('cliente')
            <p style="color:red;">Rellena Cliente</p>
            @enderror

            <label for="Libro">Libro</label><br>
            <select name="libro" id="Libro" value="{{old('libro')}}">
                @foreach ($libros as $l)
                <option value="{{$l->id}}">{{$l->titulo}}</option>
                @endforeach
            </select>

            @error('fecha')
            <p style="color:red;">Rellena libro</p>
            @enderror

            <button type="submit">Crear</button>
            <button type="reset"></button>
        </form>
</div>
</body>
</html>
