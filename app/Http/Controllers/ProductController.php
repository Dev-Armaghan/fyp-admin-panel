<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\Purchase;
use App\Models\PurchaseDetail;
use App\Models\Product;
use App\Models\CurrentStock;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //initializing models 
       $currentStock=new CurrentStock;
        $Product=new Product;
        $vendor=new Vendor;
        $purchase=new Purchase;
        $purchaseDetail=new PurchaseDetail;

        // checking if the product already exist in the table
        $checkProduct=Product::where('product_name', '=', $request->input('productName'))->first();
        if($checkProduct==null){    

        //sending to product table
        $Product->product_name=$request->productName;
        $Product->category=$request->prodCategory;
        $Product->img=$request->imageUrl;
        $Product->save();
        }
 

        // checking if the vendor already exist    
        $checkVendor=Vendor::where('vendor_name', '=', $request->input('vendorName'))->first();
        if ($checkVendor == null) {
        
        //sending to vendor table   .
        $vendor->vendor_name=$request->vendorName;
        $vendor->vendor_city=$request->vendorCity;
        $vendor->vendor_address=$request->vendorAddress;
        $vendor->vendor_tel=$request->vendorTel;
        $vendor->zipcode=$request->zipCode;
        $vendor->save();
       } 
        
        // to check if product details already present
        $detail=PurchaseDetail::all()
        ->where('product_id',Product::where('product_name',$request->productName)->pluck('id')->first())
        ->where('batch_no',$request->batchNo);

        if($detail->isEmpty())
        {
          # code... 
                    //sending to purchase table date
                    $purchase->purchase_date=$request->purchaseDate;
                    $purchase->vendor_id=Vendor::where('vendor_name',$request->vendorName)->pluck('id')->first();
                    $purchase->save();
                    $lastPurchaseId=$purchase->id; // getting input purchase id
    
                    //sending data to purchase details
                    $ProductId=Product::where('product_name',$request->productName)->pluck('id')->first(); // getting product id
                    $purchaseDetail->product_id=$ProductId; 
                    $purchaseDetail->purchase_id=$lastPurchaseId; 
    
                    // to fetch the quantity of medicines
    
                    if($request->packs===null || $request->packs<=0) $noOfPacks=1; else $noOfPacks=$request->packs;
                    if($request->strips===null || $request->strips<=0) $noOfStrips=1; else $noOfStrips=$request->strips;
                    if($request->tablets===null || $request->tablets<=0) $noOfTablets=1; else $noOfTablets=$request->tablets;
                    $totalQuantity=$noOfPacks*$noOfStrips*$noOfTablets;
                    $unitPrice=$request->unitPrice;
    
                    $purchaseDetail->qty=$totalQuantity;
                    $purchaseDetail->unit_price=$request->unitPrice;
                    $purchaseDetail->price=$unitPrice*$totalQuantity;
                    $purchaseDetail->expiry_date=$request->expiryDate;
                    $purchaseDetail->batch_no=$request->batchNo;
                    $purchaseDetail->save();
                    
                    $request->session()->flash('msg','data inserted');
        }
            else 
            {
                $request->session()->flash('msg','data present already');
                return redirect('addProducts');
            }

            //calculating the qty of total medicine in inventory
            $prodId=Product::where('product_name',$request->productName)->pluck('id')->first();
            $getQuantity=PurchaseDetail::where('product_id',Product::where('product_name',$request->productName)->pluck('id')->first())
            ->sum('qty');
            $avgPrice=PurchaseDetail::where('product_id',Product::where('product_name',$request->productName)->pluck('id')->first())
            ->avg('unit_price');
            

            $checkInCurrent=CurrentStock::where('product_id',$prodId);


            if($checkProduct){
                CurrentStock::where('product_id',Product::where('product_name',$request->productName)->pluck('id')->first())
                 ->update(
                    [
                        'qty'=>$getQuantity,
                        'avg_price'=>$avgPrice
                    ]
                 );
            }
            else {
                $currentStock->product_id=$prodId;
                $currentStock->qty=$getQuantity;
                $currentStock->avg_price=$avgPrice;
            }

            return redirect('addProducts');

     } 

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $Product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $Product)
    {
        // 
        $products=DB::table('products')
            ->join('purchase_details','products.id','=','purchase_details.product_id')
            ->join('purchases','purchase_details.purchase_id','=','purchases.id')
            ->join('vendors','purchases.vendor_id','=','vendors.id')
            ->select('expiry_date','batch_no','price','product_name','category','img','qty','unit_price','vendor_name','purchase_date','purchase_id','products.id')
            ->get();
            return view('editProduct',['collection'=>$products]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $Product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $Product,$id)
    {
        //
        $products=DB::table('products')
            ->join('purchase_details','products.id','=','purchase_details.product_id')
            ->join('purchases','purchase_details.purchase_id','=','purchases.id')
            ->join('vendors','purchases.vendor_id','=','vendors.id')
            ->where('purchase_id',$id)
            ->select('zipcode','vendor_tel','vendor_address','vendor_city','expiry_date','batch_no','price','product_name','category','img','qty','unit_price','vendor_name','purchase_date','products.id','purchase_id')
            ->get();


            return view('updateProduct',['collection'=>$products]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $Product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $Product,$id)
    {
        if($request->packs===null || $request->packs<=0) $noOfPacks=1; else $noOfPacks=$request->packs;
         if($request->strips===null || $request->strips<=0) $noOfStrips=1; else $noOfStrips=$request->strips;
          if($request->tablets===null || $request->tablets<=0) $noOfTablets=1; else $noOfTablets=$request->tablets;
            $totalQuantity=$noOfPacks*$noOfStrips*$noOfTablets;
        
            $totalPrice=$request->unitPrice*$totalQuantity;

        $vId=Purchase::where('id',$id)->pluck('vendor_id');
        $pId=PurchaseDetail::where('purchase_id',$id)->pluck('product_id');

        DB::table('purchase_details')
        ->where('purchase_id',$id)
        ->update([
            'batch_no'=>$request->batchNo,
            'expiry_date'=>$request->expiryDate,
            'qty'=>$totalQuantity,
            'price'=>$totalPrice,
            'unit_price'=>$request->unitPrice
        ]);

        DB::table('products')
        ->where('id',$pId)
        ->update([
            'product_name'=>$request->productName,  
            'category'=>$request->prodCategory,
            'img'=>$request->imageUrl
        ]);

        DB::table('purchases')
        ->where('id',$id)
        ->update([
            'purchase_date'=>$request->purchaseDate
        ]);

        DB::table('vendors')
        ->where('id',$vId)
        ->update([
            'vendor_name'=>$request->vendorName,
            'vendor_city'=>$request->vendorCity,
            'zipcode'=>$request->zipCode,
            'vendor_address'=>$request->vendorAddress,
            'vendor_tel'=>$request->vendorTel
        ]);


        return redirect('editProducts');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $Product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $Product,$id)
    {
        //
        $purchaseId=PurchaseDetail::where('product_id',$id)->pluck('purchase_id');
        Product::destroy($id);
        // PurchaseDetail::Destroy()->where('product_id',$id);
        DB::delete('delete from purchase_details where product_id = ?',[$id]);
        Purchase::Destroy($purchaseId);
        return \redirect('editProducts');
    }

    public function currentStock(){
        
    }
}
