@extends('layouts.app')
@section('content')
<div>
    <a href="{{ route('orders.create') }}" class="btn btn-primary">Create Order</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
        <tr>
            <th class="py-4">{{ $order->id }}</th>
            <td class="py-4">{{ $order->user->name }}</td>
            <td class="py-4">Rp. {{ number_format($price[$loop->index], 0, '.', ',') }}</td>
            <td class="py-4">
                <div class="d-grid gap-2 d-md-block">
                    <a class="btn btn-primary" href="{{ route('orders.edit', $order->id) }}">Edit</a>
                    <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
