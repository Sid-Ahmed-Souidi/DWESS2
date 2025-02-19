<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('modificarP')}}" method="post">
        @csrf
    <label for="">Id</label><br>
    <input type="text" name="id" value="{{$prestamo->id}}" readonly>
    <label for="">Fecha</label><br>
    <input type="date" name="fecha" value="{{$prestamo->fecha}}"><br>
    <label for="">Libro</label><br>
    <input type="text" name="libro" value="{{$prestamo->libro->titulo}}" readonly><br>
    <label for="">Cliente</label><br>
    <input type="text" name="cliente" value="{{$prestamo->nombreCliente}}"><br>
    <label for="">Fecha devolucion</label><br>
    @if ($prestamo->fechaDevolucion==null)
    <input type="date" name="fechaD" value="{{date('Y-m-d')}}"/> 
    @else
    <input type="date" name="fechaD" value="{{$prestamo->fechaDevolucion}}"/>
    @endif
    <button  value="modificar">modificar</button>
   </form>
    <form action="{{route('verP')}}">
        <button  value="cancelar">cancelar</button>
    </form>

   <div style="color:red;">
    @if (session('mensaje')!=null)
        {{session('mensaje')}}
    @endif
</div>
</body>
</html>