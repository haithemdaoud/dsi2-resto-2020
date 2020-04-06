@extends('layouts.app')


@section('title', 'Welcome')

@section('content')
<main role="main">

    <section class="jumbotron text-center">
      <div class="container">
        <h1>DSI Restaurant</h1>
            <p class="lead text-muted">Our cooking is better than your mom's one! don't you believe? Just try it!</p>
            <p>
                <a href="#" class="btn btn-outline-primary my-2">Find a table</a>
                <a href="#" class="btn btn-outline-success my-2">You choose, we deliver!</a>
            </p>
      </div>
    </section>
  
    <div class="album py-5 bg-light">
      <div class="container">
  
        <div class="row">
            @foreach($meals as $meal)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                    <img src="{{ $meal->photo }}" class="bd-placeholder-img card-img-top" width="100%" height="225" role="img" aria-label="Placeholder: Thumbnail">
                    <div class="card-body">
                        <h4 class="card-title">{{ $meal->name }}</h4>
                        <p class="card-text">{{ $meal->description }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                        </div>
                        <small class="text-muted">{{ $meal->sell_price }} $</small>
                        </div>
                    </div>
                    </div>
                </div>
            @endforeach
        </div>
      </div>
    </div>
  
  </main>
@endsection
