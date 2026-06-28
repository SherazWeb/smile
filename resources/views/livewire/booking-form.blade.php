<!-- Booking Modal -->
<div
    x-data="{
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

        closeModal() {
            isBookingOpen = false;
            this.currentStep = 1;
            this.isSuccess = false;
        }
    }"

    x-show="isBookingOpen"
    x-cloak
    x-transition.opacity

    x-on:appointment-saved.window="
        isSuccess = true;
        currentStep = 1;

        setTimeout(() => {
            isSuccess = false;
            isBookingOpen = false;
        }, 2000)
    "

    class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[9999] flex items-center justify-center px-3 py-4 sm:p-4"
>

    <!-- Modal Box -->
    <div
        @click.stop
        x-show="isBookingOpen"
        x-transition.scale.origin.center
        class="bg-white rounded-2xl sm:rounded-3xl shadow-2xl w-full max-w-[95vw] sm:max-w-2xl max-h-[88vh] sm:max-h-[90vh] overflow-hidden flex flex-col"
    >

        <!-- Header -->
        <div class="bg-gradient-to-r from-[#37A47D] to-[#2d8a68] px-4 py-4 sm:px-6 sm:py-6 md:px-8 text-white relative shrink-0">

            <button
                type="button"
                @click="closeModal()"
                class="absolute top-3 right-3 sm:top-5 sm:right-5 w-8 h-8 sm:w-9 sm:h-9 rounded-full bg-white/15 hover:bg-white/25 flex items-center justify-center transition cursor-pointer text-sm sm:text-base"
            >
                ✕
            </button>

            <h3 class="text-lg sm:text-2xl font-bold pr-10">
                Book Appointment
            </h3>

            <p class="text-xs sm:text-sm text-white/80 mt-1 pr-8">
                Complete the form below to request your appointment.
            </p>

            <!-- Progress Steps -->
            <div class="flex items-center gap-2 sm:gap-4 mt-4 sm:mt-6">

                <!-- Step 1 -->
                <div class="flex items-center gap-1.5 sm:gap-2">
                    <div
                        :class="currentStep === 1
                            ? 'bg-white text-[#37A47D]'
                            : 'bg-white/25 text-white'"
                        class="w-7 h-7 sm:w-9 sm:h-9 rounded-full flex items-center justify-center font-bold text-xs sm:text-sm transition"
                    >
                        1
                    </div>

                    <span class="text-[11px] sm:text-sm font-medium whitespace-nowrap">
                        Personal
                    </span>
                </div>

                <!-- Line -->
                <div class="flex-1 h-1 bg-white/25 rounded-full overflow-hidden min-w-[35px]">
                    <div
                        class="h-full bg-white rounded-full transition-all duration-500"
                        :class="currentStep === 2 ? 'w-full' : 'w-0'"
                    ></div>
                </div>

                <!-- Step 2 -->
                <div class="flex items-center gap-1.5 sm:gap-2">
                    <div
                        :class="currentStep === 2
                            ? 'bg-white text-[#37A47D]'
                            : 'bg-white/25 text-white'"
                        class="w-7 h-7 sm:w-9 sm:h-9 rounded-full flex items-center justify-center font-bold text-xs sm:text-sm transition"
                    >
                        2
                    </div>

                    <span class="text-[11px] sm:text-sm font-medium whitespace-nowrap">
                        Appointment
                    </span>
                </div>
            </div>
        </div>

        <!-- FORM -->
        <form
            wire:submit.prevent="submitForm"
            class="px-4 py-4 sm:p-6 md:p-8 overflow-y-auto flex-1"
        >

            <!-- STEP 1 -->
            <div x-show="currentStep === 1" x-transition class="space-y-3.5 sm:space-y-5">

                <!-- Name -->
                <div>
                    <label class="block text-xs sm:text-sm font-semibold text-gray-700 mb-1.5 sm:mb-2">
                        Full Name
                    </label>
                    <input
                        wire:model="patient_name"
                        type="text"
                        placeholder="Enter your full name"
                        class="w-full h-11 sm:h-auto px-3.5 py-2.5 sm:p-4 text-sm sm:text-base border border-gray-200 bg-gray-50 rounded-xl sm:rounded-2xl outline-none focus:bg-white focus:border-[#37A47D] focus:ring-4 focus:ring-[#37A47D]/10 transition"
                    >
                    @error('patient_name')
                        <p class="text-red-500 text-xs sm:text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-xs sm:text-sm font-semibold text-gray-700 mb-1.5 sm:mb-2">
                        Email Address
                    </label>
                    <input
                        wire:model="patient_email"
                        type="email"
                        placeholder="example@email.com"
                        class="w-full h-11 sm:h-auto px-3.5 py-2.5 sm:p-4 text-sm sm:text-base border border-gray-200 bg-gray-50 rounded-xl sm:rounded-2xl outline-none focus:bg-white focus:border-[#37A47D] focus:ring-4 focus:ring-[#37A47D]/10 transition"
                    >
                    @error('patient_email')
                        <p class="text-red-500 text-xs sm:text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Phone -->
                <div>
                    <label class="block text-xs sm:text-sm font-semibold text-gray-700 mb-1.5 sm:mb-2">
                        Phone Number
                    </label>
                    <input
                        wire:model="patient_phone"
                        type="tel"
                        placeholder="03XX XXXXXXX"
                        class="w-full h-11 sm:h-auto px-3.5 py-2.5 sm:p-4 text-sm sm:text-base border border-gray-200 bg-gray-50 rounded-xl sm:rounded-2xl outline-none focus:bg-white focus:border-[#37A47D] focus:ring-4 focus:ring-[#37A47D]/10 transition"
                    >
                    @error('patient_phone')
                        <p class="text-red-500 text-xs sm:text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5 sm:gap-4">

                    <!-- Age -->
                    <div>
                        <label class="block text-xs sm:text-sm font-semibold text-gray-700 mb-1.5 sm:mb-2">
                            Age
                        </label>
                        <input
                            wire:model="age"
                            type="number"
                            min="2"
                            max="120"
                            placeholder="Age"
                            class="w-full h-11 sm:h-auto px-3.5 py-2.5 sm:p-4 text-sm sm:text-base border border-gray-200 bg-gray-50 rounded-xl sm:rounded-2xl outline-none focus:bg-white focus:border-[#37A47D] focus:ring-4 focus:ring-[#37A47D]/10 transition"
                        >
                        @error('age')
                            <p class="text-red-500 text-xs sm:text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Gender -->
                    <div>
                        <label class="block text-xs sm:text-sm font-semibold text-gray-700 mb-1.5 sm:mb-2">
                            Gender
                        </label>
                        <select
                            wire:model="gender"
                            class="w-full h-11 sm:h-auto px-3.5 py-2.5 sm:p-4 text-sm sm:text-base border border-gray-200 bg-gray-50 rounded-xl sm:rounded-2xl outline-none focus:bg-white focus:border-[#37A47D] focus:ring-4 focus:ring-[#37A47D]/10 transition"
                        >
                            <option value="">Select gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                            <option value="prefer_not_to_say">Prefer not to say</option>
                        </select>
                        @error('gender')
                            <p class="text-red-500 text-xs sm:text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <button
                    type="button"
                    @click="nextStep"
                    class="mt-2 w-full bg-[#37A47D] hover:bg-[#2d8a68] text-white py-3 sm:py-4 rounded-xl sm:rounded-2xl cursor-pointer font-semibold text-sm sm:text-base shadow-lg shadow-[#37A47D]/25 transition"
                >
                    Continue →
                </button>
            </div>

            <!-- STEP 2 -->
            <div x-show="currentStep === 2" x-transition class="space-y-3.5 sm:space-y-5">

                <!-- Appointment Type -->
                <div>
                    <label class="block text-xs sm:text-sm font-semibold text-gray-700 mb-2 sm:mb-3">
                        Appointment Type
                    </label>

                    <div class="grid grid-cols-2 gap-2.5 sm:gap-4">
                        <label class="cursor-pointer">
                            <input
                                type="radio"
                                wire:model="appointment_type"
                                value="physical"
                                class="peer hidden"
                            >
                            <div class="border border-gray-200 bg-gray-50 rounded-xl sm:rounded-2xl px-2 py-3 sm:p-4 text-center transition peer-checked:border-[#37A47D] peer-checked:bg-[#37A47D]/10 peer-checked:text-[#37A47D]">
                                <div class="text-lg sm:text-2xl mb-0.5 sm:mb-1">🏥</div>
                                <p class="font-semibold text-xs sm:text-base">Physical</p>
                            </div>
                        </label>

                        <label class="cursor-pointer">
                            <input
                                type="radio"
                                wire:model="appointment_type"
                                value="online"
                                class="peer hidden"
                            >
                            <div class="border border-gray-200 bg-gray-50 rounded-xl sm:rounded-2xl px-2 py-3 sm:p-4 text-center transition peer-checked:border-[#37A47D] peer-checked:bg-[#37A47D]/10 peer-checked:text-[#37A47D]">
                                <div class="text-lg sm:text-2xl mb-0.5 sm:mb-1">💻</div>
                                <p class="font-semibold text-xs sm:text-base">Online</p>
                            </div>
                        </label>
                    </div>

                    @error('appointment_type')
                        <p class="text-red-500 text-xs sm:text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Service -->
                <div>
                    <label class="block text-xs sm:text-sm font-semibold text-gray-700 mb-1.5 sm:mb-2">
                        Select Service
                    </label>
                    <select
                        wire:model="service_id"
                        class="w-full h-11 sm:h-auto px-3.5 py-2.5 sm:p-4 text-sm sm:text-base border border-gray-200 bg-gray-50 rounded-xl sm:rounded-2xl outline-none focus:bg-white focus:border-[#37A47D] focus:ring-4 focus:ring-[#37A47D]/10 transition"
                    >
                        <option value="">Select Service</option>

                        @foreach ($services as $service)
                            <option value="{{ $service->id }}">
                                {{ $service->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('service_id')
                        <p class="text-red-500 text-xs sm:text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5 sm:gap-4">

                    <!-- Date -->
                    <div>
                        <label class="block text-xs sm:text-sm font-semibold text-gray-700 mb-1.5 sm:mb-2">
                            Appointment Date
                        </label>
                        <input
                            wire:model="appointment_date"
                            type="date"
                            :min="new Date().toISOString().split('T')[0]"
                            class="w-full h-11 sm:h-auto px-3.5 py-2.5 sm:p-4 text-sm sm:text-base border border-gray-200 bg-gray-50 rounded-xl sm:rounded-2xl outline-none focus:bg-white focus:border-[#37A47D] focus:ring-4 focus:ring-[#37A47D]/10 transition"
                        >
                        @error('appointment_date')
                            <p class="text-red-500 text-xs sm:text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Time -->
                    <div>
                        <label class="block text-xs sm:text-sm font-semibold text-gray-700 mb-1.5 sm:mb-2">
                            Time
                        </label>
                        <select
                            wire:model="appointment_time"
                            class="w-full h-11 sm:h-auto px-3.5 py-2.5 sm:p-4 text-sm sm:text-base border border-gray-200 bg-gray-50 rounded-xl sm:rounded-2xl outline-none focus:bg-white focus:border-[#37A47D] focus:ring-4 focus:ring-[#37A47D]/10 transition"
                        >
                            <option value="">Select Time</option>
                            <option value="10:00">10:00 AM</option>
                            <option value="11:00">11:00 AM</option>
                            <option value="12:00">12:00 PM</option>
                            <option value="13:00">1:00 PM</option>
                            <option value="14:00">2:00 PM</option>
                            <option value="15:00">3:00 PM</option>
                            <option value="16:00">4:00 PM</option>
                            <option value="17:00">5:00 PM</option>
                            <option value="18:00">6:00 PM</option>
                        </select>
                        @error('appointment_time')
                            <p class="text-red-500 text-xs sm:text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Notes -->
                <div>
                    <label class="block text-xs sm:text-sm font-semibold text-gray-700 mb-1.5 sm:mb-2">
                        Notes <span class="text-gray-400 font-normal">(optional)</span>
                    </label>
                    <textarea
                        wire:model="notes"
                        rows="2"
                        class="w-full min-h-[80px] sm:min-h-[100px] px-3.5 py-2.5 sm:p-4 text-sm sm:text-base border border-gray-200 bg-gray-50 rounded-xl sm:rounded-2xl outline-none resize-none focus:bg-white focus:border-[#37A47D] focus:ring-4 focus:ring-[#37A47D]/10 transition"
                        placeholder="Write anything important..."
                    ></textarea>
                    @error('notes')
                        <p class="text-red-500 text-xs sm:text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-4 sm:mt-6 grid grid-cols-2 gap-2.5 sm:gap-4">
                    <button
                        type="button"
                        @click="prevStep"
                        class="border border-gray-200 py-3 sm:py-4 rounded-xl sm:rounded-2xl font-semibold text-gray-700 hover:bg-gray-50 transition text-sm sm:text-base"
                    >
                        ← Back
                    </button>

                    <button
                        type="submit"
                        wire:loading.attr="disabled"
                        wire:target="submitForm"
                        class="bg-[#37A47D] hover:bg-[#2d8a68] text-white py-3 sm:py-4 rounded-xl sm:rounded-2xl cursor-pointer font-semibold text-sm sm:text-base shadow-lg shadow-[#37A47D]/25 transition disabled:opacity-70 disabled:cursor-not-allowed"
                    >
                        <span wire:loading.remove wire:target="submitForm">
                            Book Now
                        </span>

                        <span wire:loading wire:target="submitForm">
                            Booking...
                        </span>
                    </button>
                </div>
            </div>

        </form>
    </div>

    <!-- Success Message -->
    <div
        x-show="isSuccess"
        x-transition
        class="fixed top-4 left-3 right-3 sm:left-auto sm:right-6 sm:top-6 bg-[#37A47D] text-white px-4 py-3 sm:px-6 sm:py-4 rounded-xl sm:rounded-2xl shadow-2xl z-[10000] flex items-center justify-center sm:justify-start gap-2 sm:gap-3"
    >
        <span class="text-lg sm:text-xl">✅</span>
        <span class="font-semibold text-xs sm:text-base">
            Appointment booked successfully
        </span>
    </div>
</div>