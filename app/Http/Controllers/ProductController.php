<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Http\Requests\StoreProduct;
use Validator,Redirect,Response,File;
use App\Photo;


class ProductController extends Controller
{
    function __construct()
    {
        //  $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
         $this->middleware('permission:product-create', ['only' => ['create','store']]);
         $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(9);
        $categories = Category::all();
        return view('products.index', ['products' => $products, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id')->all();

        return view('products.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {

        // $request->validate([
        //     'name' => 'required',
        //     'description' => 'required',
        //     'quantity' => 'required',
        //     'price' => 'required'
        // ]);

        $product = Product::create( $request->all() );

        $product->categories()->sync($request->category_id);

        if ($files = $request->file('profile_image')) {
            // Define upload path
            $destinationPath = public_path('/profile_images/'); // upload path
         // Upload Orginal Image           
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
 
            $insert['image'] = "$profileImage";
         // Save In Database
             $product->photo_name="$profileImage";
             $product->save();
         }

        return redirect('products');
        // return back()->with('success', 'Image Upload successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        // Select Box Render Data
        $categories = Category::pluck('name', 'id')->all();

        $selected_categories = $product->categories->pluck('id')->all();

        return view('products.edit', [
            'product' => $product,
            'categories' => $categories,
            'selected_categories' => $selected_categories
        ]);
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
        $product = Product::find($id);
        $product->update( $request->all() );
        $product->categories()->sync($request->category_id);
        return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->route('products.index');
    }

    public function bycategory($cat)
    {
        // $category = Category::where('name', $cat)->first();
        
        $category = Category::find($cat);
        $products = $category->products()->paginate(9);
        $categories = Category::all();
        return view('products.index', ['products' => $products, 'categories' => $categories]);
    }
}
