<?php

namespace App\Http\Livewire\Customer;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Users\ServiceReservation;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
class ReservationProcess extends Component
{

    use WithPagination;

    public $reservation_date;

    public $data = [
        'reservation_date' => 'required|date'
    ];

    public function render()
    {
        return view('livewire.customer.reservation-process', ['dataSchedule' => ServiceReservation::paginate(5)]);
    }

    public function submitReservation(){

        $now = Carbon::now('UTC');

        $personalReservationCount = DB::table('service_reservations')
                            ->where('reservationDate', $this->reservation_date)
                            ->where('customerId', Auth::user()->id)
                            ->count();

        $allReservationCount = DB::table('service_reservations')
                            ->where('reservationDate', $this->reservation_date)
                            ->count();

        $userReservationData = DB::table('service_reservations')
                            ->where('reservationDate', $this->reservation_date)
                            ->where('customerId', Auth::user()->id)
                            ->first();

        if($now > $this->reservation_date || $this->reservation_date === $now ||  $userReservationData !== null || $personalReservationCount > 0 || $allReservationCount >= 5){
            session()->flash('error', 'Selected date is not available');
        }else{
            $validatedData = $this->validate($this->data);

            $formData = [
                'customerId' => Auth::user()->id,
                'status' => "ongoing",
                'reservationDate' => $this->reservation_date
            ];

            ServiceReservation::create($formData);

            session()->flash('message', 'you have placed reservation successfully');
        }
    }
}

