@extends('layouts.backend')
@section('title', "Categories")
@section('backend_content')
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <form 
                    action="{{ route('backend.category.store') }}" 
                    method="POST" 
                    enctype="multipart/form-data"
                    >
                        @csrf
                        <div class="form-group">
                            <label for="title">Category Title <span class="text-danger">*</span></label>
                            <input type="text" required class="form-control"  name="title" placeholder="Example: Desktop | Fashion...">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group my-3">
                            <label for="icon">Category Icon</label>
                            <input type="file"  class="form-control"  name="icon">
                            @error('icon')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <table class="table table-responsive table-striped">
                        <tr>
                            <th>Sl</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                        @forelse ($categories as $key=>$category)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td><img width="50px" src="{{ asset('storage/'.$category->icon) }}" alt=""> {{ $category->title }}</td>
                                <td>{{ $category->status ? 'Active' : 'Deactive' }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('backend.category.delete', $category) }}" class="btn btn-sm btn-danger">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">No Category Found!</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection