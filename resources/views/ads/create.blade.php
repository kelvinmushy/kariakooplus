@extends('layouts.app')

@section('title', 'Create Electronic Device Ad')
@section('top')

<link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/45.0.0/ckeditor5.css">
@endsection
@section('content')
<div class="container">
    <h2>Create New Electronic Device Ad</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Please fix the following errors:
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('ads.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                 
                        <input type="hidden" name="user_id" class="form-control" id="user_id" value="1">
                   

                    <div class="col-md-12">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" name="name" class="form-control" id="name" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label>Description</label>
                    
                    <textarea name="product_description" class="form-control ckeditor"></textarea>

                </div>
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" name="price" step="0.01" class="form-control" id="price" required>
                    </div>

                    <div class="col-md-6">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" class="form-select" id="status" required>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="property_images" class="form-label">Upload Product Images (Max 5 images)</label>
                    <input type="file" name="property_images[]" id="property_images" accept=".jpeg, .jpg, .png" multiple required class="form-control">
                    <div id="image-preview" class="preview-images mt-2"></div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="category_id" class="form-label">Category</label>
                        <select name="category_id" class="form-select" id="category_id" required>
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="subcategory_id" class="form-label">Subcategory</label>
                        <select name="subcategory_id" class="form-select" id="subcategory_id" required>
                            <option value="">Select Subcategory</option>
                            @foreach ($subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="brand_id" class="form-label">Brand</label>
                        <select name="brand_id" class="form-select" id="brand_id" required>
                            <option value="">Select Brand</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="model_id" class="form-label">Model</label>
                        <select name="model_id" class="form-select" id="model_id" >
                            <option value="">Select Model</option>
                            @foreach ($models as $model)
                                <option value="{{ $model->id }}">{{ $model->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="condition" class="form-label">Condition</label>
                        <select class="form-select" name="product_condition" id="product_condition" required>
                            <option value="new">New</option>
                            <option value="used">Used</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="warranty" class="form-label">Warranty Period</label>
                        <input type="text" name="warranty" class="form-control" id="warranty" placeholder="e.g. 1 year" required>
                    </div>
                </div>
            </div>

            <div class="card-footer text-right">
                <button type="submit" class="btn btn-success">Create Ad</button>
                <a href="{{ route('ads.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </form>
</div>
@endsection

@section('bot')
<script>
    let myEditor;

    ClassicEditor
        .create(document.querySelector('.ckeditor'), {
            toolbar: ['bold', 'italic', 'link', 'undo', 'redo', 'bulletedList', 'numberedList', 'blockQuote']
        })
        .then(editor => {
            myEditor = editor;
            editor.ui.view.editable.element.style.height = '200px';
        })
        .catch(error => {
            console.error("Error initializing CKEditor:", error);
        });

    // Update product description before form submission
    document.querySelector('form').addEventListener('submit', function (e) {
        const textarea = document.querySelector('textarea[name="product_description"]');
        textarea.value = myEditor.getData();
    });

    // Image preview & remove
    const fileInput = document.getElementById('property_images');
    const previewContainer = document.getElementById('image-preview');
    let selectedFiles = [];

    fileInput.addEventListener('change', function () {
        previewContainer.innerHTML = '';
        selectedFiles = Array.from(this.files);

        selectedFiles.forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function (e) {
                const wrapper = document.createElement('div');
                wrapper.classList.add('position-relative');

                const img = document.createElement('img');
                img.src = e.target.result;
                img.style.width = '100px';
                img.style.height = '100px';
                img.style.objectFit = 'cover';
                img.classList.add('rounded');

                const removeBtn = document.createElement('button');
                removeBtn.textContent = '×';
                removeBtn.className = 'btn btn-danger btn-sm position-absolute top-0 end-0';
                removeBtn.type = 'button';

                removeBtn.onclick = () => {
                    selectedFiles.splice(index, 1);
                    updateFileList();
                    wrapper.remove();
                };

                wrapper.appendChild(img);
                wrapper.appendChild(removeBtn);
                previewContainer.appendChild(wrapper);
            };
            reader.readAsDataURL(file);
        });
    });

    function updateFileList() {
        const dataTransfer = new DataTransfer();
        selectedFiles.forEach(file => dataTransfer.items.add(file));
        fileInput.files = dataTransfer.files;
    }
</script>

@endsection

