@extends('dashboard')

@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Total Price</th>
        <th scope="col">Address</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($collection as $item)
        <tr>
        <th scope="row">{{$item->id}}</th>
        <td>{{$item->price}}</td>
        <td>{{$item->user_address}}</td>
        <td><a href="#{{$item->cart_id}}" class="btn btn-primary">View</a>
        <a href="#{{$item->id}}" class="btn btn-danger">Delete</a></td>
      </tr>
      @endforeach
    
    </tbody>
  </table>@endsection