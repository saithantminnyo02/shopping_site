@extends('layouts.admin_layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product Table</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product Table</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Category</th>
                  <th>Description</th>
                  <th>Price</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                {{-- <tr>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 4.0
                  </td>
                  <td>Win 95+</td>
                  <td> 4</td>
                  <td>X</td>
                </tr> --}}
                  @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>@foreach ($product->categories as $category)
                    {{ $category->name }}
                @endforeach</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }} Kyats</td>
                <td>
                    <form action="{{ url('products', $product->id) }}" method="POST">
                        @method("DELETE")
                        @csrf
                        <a href="{{ url('products', $product->id) }}" class="btn btn-primary">Show</a>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-info">Edit</a>
                        <button href="{{ url('products', $product->id) }}" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
                
                </tbody>
                <tfoot>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Price</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
</div>
    </section>

          <div class="d-flex justify-content-center">{{ $products->links() }} </div>
@endsection