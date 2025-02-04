<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>      


        @if(isset($cita))
            <h1>Fecha: {{$cita->fecha}}/{{$cita->hora}}/Cliente:{{$cita->cliente}} </h1><br>
        @else
            <h2 >No hay detalles de la cita</h2>

        @endif

        <a href="volver"{{route('vercitas')}}>Volver</a>

        <h3>Servicio cita</h3>


        <form action="{{route('crearD' ,$cita->id)}}" method="POST">
            <h2>Selecciiona Servicio</h2>
            <select name="servicio" id="servicio">
                @if(isset($servicios) && count($servicios)>0)
                @foreach ($servicios as $s)
                    <option value="{{$s->id}}">{{$s->descripcion}}</option>
        
                @endforeach
                @else
                <option>No hay servicios disponibles</option>
                @endif
            </select>
            <button type="submit">Añadir</button>
        </form>


        <h3>Finalizar Cita</h3>

        @if($cita->total==0)
        <form action="{{route('modificarC' ,$cita->id)}}" method="POST">
            @method('PUT')
            @csrf
            <button type="submit"> Finalizar Cita</button>
        </form>
        @endif

        <h2>Servicios de la cita</h2>

        <table border="1" width="50%">
            <tr>
                <td>Id</td>
                <td>Descripcion</td>
                <td>Importe</td>

            </tr>
            <tr>
            @foreach ($cita->obtenerDetalle() as $d)
            <td>{{$d->id}}</td>
            <td>{{$d->obtenerServicio->descripcion}}</td>
            <td>{{$d->precio}}</td>
            @endforeach
            </tr>
        </table>

        




        
</body>
</html>