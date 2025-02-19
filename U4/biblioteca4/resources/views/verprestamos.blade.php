<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h1>PRESTAMOS</h1>
    <a href="{{route('vistaCrear')}}">nuevo</a>
    <table border="1px">
        <thead>
            <tr>
            <th>id</th>
            <th>fecha de prestamo</th> 
            <th>Titulo del libro</th> 
            <th>Cliente</th> 
            <th>Fecha de devolucion</th> 
            <th>Accion</th>
            </tr> 
        </thead>
        <tbody>
            @foreach ($prestamos as $p)
                <tr>
                    <td>{{$p->id}}</td>
                    <td>{{$p->fecha}}</td> 
                    <td>{{$p->libro->titulo}}</td> 
                    <td>{{$p->nombreCliente}}</td> 
                    <td>{{$p->fechaDevolucion}}</td> 
                    <form action="{{route('rutaModificar' ,$p->id)}}">
                         @csrf
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