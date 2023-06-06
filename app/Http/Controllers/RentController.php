<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use App\Models\Cart;
use App\Models\Rent;
use App\Models\User;
use Midtrans\Config;
use App\Models\RentProduct;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRentRequest;
use App\Http\Requests\UpdateRentRequest;

class RentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::find(auth()->user()->id);
        $rents = Rent::where('user_id', $user->id)->get();

        return view('user.rent.index', [
            'rents' => $rents
        ]);
    }

    public function checkout()
    {
        $userId = auth()->user()->id;
        $user = User::find($userId);

        // Cart Items
        $items = Cart::all()->where('user_id', $userId);

        if (auth()->user()->username == 'admin') {
            return back()->with('error', 'You are an admin');
        }

        if ($user->address == NULL) {
            return redirect('/user/profile')->with('warning', 'Add your address before continue!');
        } else {
            return view('user.rent.checkout', [
                'items' => $items
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userId = auth()->user()->id;
        $items = Cart::where('user_id', $userId)->get();

        $duration = $request->duration;
        $rentStart = $request->rent_start;
        $rentEnd = $request->rent_end;
        $rentId = uniqid();

        $rentData = [
            'rent_id' => $rentId,
            'user_id' => $userId,
            'duration' => $duration,
            'rent_start' => $rentStart,
            'rent_end' => $rentEnd,
            'status' => 'test',
        ];

        Rent::create($rentData);

        $rents = Rent::where('rent_id', $rentId)->get();

        foreach ($rents as $rent) {
            $rent_id = $rent->id;
            $id_rent = $rent->rent_id;
        }
        foreach ($items as $item) {
            $rentProductData = [
                'rent_id' => $rent_id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'total_price' => $item->subtotal
            ];

            RentProduct::create($rentProductData);
        }

        $rent_products = RentProduct::where('rent_id', $rent_id)->get();
        $total_pay = $duration * $items->sum('subtotal');

        Config::$serverKey = 'SB-Mid-server-rcZlMBqZR9zPbEZcee7law8v';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        Config::$isProduction = false;
        // Set sanitization on (default)
        Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $id_rent,
                'gross_amount' => $total_pay,
            ),
            'customer_details' => array(
                'full_name' => $rent->user->name,
                'email' => $rent->user->email,
            ),
        );

        $snapToken = Snap::getSnapToken($params);

        return view('user.rent.payment', [
            'rents' => $rents,
            'rent_products' => $rent_products,
            'pay_token' => $snapToken
        ]);
    }

    public function payment()
    {
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $rentId = request('id');

        $rent_products = RentProduct::where('rent_id', $rentId)->get();

        return view('user.rent.detail', compact('rent_products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rent $rent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRentRequest $request, Rent $rent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rent $rent)
    {
        //
    }
}
