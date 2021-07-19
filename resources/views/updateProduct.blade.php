

@foreach ($collection as $item)

<form method="POST" action="{{route('update.product',[$item->purchase_id])}}">
    @csrf
    
    <div class="addProducts">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <input type="text" class="form-control"  placeholder="batch" name="batchNo" value="{{$item->batch_no}}">
                  </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <input type="text" class="form-control"  placeholder="Product Name" name="productName" value="{{$item->product_name}}"> 
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <input type="text" class="form-control"  placeholder="Product Category" name="prodCategory" value="{{$item->category}}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <input type="text" class="form-control"  placeholder="Image url" name="imageUrl" value="{{$item->img}}">
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
                    <input type="text" class="form-control"  placeholder="unit price" name="unitPrice" value="{{$item->unit_price}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="">Expiry date</label>
                    <input type="date" class="form-control"  placeholder="" name="expiryDate" value="{{$item->expiry_date}}">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="">Purchase Date</label>
                    <input type="date" class="form-control"  placeholder="" name="purchaseDate" value="{{$item->purchase_date}}">
                </div>
            </div>
        </div>
        <h2>Vendor Details</h2>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    <input type="text" class="form-control"  placeholder="vendor name" name="vendorName" value="{{$item->vendor_name}}">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <input type="text" class="form-control"  placeholder="city" name="vendorCity" value="{{$item->vendor_city}}">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <input type="number" class="form-control"  placeholder="zipcode" name="zipCode" value="{{$item->zipcode}}">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <input type="tel" class="form-control"  placeholder="telephone" name="vendorTel" value="{{$item->vendor_tel}}">
                </div>
            </div>
        </div>
        <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text"  class="form-control"  placeholder="address" name="vendorAddress" value="{{$item->vendor_address}}">
                    </div>
                </div>
        </div>
        <center>
            <div class="form-group">
                <button class="btn btn-success" type="submit">Update</button>
            </div>
        </center>
    </div>
    
  </form>
    
@endforeach

    
