@extends('layouts.dashboard_master')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title float-left">Meal</h4>

            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item active"> Meal </li>
            </ol>

            <div class="clearfix"></div>
        </div>
    </div>
</div>

<div class="row">
    <div class="card-box table-responsive">
        <div class="col-md-12">
            <h4 class="text-center">Add 7 Days Meal</h4>
        </div>

        <div class="col-12">
            <div class="mb-5">
                <h4 class="m-t-0 header-title"></h4>
            </div>

            <form action="{{ route('meal.date.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="start_date">Start Date</label>
                    <input type="date" name="start_date" class="form-control" id="start_date">
                </div>

                <div class="form-group">
                    <label for="end_date">End Date</label>
                    <input type="date" name="end_date" class="form-control" id="end_date">
                </div>
                <button type="submit" class="btn btn-outline-info">Add Date</button>
            </form>
            
        </div>

        <div class="col-12">

            <div class="mt-5">
                <h4 class="m-t-0 text-center">Add 7 Days Food</h4>
            </div>

            <form action="{{ route('meal.store') }}" method="POST">
                @csrf
                <table class="table table-bordered table-hover mt-5 text-justify">
                    <thead>
                        <tr>
                            <th>Meal</th>
                            @foreach ($dates->reverse() as $date)
                                <th>{{ date('d-m-Y',strtotime($date->meal_date)) }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
    
                        <tr>
                            <td class="bg-primary text-white">Brackfast</td>
                            @foreach ($dates->reverse() as $date)
                                <td>
                                    <div class="form-group">
                                        @foreach ($foods as $food)
                                            <div class="form-check">
                                                <input id="b-{{ $food->food_name }}-{{ $date->meal_date }}" type="checkbox" name="brackfast[{{ $date->id }}][]" value="{{ $food->id }}">
                                                <label for="b-{{ $food->food_name }}-{{ $date->meal_date }}">
                                                    {{ $food->food_name }}
                                                </label>
                                                <br>
                                            </div>
                                        @endforeach
                                    </div>
                                </td>
                            @endforeach
                            
                        </tr>
    
                        <tr>
                            <td class="bg-success text-white">Lunch</td>
                            @foreach ($dates->reverse() as $date)
                                <td>
                                    <div class="form-group">
                                        @foreach ($foods as $food)
                                            <div class="form-check">
                                                <input id="l-{{ $food->food_name }}-{{ $date->meal_date }}" type="checkbox" name="lunch[{{ $date->id }}][]" value="{{ $food->id }}">
                                                <label for="l-{{ $food->food_name }}-{{ $date->meal_date }}">
                                                    {{ $food->food_name }}
                                                </label>
                                                <br>
                                            </div>
                                        @endforeach
                                    </div>
                                </td>
                            @endforeach
                            
                        </tr>
    
                        <tr>
                            <td class="bg-info text-white">Dinner</td>
                            @foreach ($dates->reverse() as $date)
                                <td>
                                    <div class="form-group">
                                        @foreach ($foods as $food)
                                            <div class="form-check">
                                                <input id="d-{{ $food->food_name }}-{{ $date->meal_date }}" type="checkbox" name="dinner[{{ $date->id }}][]" value="{{ $food->id }}">
                                                <label for="d-{{ $food->food_name }}-{{ $date->meal_date }}">
                                                    {{ $food->food_name }}
                                                </label>
                                                <br>
                                            </div>
                                        @endforeach
                                    </div>
                                </td>
                            @endforeach
                            
                        </tr>
    
    
                    </tbody>
                </table>
                <div class="float-right">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>

           

        </div>

    </div>
</div>
    
@endsection