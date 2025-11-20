@extends('backend.dashboard')
@section('title', 'Create a new Product')
@section('backend_content')
<div class="card">
    <div class="card-header">Add Prodcut</div>
    <div class="card-body">
        <form action="{{ route('backend.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-8">
                    <div class="form-group">
                        <label for="">Product Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" required class="form-control">
                    </div>


                    <div class="row my-3">
                        <div class="form-group col-lg-4">
                            <label for="">Price <span class="text-danger">*</span></label>
                            <input type="number" name="price" required class="form-control">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="">Selling Price </label>
                            <input type="number" name="selling_price" class="form-control">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="">Brand </label>
                            <input type="text" name="brand" class="form-control">
                        </div>
                        <div class="form-group mt-3">
                            <label for="">SKU</label>
                            <input type="text" name="sku" class="form-control">
                        </div>
                    </div>


                    <textarea class="form-control my-3" placeholder="Short Details...." name="short_details"></textarea>
                    <textarea class="form-control my-3" placeholder="Features..." name="features"></textarea>



                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="">Featured Image</label>
                        <input type="file" name="featured_img" class="form-control">
                    </div>
                    <div class="form-group my-3">
                        <label for="">Gallery Images</label>
                        <input type="file" multiple name="gall_img[]" class="form-control">
                    </div>


                    <div class="form-group">
                        <label for="">Select a Category <span class="text-danger">*</span></label>
                        <select name="category" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="btn btn-primary my-3">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection