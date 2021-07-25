
@extends('dashboard')

@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Sale Date</th>
        <th scope="col">Total Price</th>
        <th scope="col">Address</th>
      </tr>
    </thead>
    <tbody>
      @foreach($collection as $item)
        <tr>
        <th scope="row">{{$item->id}}</th>
        <td>{{$item->sale_date}}</td>
        <td>{{$item->price}}</td>
        <td>{{$item->user_id}}</td>
      </tr>
      @endforeach
    
    </tbody>
  </table>@endsection