@extends('layouts.app')

@section('content')
    <fieldset>
        <legend>Crate a new Meal</legend>
        <form action="{{ route('meals.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" name="name" id="name" class="form-control" placeholder="Meal's name goes here" />
              @error('name')<div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <textarea class="form-control" name="description" id="description" rows="3"></textarea>
              @error('description')<div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                      <label for="photo">Photo</label>
                      <input type="file" name="photo" id="photo" class="form-control" placeholder="Meal's photo goes here">
                      @error('photo')<div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                      <label for="stock_quantity">Quantity in stock</label>
                      <input type="number" name="stock_quantity" id="stock_quantity" class="form-control" placeholder="Quantity in stock goes here">
                      @error('stock_quantity')<div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="buy_price">Buy price</label>
                        <input type="number" name="buy_price" id="buy_price" class="form-control" placeholder="Buy price goes here">
                        @error('buy_price')<div class="text-danger">{{ $message }}</div> @enderror
                      </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="sell_price">Sell price</label>
                        <input type="number" name="sell_price" id="sell_price" class="form-control" placeholder="Sell price goes here">
                        @error('sell_price')<div class="text-danger">{{ $message }}</div> @enderror
                      </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-block btn-outline-primary">Save</button>
                </div>
                <div class="col">
                    <button type="reset" class="btn btn-block btn-outline-secondary">Cancel</button>
                </div>
            </div>
        </form>
    </fieldset>
@endsection