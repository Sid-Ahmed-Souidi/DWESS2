<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <form action="{{route('rutaEntradas', $c->id)}}">
        @csrf
    <h1>Selecciona un concierto</h1>
    <select name="conId" id="conId">
        @foreach($conciertos as $c)
        <option value="{{$c->id}}">{{$c->titulo}}</option>
        @endforeach
    </select>

        <button >añadir</button>
    </form>




    <h1>PRESTAMOS</h1>
    <a href="">nuevo</a>
    <table border="1px">
        <thead>
            <tr>
            <th>id</th>
            <th>titulo</th> 
            <th>fecha</th> 
            <th>aforo</th> 
            <th>precio</th> 
            <th>Accion</th>
            </tr> 
        </thead>
        <tbody>
            @foreach ($conciertos as $p)
                <tr>
                    <td>{{$p->id}}</td>
                    <td>{{$p->titulo}}</td>
                    <td>{{$p->fecha}}</td> 
                    <td>{{$p->aforo}}</td> 
                    <td>{{$p->precioEntrada}}</td> 
                    <form action="">
                           {{-- @csrf --}}
                        <td><button>Modificar</button></td>
                    </form>
                </tr>
            @endforeach
        </tbody>
    </table>


    <div style="color:red;">
        @if (session('mensaje')!=null)
            {{session('mensaje')}}
        @endif
    </div>
</body>
</html>