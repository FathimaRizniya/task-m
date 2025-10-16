<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
    <style>
        body { font-family: "Poppins", sans-serif; 
        background: #f3f4f6; margin:0; padding:0; }

        .container { max-width:600px; margin:50px auto; 
            background:#fff; border-radius:12px; 
            padding:30px; 
            box-shadow:0 4px 20px rgba(0,0,0,0.1);}

        h2 { text-align:center; 
            margin-bottom:25px;
             color:#1f2937;}

        label { display:block;
             margin-bottom:6px; 
             font-weight:500; 
             color:#374151;}

        input[type="text"],
         textarea, select { 
            width:100%; 
            padding:10px;
             border:1px solid #d1d5db;
             border-radius:8px; 
             margin-bottom:15px; 
             font-size:15px;}

        textarea { 
            resize:none;
             height:100px;}


        button { 
            background:#16a34a; 
            color:white; 
            padding:10px 18px;
             border:none; 
             border-radius:8px; 
             cursor:pointer; 
             font-weight:500;}

        button:hover {
             background:#15803d;
            }

        .alert-success {
             background:#d1fae5; 
             border-left:5px solid #10b981;
              padding:12px 18px; 
              color:#065f46; 
              margin-bottom:15px; 
              border-radius:8px;}
    </style>

</head>
<body>
    <div class="container">
        <h2>Edit Category</h2>

        @if(session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            
            <label for="category_name">Category Name</label>
            <input type="text" name="category_name" id="category_name" value="{{ old('category_name', $category->category_name) }}" required>
            @error('category_name')
                <p style="color:red; font-size:14px;">{{ $message }}</p>
            @enderror

            
            <label for="description">Description</label>
            <textarea name="description" id="description">{{ old('description', $category->description) }}</textarea>
            @error('description')
                <p style="color:red; font-size:14px;">{{ $message }}</p>
            @enderror

           
            <label for="status">Status</label>
            <select name="status" id="status">
                <option value="Active" {{ old('status', $category->status) == 'Active' ? 'selected' : '' }}>Active</option>
                <option value="Inactive" {{ old('status', $category->status) == 'Inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('status')
                <p style="color:red; font-size:14px;">{{ $message }}</p>
            @enderror

            
            <div style="text-align:right;">
                <button type="submit">Update Category</button>

                <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 bg-blue-500 text-white rounded">
                    Back to Dashboard
                </a>
            </div>
        </form>
    </div>
</body>
</html>
