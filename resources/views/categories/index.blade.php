@extends('layout')

@section('content')
    <h3>Categories</h3>
    
    <hr>

    <table class="table table-bordered table-hover">
        <tr>
            <th>Name</th>
            <th>Actions</th>
        </tr>

        @foreach($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>
                    <form action="{{ url('categories', $category->id) }}" method="POST">
                        @method("DELETE")
                        @csrf
                        <a href="{{ url('categories', $category->id) }}" class="btn btn-primary">Show</a>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info">Edit</a>
                        <button href="{{ url('categories', $category->id) }}" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection