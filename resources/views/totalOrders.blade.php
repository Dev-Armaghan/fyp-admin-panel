
@extends('dashboard')

@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Sale Date</th>
        <th scope="col">Total Price</th>
        <th scope="col">username</th>
        <th scope="col">Address</th>
        <th scope="col">email</th>
      </tr>
    </thead>
    <tbody>
      @foreach($collection as $item)
        <tr>
        <th scope="row">{{$item->id}}</th>
        <td>{{$item->sale_date}}</td>
        <td>{{$item->price}}</td>
        <td>{{$item->user_name}}</td>
        <td>{{$item->user_address}}</td>
        <td>{{$item->email}}</td>
      </tr>
      @endforeach
    
    </tbody>
  </table>@endsection