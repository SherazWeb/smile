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
            'patient_name'      => 'required|string',
            'patient_email'     => 'required|email',
            'patient_phone'     => 'required',
            'age'               => 'required|integer',
            'gender'            => 'required',
            'service_id'        => 'required|exists:services,id',
            'appointment_date'  => 'required|date',
            'appointment_time'  => 'required',
        ]);

        Appointment::create([
            'patient_name'      => $this->patient_name,
            'patient_email'     => $this->patient_email,
            'patient_phone'     => $this->patient_phone,
            'age'               => $this->age,
            'gender'            => $this->gender,
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
