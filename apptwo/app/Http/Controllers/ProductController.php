<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\ProductUser;

use App\Jobs\ProductLiked;

class ProductController extends Controller
{
    public function index(){
        return Product::all();
    }

    public function like(Request $request,$id){

        $response = \Http::get('http://docker.for.mac.localhost:8000/api/users');
        $user = $response->json();

        
        $product_user = ProductUser::create([
            'user_id'=>$user['id'],
            'product_id'=>$id
        ]);

        ProductLiked::dispatch($product_user);

        // return response()->json([
        //     'message'=>'Like updated successfully'
        // ]);

        return $product_user;

    }
}
