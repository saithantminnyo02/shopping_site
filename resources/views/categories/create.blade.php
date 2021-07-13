@extends('layouts.admin_layout')

@section('content')
    <div class="container mt-3 mb-3">
        <h3>Create New Category</h3>
    
    <hr>
    
    <form action="{{ url('categories') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name">
        </div>


        <button class="btn btn-primary">Create New Category</button>
    </form>
    </div>
@endsection