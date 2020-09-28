@extends('layouts.dashboard_master')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title float-left">Order Manage</h4>

            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('order') }}">Order</a></li>
                <li class="breadcrumb-item active"> Add New Order </li>
            </ol>

            <div class="clearfix"></div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title"><b>Order Manage</b></h4>

            <div class="row">
                <div class="col-md-4">
                    <div class="my-4">
                        <div class="form-group">
                            <label for="">Your Budget</label>
                            <input type="text" class="form-control" id="budget" placeholder="Enter Your Budget">
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-5">
                    <h5>Budget = <span id="add_budget">0</span> <b>৳ </b></h5>
                </div>
                <div class="col-md-4 mt-5">
                    <h5>Total Amount = <span id="add_total_amount">0</span></h5>
                </div>
                <div class="col-md-12 text-center">
                    <h5 class="text-danger" id="alert"></h5>
                </div>
            </div>

            <form action="{{ route('order.store') }}" method="POST">
                @csrf

                <input type="hidden" value="{{ Auth::user()->name }}" name="name">
                <input type="hidden" id="add_total_amount_input" value="" name="total_amount">
                
                <table class="table table-bordered mt-5">
                    <thead>
                        <tr>
                            <th style="width: 30%">Name</th>
                            <th style="width: 20%">Quantity</th>
                            <th style="width: 20%">Price</th>
                            <th style="width: 20%">Total</th>
                            <th style="width: 10%">
                                <button type="button" class="btn btn-success btn-sm add" id="add">+</button>
                                {{-- <a id="add" class="btn btn-info">ok</a> --}}
                            </th>
                        </tr>
                    </thead>
                    <tbody id="item_table">

                    </tbody>

                </table>

                <div class="float-right">
                    <button class="btn btn-success" type="submit" id="submitbutton" disabled>Save</button>
                </div>

            </form>


        </div>
    </div>
</div>

@endsection
