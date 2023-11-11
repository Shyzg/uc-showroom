@extends('layouts.app')

@section('content')
  <div>
    <div class="mb-14">
      @livewire('order-forms', ['customers' => $customers, 'vehicles' => $vehicles])
    </div>
  </div>
@endsection
