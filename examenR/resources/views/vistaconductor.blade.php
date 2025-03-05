<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('rutaGestionBilletes')}}" method="post">
        @csrf
    <label for="">Conductor</label><br>
    @if(old('dni')!=null)
    <input type="text" name="dni" value="{{old('dni')}}">
    @else
    <input type="text" name="dni" ><br>
    @endif

    @error('dni')
    <p style="color:red;">Rellena Dni</p>
    @enderror

    <button  value="servicio">Ir a servicio</button>
   </form>

   <div style="color:red;">
    @if (session('mensaje')!=null)
        {{session('mensaje')}}
    @endif
</div>
</body>
</html>