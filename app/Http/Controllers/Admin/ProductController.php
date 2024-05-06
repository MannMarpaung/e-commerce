<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::select('id', 'name', 'category_id', 'description', 'price')->latest()->get();
        $category = Category::all();

        return view('pages.admin.product.index', compact('product', 'category'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();

        return view('pages.admin.product.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        try {

            // create product
            $data = $request->all();

            $data['slug'] = Str::slug($request->name);

            $product = Product::create($data);

            // dd($product);

            return redirect()->route('admin.product.index')->with('success', 'Product added successfully');

        } catch(Exception $e) {
            // dd($e->getMessage());
            return redirect()->back()->with('error', 'Failed to add product');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);

        $category = Category::all();

        return view('pages.admin.product.edit', compact('product', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            "name" => 'required',
            "category_id" => 'required',
            "price" => 'required',
            "description" => 'required'
        ]);

        try {
            $product = Product::find($id);

            $data = $request->all();
            $data['slug'] = Str::slug($request->name);

            $product->update($data);

            return redirect()->route('admin.product.index')->with('success', 'Product Has Been Successfully Edited');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->route('admin.product.index')->with('error', 'Failed To Edited Product');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            // Get data by id
        $product = Product::find($id);

        // delete data by id
        $product->delete();

        return redirect()->back()->with('success', 'Product deleted successfully');

        } catch(Exception $e) {
            // dd($e->getMessage());
            return redirect()->back()->with('error', 'Failed to delete product');
        }
    }
}
