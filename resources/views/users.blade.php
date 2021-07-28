@extends('dashboard')

@section('content')
 
<div class="container">

    {{-- <form action="" method="get">
        <input type="search" placeholder="search product">
        <button class="btn btn-success"> Search </button>
    </form> --}}

    <!-- Load icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- The form -->
<form class="example addProducts" action="searchUser">
  <input type="text" placeholder="Search.." name="search">
  <button type="submit"><i class="fa fa-search"></i></button>
</form>
    
    

</div>
    

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