<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Fecha:{{$cita->fecha}}/Hora:{{$cita->hora}}/Cliente:{{$cita->cliente}}</h1>
    <a href="{{route('rutaVerCitas')}}">Volver</a>
    <form action="{{route('rutaInsertarDetalle' ,$cita->id)}}" method="post">
        @csrf
    <h1>Servicio de la cita</h1>
    <select name="serId" id="serId">
        @foreach($servicios as $s)
        <option value="{{$s->id}}">{{$s->descripcion}}</option>
        @endforeach
    </select>

        <button >añadir</button>
    </form>


    @if($cita->total==0)
    <form action="{{route('rutaFinalizarCita', $cita->id)}}" method="POST">
        @method('PUT')
        @csrf
        <button>Finalizar Cita</button>
    </form>
     
     @endif

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