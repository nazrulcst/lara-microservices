<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Models\Product;

class ProductLiked implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function handle()
    {
        return 'Hello';
        $product = Product::find((int)$this->data['product_id']);
        $product = Product::find(9);
        $product->likes = $this->data['user_id'];
        $product->save();
        
    }
}
