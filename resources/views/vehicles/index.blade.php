@extends('layouts.app')
@section('content')
<div>
    <a href="{{ route('vehicles.create') }}" class="btn btn-primary">Add Vehicle</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Model</th>
            <th scope="col">Year</th>
            <th scope="col">Capacity</th>
            <th scope="col">Manufacture</th>
            <th scope="col">Price</th>
            <th scope="col">Type</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($vehicles as $vehicle)
        <tr>
            <th class="py-4">{{ $vehicle->id }}</th>
            <td class="py-4">{{ $vehicle->model }}</td>
            <td class="py-4">{{ $vehicle->year }}</td>
            <td class="py-4">{{ $vehicle->capacity }}</td>
            <td class="py-4">{{ $vehicle->manufacture }}</td>
            <td class="py-4">Rp. {{ number_format($vehicle->price, 0, '.', ',') }}</td>
            <td class="py-4">{{ $vehicle->type }}</td>
            <td class="py-4">
                <div class="d-grid gap-2 d-md-block">
                    <a class="btn btn-primary" href="{{ route('vehicles.edit', $vehicle->id) }}">Edit</a>
                    <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST">
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
