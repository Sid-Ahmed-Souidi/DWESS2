@extends('plantilla')

@if (session('mensaje'))
   @section('info')
    <h3 class="text-success">{{session('mensaje')}}</h3>
   @endsection
@endif
@if (session('error'))
   @section('error')
    <h3 class="text-danger">{{session('error')}}</h3>
   @endsection
@endif

@section('main')

<table>
<thead>
<tr>

</tr>
</thead>
<tbody>


   @foreach ($productos as $p)
   <tr>
      <td>{{$p->id}}</td>
      <td>{{$p->nombre}}</td>
      <td>{{$p->precio}}</td>
      <td>{{$p->stock}}</td>
      <td><img src="{{asset('img/productos/' .$p->imagen)}}" alt="{{$p->id}}"></td>

   </tr>


</tbody>





</table>
    
@endsection