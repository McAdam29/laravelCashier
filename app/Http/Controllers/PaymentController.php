<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Models\ProductPurchase;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index()
    {
        $productList = ProductPurchase::select(['product_name', 'product_id', 'price'])
        ->groupBy(['product_name', 'product_id', 'price'])
        ->get()
        ->toArray()
        ;

        return view('productsList', compact('productList'));
    }

    public function buyNow($product_id, Request $request)
    {
        $user = auth()->user();
        $postdata = $request->all();
        $postdata['product_id'] = $product_id;

         $stripe = new \Stripe\StripeClient(\config('services.stripe.secret'));

        $checkout_session = $stripe->checkout->sessions->create([
        'line_items' => [[
            'price_data' => [
            'currency' => 'inr',
            'product_data' => [
                'name' => $postdata['product_name'],
            ],
            'unit_amount' => $postdata['price'],
            ],
            'quantity' => 1,
        ]],
        'mode' => 'payment',
        'success_url' => route('checkOutSuccess', $postdata),
        'cancel_url' => route('productsList'),
        ]);

        $productDetails = ProductPurchase::select(['id', 'product_name', 'product_id', 'price'])
        ->where('product_id', $product_id)
        ->first()
        ->toArray()
        ;

        $purchaseDetails = [];

        $purchaseDetails['fk_customer_id'] = $user->id;
        $purchaseDetails['fk_product_id'] = $productDetails['id'];
        $purchaseDetails['total_amount'] = $postdata['price'];
        $purchaseDetails['paid_amount'] = $postdata['price'];
        $purchaseDetails['is_due'] = 0;
        $purchaseDetails['purchased_on'] = date('Y-m-d H:i:s');
        $purchaseDetails['updated_on'] = date('Y-m-d H:i:s');
        $purchaseDetails['status'] =  0;
        $purchaseDetails['is_deleted'] = 0;

        Purchase::create($purchaseDetails);

        return redirect($checkout_session->url);
    }

    public function checkOutSuccess(Request $request)
    {
        $user = auth()->user();
        $postdata = $request->all();

        $product_id = $postdata['product_id'];

        return view('buyNow', compact("postdata", "product_id"));
    }
}
