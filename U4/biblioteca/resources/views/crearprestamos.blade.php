<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{route('verprestamos')}}">Volver</a>

    <form action="{{route('crearP')}}" method="post" >
        @csrf
        <label for="">fecha</label>
        <input type="date" name="fecha"value="{{date('Y-m-d')}}"/><br><br>
        @error('fecha')
            <p style="color:red">Rellena Fecha</p>            
        @enderror
        <label for="">Libro</label>
        <select name="libro" id="libro" value="{{old('libro')}}">
            @foreach($libros as $l)
            <option value="{{$l->id}}">{{$l->titulo}}</option>
            @endforeach    
        </select><br><br>

        <input type="text"  name="nombreCliente"  value="{{old('nombreCliente')}}"/><br><br>
        @error('nombreCliente')
        <p style="color:red">Rellena Cliente</p>            
        @enderror
        <button type="submit" name="crearP">Crear</button>
    </form>

    @if (@session('mensaje'))
    <p style="color: red">{{session('mensaje')}}</p>
    @endif
        
   
</body>
</html>