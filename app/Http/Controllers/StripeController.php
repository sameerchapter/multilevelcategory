<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Stripe;

class StripeController extends Controller
{
    
  public function index(Request $request)
    {
        //dd($request->all());
         $category=Category::find($request->category_id);
        $amount=get_price($category);
          Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $response=Stripe\Charge::create ([
                "amount" => $amount*100,
                "currency" => "INR",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com." 
        ]);
        
         if($response->status=="succeeded")
         {
            return redirect()->back()->with('success','Payament Done Successfuly !');
         }else{
            return redirect()->back()->with('error','Something Went Wrong !');
         }   
    }

}
