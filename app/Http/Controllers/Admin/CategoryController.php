<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::select('id', 'name', 'image')->latest()->get();

        return view('pages.admin.category.index', compact(
            'category'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        try {
            // create category
            $data = $request->all();
            
            // store image
            $image = $request->file('image');
            $image->storeAs('public/category', $image->hashName());

            $data['image'] = $image->hashName();
            $data['slug'] = Str::slug($request->name);

            Category::create($data);
            
            // dd($category);
            
            return redirect()->back()->with('success', 'Category added successfully');

        } catch (Exception $e) {
            // dd($e->getMessage());
            return redirect()->back()->with('error', 'Failed to add category');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        try {

            $category = Category::find($id);

            if ($request->file('image') == '') {
                $data = $request->all();
                $data['slug'] = Str::slug($request->name);

                $category->update($data);

            } else {
                // delete old image3
                Storage::disk('local')->delete('public/category/' . basename($category->image));
                
                // store new image
                $image = $request->file('image');
                $image->storeAs('public/category/', $image->hashName());

                $data = $request->all();
                $data['image'] = $image->hashName();
                $data['slug'] = Str::slug($request->name);

                $category->update($data);
            }

                return redirect()->back()->with('success', 'Category updated successfully');
            
        } catch (Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', 'Failed to edit category');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            // Get data by id
        $category = Category::find($id);

        // delete Image
        Storage::disk('local')->delete('public/category/' . basename($category->image));

        // delete data by id
        $category->delete();

        return redirect()->back()->with('success', 'Category deleted successfully');

        } catch(Exception $e) {
            // dd($e->getMessage());
            return redirect()->back()->with('error', 'Failed to delete category');
        }
    }
}
