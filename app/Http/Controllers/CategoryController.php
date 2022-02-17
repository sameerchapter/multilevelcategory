<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Stripe;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories= Category::all();
        return view('category',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories= Category::all();
        return view('add-category',compact('categories'));
    }

    public function subcategory(Request $request,$id)
    {
        
      $categories= Category::where('parent_id',$id)
               ->get();
        return view('subcategory',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $new_category=new Category();
        $new_category->title=$request->category_title;
        $new_category->description=$request->category_description;
        if(!empty($request->parent_category))
        {    
        $new_category->parent_id=$request->parent_category;
        }
        $new_category->save();
        return redirect()->back()->with('success','Category Created Successfuly !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
    public function stripe(Request $request)
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

     public function order(Category $category,$id)
    {
        $category=Category::find($id);
        return view('stripe',compact('category')); 
    }
}
