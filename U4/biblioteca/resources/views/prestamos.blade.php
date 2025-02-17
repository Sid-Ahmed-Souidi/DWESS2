<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   <h1>PRÉSTAMOS</h1><br>

   <form action="{{route('obtenerFormulario')}}" method="get">
            <button type="submit">nuevo+</button>
   </form><br><br>
    <table border="1" width="50%">
        <tr>
            <td>Id</td>
            <td>Fecha de Préstamo</td>
            <td>Titulo del libro</td>
            <td>Cliente</td>
            <td>Fecha Devolución</td>
            <td>Acción</td>
        </tr>


        @foreach ($prestamos as $p)
        <tr>
            
            {{-- <td>{{$p->id}}</td>
            <td>{{$p->fecha}}</td>
            <td>{{$p->libro->titulo}}</td>
            <td>{{$p->nombreC}}</td>
            <td>{{$p->fechaD}}</td> --}}


            <td>{{$p->id}}</td>
            <td>{{$p->fecha}}</td>
            <td>{{$p->libro->titulo}}</td>
            <td>{{$p->nombreCliente}}</td>
            <td>{{$p->fechaDevolucion}}</td>
            <td>
                    {{-- @csrf <form action="{{route('modificar',[$p->id])}}">
                            @csrf {{route('obtenerformulariom',[$p->id])}} --}}

                    <form action="">
                        @csrf
                <button type="submit" name="modificar" >modificar</button>
                    </form>
               
            </td>
        </tr>
            
        @endforeach
    </table>
    
</body>
</html>