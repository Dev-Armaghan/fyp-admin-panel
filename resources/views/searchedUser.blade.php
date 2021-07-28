@extends('dashboard')

@section('content')

<div class="addProducts">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">username</th>
            <th scope="col">email</th>
            <th scope="col">Address</th>
            <th scope="col">Tel</th>
          </tr>
        </thead>
        <tbody>
          @foreach($collection as $item)
            <tr>
            <th scope="row">{{$item->id}}</th>
            <td>{{$item->user_name}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->user_address}}</td>
            <td>{{$item->user_tel}}</td>
          </tr>
          @endforeach
        
        </tbody>
      </table>
</div>
    
@endsection