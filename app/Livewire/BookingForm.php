<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Appointment;
use App\Models\Service;

class BookingForm extends Component
{
    public $services = [];

    // All form fields as public properties
    public $patient_name = '';
    public $patient_email = '';
    public $patient_phone = '';
    public $age = '';
    public $gender = '';
    public $appointment_type = '';
    public $service_id = '';
    public $appointment_date = '';
    public $appointment_time = '';
    public $notes = '';

    public function mount()
    {
        // Load available services dynamically
        $this->services = Service::all();
    }

    public function submitForm()
    {
        $this->validate([
            'patient_name'      => 'required|string|max:255',
            'patient_email'     => 'required|email|max:255',
            'patient_phone'     => 'required|string|max:20',

            'age'               => 'required|integer|min:2|max:120',
            'gender'            => 'required|in:male,female,other,prefer_not_to_say',

            'appointment_type'  => 'required|in:online,physical',

            'service_id'        => 'required|exists:services,id',
            'appointment_date'  => 'required|date|after_or_equal:today',

            // Only allow time from 10:00 AM to 6:00 PM
            'appointment_time'  => 'required|date_format:H:i|after_or_equal:10:00|before_or_equal:18:00',

            'notes'             => 'nullable|string',
        ]);

        Appointment::create([
            'patient_name'      => $this->patient_name,
            'patient_email'     => $this->patient_email,
            'patient_phone'     => $this->patient_phone,
            'age'               => $this->age,
            'gender'            => $this->gender,

            'appointment_type'  => $this->appointment_type,

            'service_id'        => $this->service_id,
            'appointment_date'  => $this->appointment_date,
            'appointment_time'  => $this->appointment_time,
            'notes'             => $this->notes,
            'status'            => 'pending',
        ]);

        $this->reset([
            'patient_name',
            'patient_email',
            'patient_phone',
            'age',
            'gender',
            'appointment_type',
            'service_id',
            'appointment_date',
            'appointment_time',
            'notes',
        ]);

        $this->dispatch('appointment-saved');
    }

    public function render()
    {
        return view('livewire.booking-form');
    }
}
