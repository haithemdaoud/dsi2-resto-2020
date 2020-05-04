@extends('layouts.app')

@section('content')
<a href="{{ route('meals.create') }}" class="btn btn-outline-primary btn-lg float-right" role="button"
    aria-pressed="true">Add new Meal</a>
<h1>Meals List</h1>
<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Quantity in stock</th>
        <th scope="col">Buy Price</th>
        <th scope="col">Sell Price</th>
        <th scope="col">Operations</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($meals as $meal)            
            <tr>
                <td scope="row"> {{ $meal->id }}</td>
                <td> {{ $meal->name }}</td>
                <td> {{ $meal->stock_quantity }}</td>
                <td> {{ $meal->buy_price }}</td>
                <td>{{ $meal->sell_price }}</td>
                <td>
                    <a href="{{ route('meals.show', $meal->id) }}" class="btn btn-outline-info">Details</a>
                    <a href="#" class="btn btn-outline-success">Edit</a>
                    <a href="#" class="btn btn-outline-danger">Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>
  {{ $meals->links() }}
@endsection