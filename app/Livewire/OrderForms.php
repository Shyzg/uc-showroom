<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\User;
use Livewire\Component;

class OrderForms extends Component
{
    public $customers;
    public $vehicles;
    public $selectedCustomer = null;
    public $selectedVehicle = [];
    public $totalPrice = 0;

    public function mount($customers, $vehicles)
    {
        $this->customers = $customers;
        $this->vehicles = $vehicles;
    }

    public function selectCustomer($customerId)
    {
        $this->selectedCustomer = User::find($customerId);
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

    public function clear()
    {
        $this->selectedCustomer = null;
        $this->selectedVehicle = [];
    }

    public function makeOrder()
    {
        $order = new Order();
        $order->user_id = $this->selectedCustomer->id;
        $order->save();

        foreach ($this->selectedVehicle as $vehicleId) {
            $order->vehicles()->attach($vehicleId);
        }

        $this->clear();
        return redirect()->route('orders.index');
    }

    public function render()
    {
        return view('livewire.order-forms');
    }
}
