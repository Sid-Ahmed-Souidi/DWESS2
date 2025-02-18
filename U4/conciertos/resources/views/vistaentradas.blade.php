<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Concierto:{{$concierto->titulo}}</h1>
        <h1>aforo:{{$concierto->aforo}}</h1>
        <h1>Precio Entrada:{{$concierto->precioEntrada}}</h1>
   

    <a href="{{route('verConciertos')}}"></a>
    <form action="{{route('insertarP')}}" method="post">
        @csrf
    <label for="">email</label><br>
    @if(old('email')!=null)
    <input type="text" name="email" value="{{old('email')}}">
    @else
    <input type="text" name="fecha" value="">
    @endif
    @error('email')
    <p style="color:red;">Rellena email</p>
    @enderror
    <label for="">NªEntradas</label><br>
    @if(old('entradas')!=null)
    <input type="number" name="entradas" value="{{old('entradas')}}">
    @else
    <input type="number" name="entradas" value="">
    @endif
    @error('entradas')
    <p style="color:red;">Rellena entradas</p>
    @enderror
  
   </form>

  

    <table border="1px">
        <tr>
            <th>Id</th>
            <th>descripcion</th>
            <th>importe</th>
        </tr>
        @foreach ($detalles as $d)
        <tr>
            <th>{{$d->id}}</th>
            <th>{{$d->Servicio->descripcion}}</th>
            <th>{{$d->Servicio->precio}}</th>
        </tr>
        @endforeach
    </table>

    <div style="color:red;">
        @if (session('mensaje')!=null)
            {{session('mensaje')}}
        @endif
    </div>
</body>
</html>