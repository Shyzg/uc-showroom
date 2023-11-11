<div>
  <div class="mt-12">
    <div>
      <p>ID Card : {{ $order->user->id }}</p>
      <p>Name : {{ $order->user->name }}</p>
      <p>Address : {{ $order->user->address }}</p>
      <p>Phone : {{ $order->user->phone }}</p>
    </div>
    <div class="grid grid-cols-4 gap-14">
      <div class="mt-8 col-span-3">
        <table class="table">
          <thead>
            <tr>
                <th>Model</th>
                <th>Year</th>
                <th>Capacity</th>
                <th>Manufacture</th>
                <th>Type</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($vehicles as $vehicle)
              <tr class="border-b-2">
                <td class="py-4">{{ $vehicle->model }}</td>
                <td class="py-4">{{ $vehicle->year }}</td>
                <td class="py-4">{{ $vehicle->capacity }}</td>
                <td class="py-4">{{ $vehicle->manufacture }}</td>
                <td class="py-4">{{ $vehicle->type }}</td>
                <td class="py-4">{{ $vehicle->price }}</td>
                <td class="py-4 text-center">
                  @if (!in_array($vehicle->id, $selectedVehicle))
                    <button class="btn btn-primary"
                      wire:click="addVehicle('{{ $vehicle->id }}')">Select</button>
                  @else
                    <button class="btn btn-danger"
                      wire:click="removeVehicle('{{ $vehicle->id }}')">Remove</button>
                  @endif
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <a href="{{ route('orders.index') }}" class="btn btn-secondary btn-block mb-4">Cancel</a>
  <button type="submit" class="btn btn-primary btn-block mb-4">Update Order</button>
  </div>
</div>
