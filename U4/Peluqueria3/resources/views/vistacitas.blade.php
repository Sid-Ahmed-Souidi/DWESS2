<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>CITAS</h1>
    <h2>Crear Cita</h2>
    <form action="{{route('rutaCrearCita')}}" method="post">
        @csrf
    @if(old('fecha')!=null)
    <input type="date" name="fecha" value="{{old('fecha')}}">
    @else
    <input type="date" name="fecha" value="{{date('Y-m-d')}}">
    @endif

    @error('fecha')
    <p style="color:red;">Rellena Fecha</p>
    @enderror
    @if(old('hora')!=null)
    <input type="time" name="hora" value="{{old('hora')}}">
    @else
    <input type="time" name="hora" value="{{date('H:i')}}">
    @endif
    @error('hora')
    <p style="color:red;">Rellena hora</p>
    @enderror
    <input type="text" name="cliente" value="" placeholder="cliente">
    @error('cliente')
    <p style="color:red;">Rellena cliente</p>
    @enderror
    <button  value="crear">crear Cita</button>
   </form>


    <h1>vista de Citas</h1>
    <table border="1px">
        <tr>
            <th>Id</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Cliente</th>
            <th>precio</th>
            <th>Acciones</th>
        </tr>
        @foreach ($citas as $c)
        <tr>
            <th>{{$c->id}}</th>
            <th>{{date('d/m/Y',strtotime($c->fecha))}}</th>
            <th>{{$c->hora}}</th>
            <th>{{$c->cliente}}</th>
            <th>{{$c->total}}</th>
            <th>
                <form action="{{route('rutaDetalleCita' ,$c->id)}}" method="get">
                    @csrf
                   <button>detalle</button>  
                  </form>
                <form action="{{route('rutaEliminarCita' ,$c->id)}}" method="post">
                 @csrf
                <button>borrar</button>  
               </form>
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