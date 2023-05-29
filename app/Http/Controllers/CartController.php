<?php

namespace App\Http\Controllers;

use Cart as Carts;
use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->id;
        $items = Carts::session($userId)->getContent();

        $carts = Cart::all();
        $total = Carts::session($userId)->getTotal();

        return view('user.cart', [
            'carts' => $carts
        ]);
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

            Carts::session($userId)->add($data);

            Cart::create([
                'user_id' => $userId,
                'product_id' => $request->product_id,
                'quantity' => $data['quantity'],
                'subtotal' => $data['attributes']['subtotal'],
                'total' => Carts::session($userId)->getTotal()
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
        $userId = auth()->user()->id;
        Carts::session($userId)->clear();
        DB::table('carts')->delete();

        return redirect()->back()->with('success', "Cart cleared!");
    }
}
