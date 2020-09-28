@extends('layouts.dashboard_master')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title float-left">Meal</h4>

                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active"> Meal Search </li>
                </ol>

                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="card-box table-responsive">
            <div class="col-md-12">
                <h4 class="m-t-0 header-title">Meal Search</h4>

                <form action="{{ route('meal.searching') }}" method="get" class="mt-4">
                    <div class="form-group">
                        <label for="date">Search By Date</label>
                        <input type="date" id="date" class="form-control" name="meal_search">
                    </div>

                    <button type="submit" class="btn btn-outline-success">Search</button>

                </form>

            </div>

            <div class="col-md-12">
                <table class="table table-bordered table-hover mt-5">
                    <thead>
                        <tr>
                            <th style="width: 20%">Meal Type</th>
                            <th style="width: 80%">Food List</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td class="bg-primary text-white">Brackfast</td>
                            <td>
                                @isset($meal_date)
                                    @foreach ($meal_date->brackfast as $item)
                                        <b> {{ $item->food->food_name }}</b>({{ $item->student_brackfast->count() }}) | 
                                    @endforeach
                                @endisset
                            </td>
                        </tr>

                        <tr>
                            <td class="bg-info text-white">Lunch</td>
                            <td>
                                @isset($meal_date)
                                    @foreach ($meal_date->lunch as $item)
                                        <b> {{ $item->food->food_name }}</b>({{ $item->student_lunch->count() }}) | 
                                    @endforeach
                                @endisset
                            </td>
                        </tr>

                        <tr>
                            <td class="bg-success text-white">Dinner</td>
                            <td>
                                @isset($meal_date)
                                    @foreach ($meal_date->dinner as $item)
                                        <b> {{ $item->food->food_name }}</b>({{ $item->student_dinner->count() }}) | 
                                    @endforeach
                                @endisset
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </div>



@endsection