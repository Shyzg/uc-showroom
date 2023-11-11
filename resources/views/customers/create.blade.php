@extends('layouts.app')
@section('content')
<form class="form-floating" action="{{ route('customers.store') }}" method="POST">
    @csrf
    <div class="form-outline mb-4">
        <label for="id">Identity Number</label>
        <input type="number" name="id" id="id" pattern="\d*" maxlength="16" class="form-control" autocomplete="off" required/>
    </div>

    <div class="form-outline mb-4">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" autocomplete="off" required/>
    </div>

    <div class="form-outline mb-4">
        <label for="address">Address</label>
        <input type="text" name="address" id="address" class="form-control" autocomplete="off" required/>
    </div>

    <div class="form-outline mb-4">
        <label for="phone">Phone</label>
        <input type="number" name="phone" id="phone" pattern="\d*" minlength="9" maxlength="12" class="form-control" autocomplete="off" required/>
    </div>

  <!-- Submit button -->
  <a href="{{ route('customers.index') }}" class="btn btn-secondary btn-block mb-4">Cancel</a>
  <button type="submit" class="btn btn-primary btn-block mb-4">Submit</button>
</form>

@endsection
