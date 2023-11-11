<?php

namespace App\Livewire;

use Livewire\Component;

class UpdateOrderForms extends Component
{
    public $order = null;
    public $vehicles = null;
    public $selectedVehicle = [];

    public function mount($order, $vehicles)
    {
        $this->order = $order;
        $this->vehicles = $vehicles;
        $order->vehicles->map(function ($vehicle) {
            array_push($this->selectedVehicle, $vehicle->id);
        });
    }

    public function addVehicle($vehicleId)
    {
        array_push($this->selectedVehicle, $vehicleId);
    }

    public function removeVehicle($vehicleId)
    {
        $index = array_search($vehicleId, $this->selectedVehicle);
        unset($this->selectedVehicle[$index]);
    }

    public function updateOrder()
    {
        $this->order->vehicles()->detach();
        foreach ($this->selectedVehicle as $vehicleId) {
            $this->order->vehicles()->attach($vehicleId);
        }
        return redirect()->route('orders.index');
    }

    public function render()
    {
        return view('livewire.update-order-forms');
    }
}
