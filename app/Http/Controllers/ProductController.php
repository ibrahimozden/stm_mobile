<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     // $products= Product::all();
    //return response()->json($products);
         $products= Product::select('products.seller_id', 'products.*')
        ->join('sellers', 'products.seller_id', '=', 'sellers.id')
        ->get();
         return response()->json($products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $products = new Product;
        
        $products->name= $request->name;
        $products->description= $request->description;
        $products->seller_id= $request->seller_id;
        $products->photo_url= $request->photo_url;
        $products->photo_url1= $request->photo_url1;
        $products->photo_url2= $request->photo_url2;
        $products->price= $request->price;
        $products->sell_no= $request->sell_no;
        $products->comment_no= $request->comment_no;
        $products->save();
        return response()->json('Veri başarıyla eklendi.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $products = Product::find($id);
        return response()->json($products);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $products = Product::find($id);
       
        $products->name= $request->name;
        $products->description= $request->description;
        $products->seller_id= $request->seller_id;
        $products->photo_url= $request->photo_url;
        $products->photo_url1= $request->photo_url1;
        $products->photo_url2= $request->photo_url2;
        $products->price= $request->price;
        $products->sell_no= $request->sell_no;
        $products->comment_no= $request->comment_no;
        $products ->update();
        return response()->json('Veri başarıyla düzenlendi.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return response()->json('Veri başarıyla silindi.');
    }
}
