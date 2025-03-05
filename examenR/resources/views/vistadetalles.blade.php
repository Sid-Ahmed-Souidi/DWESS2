<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Conductor:{{$conductor->nombre}}/dni:{{$conductor->dni}}</h1>
    <a href="{{route('rutaPrincipal')}}">Salir</a>
    <h1>Servicio:{{$servicio->id}}/fecha:{{$servicio->fecha}}/recaudacion:{{$servicio->recaudacion}}</h1>


    <form action="{{route('rutaCrearBillete' ,$servicio->id)}}" method="post">
    @csrf
    <h1>Tipo de Billete</h1>
    <select name="precioB" id="precioB">
        <option value="general" selected>general</option>
        <option value="reducido">reducido</option>
    </select>
        <button >Registrar Billeteffff</button>
    </form>

    <h1>Billetes</h1>
    <table border="1px">
        <tr>
            <th>Id</th>
            <th>hora</th>
            <th>precio</th>
            <th>Anulado</th>
            <th>Acciones</th>
        </tr>
        @foreach ($billetes as $c)
        <tr>
            <th>{{$c->id}}</th>
            <th>{{$c->hora}}</th>
            <th>{{$c->precio}}</th>
            <th>{{$c->anulado}}</th>
            <th><button>anular</button></th>
            <th>
{{--        
                <form action="{{route('rutaEliminarCita' ,$c->id)}}" method="post">
                 @csrf
                <button>borrar</button>  
               </form> --}}
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