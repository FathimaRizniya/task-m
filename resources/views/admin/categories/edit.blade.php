@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-xl font-bold mb-4">Edit Category</h2>

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="Category_name" class="block font-medium">Category Name</label>
            <input type="text" name="Category_name" id="Category_name" class="border rounded w-full p-2" value="{{ $category->Category_name }}" required>
        </div>

        <div class="mb-4">
            <label for="Description" class="block font-medium">Description</label>
            <textarea name="Description" id="Description" class="border rounded w-full p-2">{{ $category->Description }}</textarea>
        </div>

        <div class="mb-4">
            <label for="Status" class="block font-medium">Status</label>
            <select name="Status" id="Status" class="border rounded w-full p-2">
                <option value="Active" {{ $category->Status == 'Active' ? 'selected' : '' }}>Active</option>
                <option value="Inactive" {{ $category->Status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Update Category</button>
    </form>
</div>
@endsection
