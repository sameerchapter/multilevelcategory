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

    
    

     public function order(Category $category,$id)
    {
        $category=Category::find($id);
        return view('stripe',compact('category')); 
    }
}
