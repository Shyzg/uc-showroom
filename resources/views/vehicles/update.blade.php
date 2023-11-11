@extends('layouts.app')
@section('content')
<form class="form-floating" action="{{ route('vehicles.update', $vehicle->id) }}" method="POST">
    @method('PUT')
    @csrf
    <div class="form-outline mb-4">
        <label for="model">Model</label>
        <input type="text" name="model" id="model" class="form-control" autocomplete="off" value="{{ old('model', $vehicle->model) }}" required/>
    </div>

    <div class="form-outline mb-4">
        <label for="year">Year</label>
        <input type="number" name="year" id="year" pattern="\d*" minlength="4" maxlength="4" class="form-control" autocomplete="off" value="{{ old('year', $vehicle->year) }}" required/>
    </div>

    <div class="form-outline mb-4">
        <label for="capacity">Capacity</label>
        <input type="number" name="capacity" id="capacity" pattern="\d*" minlength="2" maxlength="2" class="form-control" autocomplete="off" value="{{ old('capacity', $vehicle->capacity) }}"required/>
    </div>

    <div class="form-outline mb-4">
        <label for="manufacture">Manufacture</label>
        <input type="text" name="manufacture" id="manufacture" class="form-control" autocomplete="off" value="{{ old('manufacture', $vehicle->manufacture) }}" required/>
    </div>

    <div class="form-outline mb-4">
        <label for="price">Price</label>
        <input type="number" name="price" id="price" maxlength="12" class="form-control" autocomplete="off" value="{{ old('price', $vehicle->price) }}" required/>
    </div>

    <livewire:vehicle-type-radio :vehicle="$vehicle" />

  <!-- Submit button -->
  <a href="{{ route('vehicles.index') }}" class="btn btn-secondary btn-block mb-4">Cancel</a>
  <button type="submit" class="btn btn-primary btn-block mb-4">Submit</button>
</form>

@endsection
