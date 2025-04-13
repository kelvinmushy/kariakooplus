@extends('layouts.app')
@section('top')

@endsection
@section('content')
<div class="container">
    <h2 class="mb-4">Edit Ad</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops!</strong> Please fix the following:
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('ads.update', $ad->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row mb-3">
            <div class="col-md-6">
                <label>User ID</label>
                <input type="number" name="user_id" class="form-control" value="{{ $ad->user_id }}">
            </div>
            <div class="col-md-6">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ $ad->name }}" required>
            </div>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="product_description" class="form-control ckeditor">{{ $ad->product_description }}</textarea>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label>Price</label>
                <input type="number" name="price" step="0.01" class="form-control" value="{{ $ad->price }}">
            </div>
            <div class="col-md-6">
                <label>Stock</label>
                <input type="number" name="stock" class="form-control" value="{{ $ad->stock }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label>Category</label>
                <select name="category_id" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $ad->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label>Subcategory</label>
                <select name="subcategory_id" class="form-control">
                    <option value="">None</option>
                    @foreach ($subcategories as $subcategory)
                        <option value="{{ $subcategory->id }}" {{ $ad->subcategory_id == $subcategory->id ? 'selected' : '' }}>
                            {{ $subcategory->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label>Brand</label>
                <select name="brand_id" class="form-control">
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}" {{ $ad->brand_id == $brand->id ? 'selected' : '' }}>
                            {{ $brand->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label>Model</label>
                <select name="model_id" class="form-control">
                    @foreach ($models as $model)
                        <option value="{{ $model->id }}" {{ $ad->model_id == $model->id ? 'selected' : '' }}>
                            {{ $model->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label>Condition</label>
                <select name="product_condition" class="form-control">
                    <option value="new" {{ $ad->product_condition == 'new' ? 'selected' : '' }}>New</option>
                    <option value="used" {{ $ad->product_condition == 'used' ? 'selected' : '' }}>Used</option>
                </select>
            </div>
            <div class="col-md-6">
                <label>Warranty</label>
                <input type="text" name="warranty" class="form-control" value="{{ $ad->warranty }}">
            </div>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="active" {{ $ad->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $ad->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Upload New Images</label>
            <input type="file" name="property_images[]" class="form-control" multiple>
        </div>

        <div class="mb-3">
            <label>Existing Images:</label>
            <div class="row g-3">
                @foreach ($ad->adimages as $image)
                    <div class="col-md-2">
                        <img src="{{ asset($image->image_path) }}" class="img-thumbnail" width="100%">
                    </div>
                @endforeach
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Update Ad</button>
            <a href="{{ route('ads.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
</div>
@endsection

@section('bot')
<script>
    let myEditor;

    ClassicEditor
        .create(document.querySelector('.ckeditor'), {
            toolbar: [
                'bold', 'italic', 'link', 'undo', 'redo', 'bulletedList', 'numberedList', 'blockQuote'
            ]
        })
        .then(editor => {
            myEditor = editor;

            // Optional: adjust height
            editor.ui.view.editable.element.style.height = '200px';
        })
        .catch(error => {
            console.error("Error initializing CKEditor:", error);
        });

    // Sync CKEditor content on form submit
    document.querySelector('form').addEventListener('submit', function (e) {
        const textarea = document.querySelector('textarea[name="product_description"]');
        textarea.value = myEditor.getData(); // Update textarea before submit
    });
</script>
@endsection
