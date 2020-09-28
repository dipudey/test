@extends('layouts.dashboard_master')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title float-left">Product Manage</h4>

            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item active"> Product </li>
            </ol>

            <div class="clearfix"></div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <div class="mb-5">
                <h4 class="m-t-0 header-title"><b>Product Manage</b></h4>
                <div class="float-right">
                    <a href="" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Add New Product</a>
                </div>
            </div>
            <table id="datatable" class="table table-bordered mt-5">
                <thead>
                <tr>
                    <th>SL. NO</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }} Taka</td>
                            <td>
                                <a href="{{ route('product.destroy',$product->id) }}" class="btn btn-sm btn-outline-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> <!-- end row -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Food Item</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('product.store') }}" method="post" id="product-form">
            @csrf
            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" class="form-control" placeholder="Product Name" name="name">
            </div>
            <div class="form-group">
                <label for="name">Product Price</label>
                <input type="text" class="form-control" placeholder="Product Price" name="price">
            </div>
            <div class="form-group">
                <label for="name">Product Quantity</label>
                <input type="text" class="form-control" placeholder="Product Quantity" name="quantity">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="event.preventDefault();
          document.getElementById('product-form').submit();">Save</button>
        </div>
      </div>
    </div>
  </div>


@endsection