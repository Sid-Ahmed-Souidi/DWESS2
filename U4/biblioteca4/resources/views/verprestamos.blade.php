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
            <tr>
            @foreach ($prestamos as $p)
                <th>{{$p->id}}</th>
                <th>{{$p->fecha}}</th> 
                <th>{{$p->libro->titulo}}</th> 
                <th>{{$p->nombreCliente}}</th> 
                <th>{{$p->fechaDevolucion}}</th> 
                <th><button>Modificar</button></th>
            @endforeach
         </tr> 
        </tbody>
    </table>



    
</body>
</html>