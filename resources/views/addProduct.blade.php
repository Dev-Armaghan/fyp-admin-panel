@extends('dashboard')
@section('content')

<form method="POST" action="{{route('insert.product')}}">
    @csrf
    <h3>{{session('msg')}}</h3>
    
    <div class="addProducts">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <input type="text" class="form-control"  placeholder="batch" name="batchNo">
                  </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <input type="text" class="form-control"  placeholder="Product Name" name="productName"> 
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <input type="text" class="form-control"  placeholder="Product Category" name="prodCategory">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <input type="text" class="form-control"  placeholder="Image url" name="imageUrl">
                </div>
            </div>
        </div>
        <h2>Qty</h2>
        <hr>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <input type="number" class="form-control"  placeholder="no of packs" name="packs">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input type="number" class="form-control"  placeholder="Strips/Items in each pack" name="strips">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input type="number" class="form-control"  placeholder="tablets in each strip" name="tablets">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input type="text" class="form-control"  placeholder="unit price" name="unitPrice">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="">Expiry date</label>
                    <input type="date" class="form-control"  placeholder="" name="expiryDate">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="">Purchase Date</label>
                    <input type="date" class="form-control"  placeholder="" name="purchaseDate">
                </div>
            </div>
        </div>
        <h2>Vendor Details</h2>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    <input type="text" class="form-control"  placeholder="vendor name" name="vendorName">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <input type="text" class="form-control"  placeholder="city" name="vendorCity">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <input type="number" class="form-control"  placeholder="zipcode" name="zipCode">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <input type="tel" class="form-control"  placeholder="telephone" name="vendorTel">
                </div>
            </div>
        </div>
        <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <textarea type="text" class="form-control"  placeholder="address" name="vendorAddress"></textarea>
                    </div>
                </div>
        </div>
        <center>
            <div class="form-group">
                <button class="btn btn-success" type="submit">Add Product</button>
            </div>
        </center>
    </div>
    
  </form>
    
@endsection