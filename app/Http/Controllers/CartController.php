<?php

namespace App\Http\Controllers;

use Cart;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->id;
        $items = Cart::session($userId)->getContent();
        $total = Cart::session($userId)->getTotal();
        $count = $items->count();

        return view('user.cart', [
            'items' => $items,
            'total_item' => $count,
            'total' => $total,
        ]);

        // dd($items);
    }

    public function addItem(Request $request)
    {
        $product = Product::find($request->product_id);
        $userId = auth()->user()->id;
        $itemId = Str::random(5);

        if (auth()->user()->username !== 'admin') {
            $data = ([
                'id' => $itemId,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $request->quantity,
                'attributes' => [
                    'subtotal' => $product->price * $request->quantity,
                    'image' => $product->image,
                    'category' => $product->category->name,
                ]
            ]);

            // // Check Similar Item
            // $items = Cart::session($userId)->getContent();

            // foreach ($items as $item) {
            //     if ($data['name'] === $item['name']) {
            //         Cart::session($userId)->update($item['id'], [
            //             'quantity' => $data['quantity'] + $item['quantity'],
            //         ]);
            //     } else {
            //     }
            // }

            Cart::session($userId)->add($data);

            return redirect()->back()->with('success', 'Added to Cart!');
        } else {
            return redirect()->back()->with('error', "You're an admin!");
        }
    }

    public function deleteItem(Request $request)
    {
        $userId = auth()->user()->id;
        $id = $request->id;

        Cart::session($userId)->remove($id);
        return redirect()->back()->with('success', "Item deleted!");
    }

    public function updateItem(Request $request)
    {
        $userId = auth()->user()->id;
        $itemId = $request->item_id;
        $item = Cart::session($userId)->get($itemId);

        $data = ([
            'quantity' => [
                'relative' => false,
                'value' => $request->quantity
            ],
            'attributes' => [
                'subtotal' => $item['price'] * $request->quantity,
                'image' => $item->attributes->image,
                'category' => $item->attributes->category
            ]
        ]);

        Cart::session($userId)->update($itemId, $data);

        return back()->with('success', 'Item updated!');
    }

    public function clearCart()
    {
        $userId = auth()->user()->id;
        Cart::session($userId)->clear();

        return redirect()->back()->with('success', "Cart cleared!");
    }
}
