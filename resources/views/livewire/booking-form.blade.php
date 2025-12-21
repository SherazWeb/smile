<!-- Booking Modal -->
<div x-data="{
    currentStep: 1,
    isSuccess: false,

    nextStep() {
        if (!@entangle('patient_name') || 
            !@entangle('patient_email') || 
            !@entangle('patient_phone') || 
            !@entangle('age') || 
            !@entangle('gender')) {
            alert('Please fill in all required fields');
            return;
        }
        this.currentStep = 2;
    },

    prevStep() {
        this.currentStep = 1;
    },
}" x-show="isBookingOpen" x-cloak x-transition
    x-on:appointment-saved.window="isSuccess = true; setTimeout(() => { isSuccess = false; isBookingOpen = false; }, 2000)"
    class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4">

    <div class="bg-white rounded-3xl shadow-2xl max-w-lg w-full max-h-[90vh] overflow-y-auto" @click.stop>
        <div class="p-6 md:p-8">

            <!-- Header -->
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h3 class="text-2xl font-bold text-gray-800">Book Appointment</h3>

                    <div class="flex items-center mt-3 space-x-4">
                        <div class="flex items-center">
                            <div :class="currentStep === 1 ? 'bg-[#37A47D] text-white' : 'bg-gray-200 text-gray-600'"
                                class="w-8 h-8 rounded-full flex items-center justify-center">1</div>
                            <span class="ml-2 text-sm">Personal Info</span>
                        </div>

                        <div class="w-8 h-0.5 bg-gray-300"></div>

                        <div class="flex items-center">
                            <div :class="currentStep === 2 ? 'bg-[#37A47D] text-white' : 'bg-gray-200 text-gray-600'"
                                class="w-8 h-8 rounded-full flex items-center justify-center">2</div>
                            <span class="ml-2 text-sm">Appointment</span>
                        </div>
                    </div>
                </div>

                <button @click="isBookingOpen = false" class="text-gray-400 hover:text-gray-600 cursor-pointer">✕</button>
            </div>

            <!-- FORM -->
            <form wire:submit.prevent="submitForm">

                <!-- STEP 1 -->
                <div x-show="currentStep === 1" x-transition class="space-y-4">
                    <input wire:model="patient_name" type="text" placeholder="Full Name" class="w-full p-4 border rounded-xl">
                    <input wire:model="patient_email" type="email" placeholder="Email Address" class="w-full p-4 border rounded-xl">
                    <input wire:model="patient_phone" type="tel" placeholder="Phone Number" class="w-full p-4 border rounded-xl">

                    <div class="grid grid-cols-2 gap-4">
                        <input wire:model="age" type="number" placeholder="Age" class="w-full p-4 border rounded-xl">
                        <select wire:model="gender" class="w-full p-4 border rounded-xl">
                            <option value="">Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <button type="button" @click="nextStep" class="mt-6 w-full bg-[#37A47D] text-white py-4 rounded-xl cursor-pointer">
                        Continue
                    </button>
                </div>

                <!-- STEP 2 -->
                <div x-show="currentStep === 2" x-transition class="space-y-4">
                    <select wire:model="service_id" class="w-full p-4 border rounded-xl">
                        <option value="">Select Service</option>
                        @foreach ($services as $service)
                            <option value="{{ $service->id }}">{{ $service->name }}</option>
                        @endforeach
                    </select>

                    <div class="grid grid-cols-2 gap-4">
                        <input wire:model="appointment_date" type="date" :min="new Date().toISOString().split('T')[0]" class="w-full p-4 border rounded-xl">

                        <select wire:model="appointment_time" class="w-full p-4 border rounded-xl">
                            <option value="">Time</option>
                            <option value="09:00">9:00 AM</option>
                            <option value="10:00">10:00 AM</option>
                            <option value="11:00">11:00 AM</option>
                        </select>
                    </div>

                    <textarea wire:model="notes" rows="3" class="w-full p-4 border rounded-xl" placeholder="Notes (optional)"></textarea>

                    <div class="mt-6 grid grid-cols-2 gap-4">
                        <button type="button" @click="prevStep" class="border py-4 rounded-xl">Back</button>
                        <button type="submit" class="bg-[#37A47D] text-white py-4 rounded-xl cursor-pointer">Book</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <div x-show="isSuccess" x-transition class="fixed top-6 right-6 bg-[#37A47D] text-white px-6 py-3 rounded-xl shadow-lg z-50">
        ✅ Appointment booked successfully
    </div>
</div>
