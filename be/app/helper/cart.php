<?php

namespace App\Helper;

use App\Models\product;

class cart
{
    public $items = [];
    public $tt_quantity = 0;
    public $price = 0;
    public $total = 0;

    //them gio hang
    public function __construct()
    {
        $this->items = session('cart') ? session('cart') : [];
    }
    public function list()
    {
        return $this->items;
    }
    public function add($product, $quantity = 1)
    {
        $productId = $product->id;
        if ($product->sale > 0) {
            $price = $product->sale;
        } else {
            $price = $product->price;
        }
        if (isset($this->items[$productId])) {
            $this->items[$productId]['quantity'] += $quantity;
        } else {
            $item = [
                'product_id' => $product->id,
                'name' => $product->name,
                'price' => $price,
                'image' => $product->image,
                'quantity' => $quantity,
                'max_quantity' => $product->stock_quantity,
            ];
            $this->items[$productId] = $item;
        }
        session(['cart' => $this->items]);
        /*  session()->flush();  */




        return response()->json([
            'success' => 'Giỏ hàng đã được cập nhật',
            'cart' => session('cart'),

        ], 200);
        /*  session()->flush(); */
    }
}
