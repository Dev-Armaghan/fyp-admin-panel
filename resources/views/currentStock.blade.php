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
<form class="example addProducts" action="search">
  <input type="text" placeholder="Search.." name="search">
  <button type="submit"><i class="fa fa-search"></i></button>
</form>
    
    

</div>
    

<div class="addProducts">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">qty</th>
            <th scope="col">Average price</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($collection as $item)
                
            <tr>
                <td>{{$item->product_name}}</td>
                <td>{{$item->qty}}</td>
                <td>{{$item->avg_price}}</td>
              </tr>
    
            @endforeach
        </tbody>
      </table>
</div>

    
@endsection