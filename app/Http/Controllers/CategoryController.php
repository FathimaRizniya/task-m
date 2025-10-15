<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // Admin: view all categories
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    // Admin: show form to create a category
    public function create()
    {
        return view('admin.categories.create');
    }

    // Admin: store a new category
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

    // Admin: edit a category
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    // Admin: update a category
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

    // Admin: delete a category
    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
    }

    // User: view categories only (read-only)
    public function viewForUser()
    {
        $categories = Category::all();
        return view('user.categories.index', compact('categories'));
    }
}
