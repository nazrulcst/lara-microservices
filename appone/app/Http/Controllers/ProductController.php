<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

use App\Jobs\ProductCreated;
use App\Jobs\ProductUpdated;
use App\Jobs\ProductDeleted;

class ProductController extends Controller
{
    public function index(){

        return Product::all();

    }

    public function show($id){

        return Product::find($id);

    }

    public function store(Request $request){

        $product = Product::create($request->only(['title','image']));
        ProductCreated::dispatch($product->toArray());
        return response()->json([
            'status'=>200,
            'message'=>'Product created successfully'
        ]);

    }

    public function update(Request $request,$id){

        $product = Product::find($id);
        $product->update($request->only(['title','image']));

        ProductUpdated::dispatch($product->toArray());

        return response()->json([
            'status'=>200,
            'message'=>'Product updated successfully'
        ]);

    }

    public function destroy($id){

        Product::destroy($id);

        ProductDeleted::dispatch($id);

        return response()->json([
            'status'=>200,
            'message'=>'Product deleted successfully'
        ]);

    }

}
