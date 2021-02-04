<?php

namespace App\Http\Livewire\Admin\Reservation;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ViewAllReservation extends Component
{
    public $filterBy;

    public function render()
    {
        $data['reservations'] = DB::table('service_reservations')
                    ->join('users', 'users.id', '=', 'service_reservations.customerId')
                    ->select('service_reservations.*', 'users.first_name', 'users.email')
                    ->paginate(10);

        return view('livewire.admin.reservation.view-all-reservation', $data);
    }

    public function filterReservation(){

        $data['reservations'] = DB::table('service_reservations')
                    ->join('users', 'users.id', '=', 'service_reservations.customerId')
                    ->select('service_reservations.*', 'users.first_name', 'users.email')
                    ->paginate(10);


        session()->flash('message', 'Your filter returned ' . count($data['reservations']) . ' item(s)');
        return $data;
    }
}
