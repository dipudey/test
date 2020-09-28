@extends('layouts.dashboard_master')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title float-left">Food Manage</h4>

            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item active"> Food </li>
            </ol>

            <div class="clearfix"></div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <div class="mb-5">
                <h4 class="m-t-0 header-title"><b>Food Manage</b></h4>
                <div class="float-right">
                    <a href="" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Add New Food</a>
                </div>
            </div>
            <table id="datatable" class="table table-bordered mt-5">
                <thead>
                <tr>
                    <th>SL. NO</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                    @foreach ($foods as $food)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $food->food_name }}</td>
                            <td>
                                <a href="{{ route('food.destroy',$food->id) }}" class="btn btn-sm btn-outline-danger">Delete</a>
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
          <form action="{{ route('food.store') }}" method="post" id="food-form">
            @csrf
            <div class="form-group">
                <label for="name">Food Name</label>
                <input type="text" class="form-control" placeholder="Food Name" name="food_name">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="event.preventDefault();
          document.getElementById('food-form').submit();">Save</button>
        </div>
      </div>
    </div>
  </div>


@endsection