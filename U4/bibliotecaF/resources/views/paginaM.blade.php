<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>MODIFICAR</h1>

    @if (session('mensaje'))
    <p style="color:red;">{{session('mensaje')}}</p>
    @endif
    <form action="{{route('modificarPrestamo',$prestamo->id)}}" method="post">
    <p> Id

        <br>
        <input type="text"  disabled value="{{$prestamo->id}}" ><br>
    </p>
    <p>
        Libro <br>
        <input type="text" disabled value="{{$prestamo->libro->titulo}}">
    </p>
    <p>
        Fecha <br>
        <input type="date" name="fecha" value="{{$prestamo->fecha}}">
    </p>
    <p>
        Cliente <br>
        <input type="text" name="cliente" value="{{$prestamo->nombreC}}">
    </p>
    <p>
        Fecha devolución <br>
        <input type="date" name="fechaD" value="{{$prestamo->fechaD}}">
    </p>

        @csrf
        <button style="border-radius: 20px solid black; padding: 5px">Modificar</button>
    </form><br>
    <form action="{{route('verPrestamos')}}">
        @csrf

        <button type="submit" style="border-radius: 5px solid black; padding: 5px" >Cancelar</button>
    </form>


</body>
</html>
