<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Stripe;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     function __construct()
    {
     $this->middleware('permission:all', ['only' => ['create','store','list_categories','delete','edit']]);
    }
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
        $new_category->price=$request->category_price;
        if(!empty($request->parent_category))
        {    
        $new_category->parent_id=$request->parent_category;
        }
         if ($request->hasFile('category_image')) {
        $image = $request->file('category_image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $name);
        $new_category->image=$name;
        }
        $new_category->save();
        return redirect()->back()->with('success','Category Created Successfuly !');
    }

    
    public function list_categories()
    {
        $categories=Category::all();
        return view('category-list',compact('categories')); 
    }    

     public function order(Category $category,$id)
    {
        $category=Category::find($id);
        return view('stripe',compact('category')); 
    }

   public function delete(Request $request)
    {
    
        $category = Category::find($request->id);
    if($category){
        $destroy = Category::destroy($category->id);
        Category::where('parent_id', '=', $request->id)->update(['parent_id' => 0]);
        return true;
    }
        //$category=Category::find($id);
        //return view('stripe',compact('category')); 
    } 

    public function edit(Request $request,$id)
    {
        
      $category= Category::find($id);
      $categories= Category::where('id','!=',$id)
               ->get();
        return view('edit-category',compact('category','categories'));
    }

     public function update(Request $request,$id)
    {
        
      $category= Category::find($id);
      
        $category->title=$request->category_title;
        $category->description=$request->category_description;
        $category->price=$request->category_price;
        if(!empty($request->parent_category))
        {    
        $category->parent_id=$request->parent_category;
        }
         if ($request->hasFile('category_image')) {

         if($category->image!="category-thumbnail.png")
         {   
         Storage::disk('public')->delete('/images/'.$category->image);   
         }
        $image = $request->file('category_image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $name);
        $category->image=$name;
        }
        $category->save();
        return redirect()->back()->with('success','Category Updated Successfuly !');
    }
}
