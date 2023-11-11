
@extends('layouts.app')

@section('content')
  <div>
    <div class="mb-14">
      @livewire('update-order-forms', ['order' => $order, 'vehicles' => $vehicles])
    </div>
  </div>
@endsection
