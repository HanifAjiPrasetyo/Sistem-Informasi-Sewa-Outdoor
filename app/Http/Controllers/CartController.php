<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::all()->where('user_id', auth()->user()->id);

        return view('user.cart', [
            'carts' => $carts
        ]);
    }

    public function addItem(Request $request)
    {
        $productId = $request->product_id;
        $product = Product::find($productId);

        if (auth()->user()->username !== 'admin') {

            Cart::create([
                'user_id' => auth()->user()->id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'subtotal' => $request->quantity * $product->price,
                'total' => 0
            ]);

            return redirect()->back()->with('success', 'Added to Cart!');
        } else {
            return redirect()->back()->with('error', "You're an admin!");
        }
    }

    public function deleteItem(Request $request)
    {

        $id = $request->id;

        Cart::destroy($id);

        return redirect()->back()->with('success', "Item deleted!");
    }

    public function updateItem(Request $request)
    {
        $itemId = $request->item_id;
        $item = Cart::find($itemId);

        $data = ([
            'quantity' => $request->quantity,
            'subtotal' => $request->quantity * $item->product->price
        ]);

        Cart::where('id', $itemId)->update($data);

        return back();
    }

    public function clearCart()
    {

        DB::table('carts')->delete();

        return redirect()->back()->with('success', "Cart cleared!");
    }
}
