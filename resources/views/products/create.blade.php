@extends('layouts.admin_layout')

@section('content')
    <div class="container mt-3 mb-3">
        <h3>Create New Product</h3>
    
    <hr>

    {{ Form::open(['route' => 'products.store', 'method' => "POST", 'enctype' => 'multipart/form-data']) }}

        @include('products.form')

        <div class="form-group">
            <label>Category</label>
            {{ Form::select('category_id[]', $categories, null,  [
                'class' => "form-control",
                'multiple' => 'multiple'
            ]) }}
        </div>

        {{-- <div class="form-group">
            <label>Category</label>
            {{ Form::select('category_id[]', $categories, null, [
                'class' => ($errors->has('description') ? 'form-control is-invalid' : 'form-control'),
                'multiple' => 'multiple'
            ]) }}
        
            @if($errors->has('category_id'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('category_id') }}</strong>
                </span>
            @endif
    </div> --}}

        <div class="form-group">
            <label for="profile_image">Choose Photo</label>
        {{-- <input type="file" name="profile_image" class="form-control"> --}}
        {{
            Form::file('profile_image', [
                'class' => "form-control"
            ])
        }}
        </div>

        <button class="btn btn-primary">Create New Product</button>

    {{ Form::close() }}
    </div>
@endsection