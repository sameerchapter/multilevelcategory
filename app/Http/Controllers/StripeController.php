<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Stripe;
use \Stripe\Plan;

class StripeController extends Controller
{
    
  public function index(Request $request)
    {
        //dd($request->all());
         $category=Category::find($request->category_id);
         $amount=get_price($category);
         $user = auth()->user();
            $input = $request->all();
            $token =  $request->stripeToken;
            $paymentMethod = $request->paymentMethod;
          

             Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            if($category->is_planned!=1)
             {
              $res=Plan::create(array(
             "amount" => $amount,
             "interval" => "month",
             "product" => ['name'=>$category->title],
             "currency" => "inr",
            "id" => $request->category_id)
              ); 
              $category->is_planned=1;
              $category->save();
        
             }
       
            try {

            
                
                if (is_null($user->stripe_id)) {
                    $stripeCustomer = $user->createAsStripeCustomer();
                }

                \Stripe\Customer::createSource(
                    $user->stripe_id,
                    ['source' => $token]
                );

                $user->newSubscription('test',$request->category_id)
                    ->create($paymentMethod, [
                    'email' => $user->email,
                ]);

                return back()->with('success','Subscription is completed.');
            } 
            catch (Exception $e) {
                return back()->with('success',$e->getMessage());
            }
    } 

}
