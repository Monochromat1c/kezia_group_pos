<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function showProduct()
    {
        $products = Product::all(); // Fetch all products from the database
        return view('cart.add_order', compact('products'));
    }

    public function checkout(Request $request)
    {
        $cartItems = json_decode($request->input('cart_items'), true);

        $totalAmount = 0;
        $totalDiscount = 0;

        foreach ($cartItems as $item) {
            $totalAmount += $item['price'] * $item['quantity'];
            if ($item['discount'] !== 'No discount') {
                $totalDiscount += ($item['price'] * $item['quantity'] * ((int)$item['discount']) / 100);
            }
        }

        $payableAmount = $totalAmount - $totalDiscount;

        return view('cart.checkout', compact('cartItems', 'totalAmount', 'totalDiscount', 'payableAmount'));
    }

    public function receipt(Request $request)
    {
        $cartItems = json_decode($request->input('cart_items'), true);
        $totalAmount = $request->input('total_amount');
        $totalDiscount = $request->input('total_discount');
        $payableAmount = $request->input('payable_amount');
        $amountPaid = $request->input('amount_paid');
        $change = $amountPaid - $payableAmount;

        return view('cart.receipt', compact('cartItems', 'totalAmount', 'totalDiscount', 'payableAmount', 'amountPaid', 'change'));
    }


}
