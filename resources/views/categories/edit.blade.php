@extends('layouts.admin_layout')

@section('content')
    <div class="container mt-3 mb-3">
        <h3>Edit Category</h3>
    
    <hr>
    
    <form action="{{ url('categories', $category->id) }}" method="POST">
        @method('PUT')
        @csrf
        
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" value="{{ $category->name }}">
        </div>

        <button class="btn btn-primary">Update Category</button>
    </form>
    </div>
@endsection