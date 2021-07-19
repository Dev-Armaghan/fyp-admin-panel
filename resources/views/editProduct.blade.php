@extends('dashboard')

@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Name</th>
        <th scope="col">category</th>
        <th scope="col">price/unit</th>
        <th scope="col">qty</th>
        <th scope="col">total price</th>
        <th scope="col">company</th>
        <th scope="col">batch</th>
        <th scope="col">purchase date</th>
        <th scope="col">expiry date</th>
        <th scope="col">actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($collection as $item)
        <tr>
            <td>{{$item->purchase_id}}</td>
            <td>{{$item->product_name}}</td>
            <td>{{$item->category}}</td>
            <td>{{$item->unit_price}}</td>
            <td>{{$item->qty}}</td>
            <td>{{$item->price}}</td>
            <td>{{$item->vendor_name}}</td>
            <td>{{$item->batch_no}}</td>
            <td>{{$item->purchase_date}}</td>
            <td>{{$item->expiry_date}}</td>
            <td><a href="deleteProduct/{{$item->id}}" class="btn btn-danger">Delete</a>&nbsp;&nbsp;<a href="editProduct/{{$item->purchase_id}}" class="btn btn-primary">Edit</a></td>
            </tr>
        @endforeach
    </tbody>
  </table> 
   
@endsection