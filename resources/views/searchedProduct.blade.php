@extends('dashboard')

@section('content')

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