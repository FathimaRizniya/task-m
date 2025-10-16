<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // Admin can view all categories
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    // Admin can create a category
    public function create()
    {
        return view('admin.categories.create');
    }

    // Admin can create a new category
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:Active,Inactive',
        ]);

        Category::create($request->only('category_name','description','status'));
        return redirect()->route('categories.index')->with('success', 'Category created successfully!');
    }

    // Admin can edit a category
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    // Admin can update a category
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'category_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:Active,Inactive',
        ]);

        $category->update($request->only('category_name','description','status'));
        return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
    }

    // Admin can delete a category
    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
    }

    // User can view categories only 
    public function viewForUser()
    {
        $categories = Category::all();
        return view('user.categories.index', compact('categories'));
    }
}
