<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('insertarP')}}" method="post">
        @csrf
    <label for="">Fecha</label><br>
    @if(old('fecha')!=null)
    <input type="date" name="fecha" value="{{old('fecha')}}">
    @else
    <input type="date" name="fecha" value="{{date('Y-m-d')}}"><br>
    @endif

    @error('fecha')
    <p style="color:red;">Rellena Fecha</p>
    @enderror
    <label for="">Libro</label><br>
    <select name="libro" id="libro">
        @foreach($libros as $l)
        <option value="{{$l->id}}">{{$l->titulo}}</option><br>
        @endforeach
    </select><br>
    @error('libro')
    <p style="color:red;">Rellena libro</p>
    @enderror
    <label for="">Cliente</label><br>
    <input type="text" name="cliente" value="">
    @error('cliente')
    <p style="color:red;">Rellena cliente</p>
    @enderror
    <button  value="crear">crear</button>
   </form>

   <div style="color:red;">
    @if (session('mensaje')!=null)
        {{session('mensaje')}}
    @endif
</div>
</body>
</html>