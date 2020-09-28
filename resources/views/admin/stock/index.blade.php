@extends('layouts.dashboard_master')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title float-left">Order Manage</h4>

            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item active"> Order </li>
            </ol>

            <div class="clearfix"></div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <div class="mb-5">
                <h4 class="m-t-0 header-title"><b>Order Manage</b></h4>

            </div>
            <table id="datatable" class="table table-bordered mt-5">
                <thead>
                <tr>
                    <th>SL. NO</th>
                    <th>Name</th>
                    <th>Total Amount</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->amount }} ৳</td>
                            <td>
                                <button type="button" id="orderView" data-id="{{ $order->id }}" class="btn btn-outline-success">View</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> <!-- end row -->

<!-- Modal -->
<div class="modal fade" id="orderViewModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Order View Model</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
            <table class="table table-bordered mt-2">
                <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
                </thead>

                <tbody id="productList">
                   
                </tbody>
            </table>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


@endsection
@section('script')
  <script>
      $('body').on('click',"#orderView",function() {
        let id = $(this).data('id')
        // alert(id)
        $.ajax({
            url: `/admin/order/item/list/${id}/json`,
            method: 'get',
            dataType: 'json',
            success: function(data) {
                let html = ''
                data.forEach(item => {
                    html += `<tr><td>${item.product.name}</td><td>${item.quantity}</td><td>${item.product.price} ৳</td><td>${item.quantity * item.product.price} ৳</td></tr>`
                })
                $("#productList").append(html)
                $("#orderViewModel").modal('show')
            }
        })

      });
  </script>
@endsection