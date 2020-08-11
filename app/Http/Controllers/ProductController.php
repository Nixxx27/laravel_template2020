<?php

namespace App\Http\Controllers;

use App\Models\CategoryPerProduct;
use App\Models\Product;
use App\Models\ProductCategory;
use DataTables;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        if (!auth()->user()->hasPermissionTo('Read Product')) {
            abort('401', '401');
        }
        
        $products = Product::with('categories','categories.category')->get();
        
        return view('admin.pages.product.index',compact('products'));

    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ProductCategory::orderBy('title','ASC')->get();

        return view('admin.pages.product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!auth()->user()->hasPermissionTo('Create Product')) {
            abort('401', '401');
        }

        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',
         ], [
            'title.required' => 'Product Title is required',
            'content.required' => 'Product Content is required',
            'category_id.required' => 'Please Choose Category'
        ]
        );

        if ($request->hasFile('attach')) {
            foreach($request->file('attach') as $attachment)
            {
                $request['image'] =   $attachment->getClientOriginalName();
                $attachment->storeAs('public/products/images',  $request['image'] );
            }
        }

        $product = Product::create($request->except('attach','category_id'));

        //Add to Category per Product
        CategoryPerProduct::create(['product_id' => $product->id,
        'productcategory_id' =>  $request['category_id']]);
        

        return redirect()->back()->with('with_success', "Product Added Successfully!");   

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
        if (!auth()->user()->hasPermissionTo('Update Product')) {
            abort('401', '401');
        }

        $product = Product::findOrFail($id);
        $categories = ProductCategory::orderBy('title','ASC')->get();

        return view('admin.pages.product.edit', compact('product','categories'));
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
 
        if (!auth()->user()->hasPermissionTo('Update Product')) {
            abort('401', '401');
        }
            $this->validate($request, [
                'title' => 'required',
                'content' => 'required',
                'category_id' => 'required',
             ], [
                'title.required' => 'Product Title is required',
                'content.required' => 'Product Content is required',
                'category_id.required' => 'Please Choose Category'
            ]
            );
    
            if ($request->hasFile('attach')) {
                foreach($request->file('attach') as $attachment)
                {
                    $request['image'] =   $attachment->getClientOriginalName();
                    $attachment->storeAs('public/products/images',  $request['image'] );
                }
            }
    
            $product = Product::findOrFail($id);
            $product->update($request->except('attach','category_id'));
    
            $categoryPerProduct = CategoryPerProduct::where('product_id',$product->id)->first();
            $categoryPerProduct->update(['productcategory_id' =>  $request['category_id']]);
            

            return redirect()->back()->with('with_success', "Product Updated Successfully!");   
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->back()->with('with_success', "Product Deleted Successfully!");  
    }
}
