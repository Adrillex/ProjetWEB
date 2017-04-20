<?php

namespace App\Http\Controllers;

use App\Buy;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::user()->id);
        return view('buy.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Buy::$rules);
        // get the id of the product
        $productId = $request->all()['product_id'];
        // get the quantity of the product in store
        $quantityProduct = Product::where(['id' => $productId])->get();;
        // get the difference
        $quantity = ($quantityProduct[0]->quantity) - ($request->all()['quantity']);
        // update the quantity in the store
        Product::findOrFail($productId)->update(['quantity' => $quantity]);
        $request->merge(['user_id' => Auth::user()->id]);
        Buy::create($request->all());
        return redirect(route('buy.index'));
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $this->validate($request, Buy::$rules);
        // get the quantity of the product bought 5
        $quantityBuy = Buy::where(['product_id' => $id])->get();
        // get the difference between the old and the new quantity of the product bought 10
        $quantityBought = ($request->all()['quantity']) - $quantityBuy[0]->quantity;
        // get the quantity of the product store
        $quantityProduct = Product::findOrFail($id)->get();
        // get the difference between the old and the new quantity of the product stored
        $quantity = $quantityProduct[0]->quantity - $quantityBought;

        Product::findOrFail($id)->update(['quantity' => $quantity]);
        Buy::where(['product_id' => $id])->update($request->only(['quantity']));
        return redirect(route('buy.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Buy::where(['product_id' => $id])->delete();
        return redirect(route('buy.index'));
    }
}
