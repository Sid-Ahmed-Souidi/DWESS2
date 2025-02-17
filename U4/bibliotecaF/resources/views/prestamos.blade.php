<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1 style="margin-left:200px" >PRESTAMOS</h1>

    <a href="{{route('paginaC')}}">Nuevo</a>
    <table border="1" width="50%">
        <thead>
            <th>Id</th>
            <th>Fecha de prestamo</th>
            <th>Titulo del libro</th>
            <th>Cliente</th>
            <th>Fecha devolucion</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            @foreach ($prestamos as $p)
                <tr>
                    <td>{{$p->id}}</td>
                    <td>{{$p->fecha}}</td>
                    <td>{{$p->libro->titulo}}</td>
                    <td>{{$p->nombreCliente}}</td>
                    <td>{{$p->fechaDevolucion}}</td>
                    <td>
                        <form action="{{route('modificar',[$p->id])}}">
                            @csrf
                            <button type="submit" name="btnMod">Modificar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
