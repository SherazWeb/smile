<section id="services" class="py-20 px-4 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">Our Specialized Services</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Comprehensive healthcare solutions tailored to your unique needs, delivered by expert professionals
                    in state-of-the-art facilities.
                </p>
            </div>

            <!-- Service Navigation -->
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                <template x-for="service in services" :key="service.id">
                    <button @click="activeService = service.id"
                        class="flex items-center space-x-3 cursor-pointer px-6 py-4 rounded-2xl border-2 transition-all duration-300 font-semibold"
                        :class="activeService === service.id ?
                            `border-${service.color}-500 bg-${service.color}-50 text-${service.color}-700 transform -translate-y-1 shadow-lg` :
                            'border-gray-200 text-gray-600 hover:border-gray-300'">
                        <span x-html="$store.serviceIcons[service.iconKey]"></span>
                        <span x-text="service.name"></span>
                    </button>
                </template>
            </div>


            <!-- Service Details -->
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Service Content -->
                <div>
                    <template x-for="service in services" :key="service.id">
                        <div x-show="activeService === service.id" class="space-y-8">
                            <!-- Enhanced header section -->
                            <div class="space-y-4">
                                <div
                                    class="inline-flex items-center px-4 py-2 rounded-full bg-gradient-to-r from-blue-50 to-green-50 border border-blue-100">
                                    <span
                                        class="w-2 h-2 rounded-full bg-gradient-to-r from-blue-500 to-green-500 mr-2"></span>
                                    <span class="text-sm font-medium text-gray-600"
                                        x-text="service.category || 'Service'"></span>
                                </div>
                                <h3 class="text-4xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent"
                                    x-text="service.title"></h3>
                            </div>

                            <p class="text-lg text-gray-600 leading-relaxed border-l-4 border-blue-200 pl-6 py-2 bg-blue-50/50 rounded-r-lg"
                                x-text="service.description"></p>

                            <!-- Enhanced features grid -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <template x-for="(feature, index) in service.features" :key="index">
                                    <div
                                        class="flex items-center space-x-3 p-3 rounded-xl hover:bg-gray-50 transition-all duration-200 group">
                                        <div class="w-10 h-10 rounded-xl flex items-center justify-center shadow-sm group-hover:shadow-md transition-all duration-300"
                                            :class="`bg-${service.color}-500/10 border border-${service.color}-200`">
                                            <span :class="`text-${service.color}-600 font-bold text-lg`">✓</span>
                                        </div>
                                        <span
                                            class="text-gray-700 font-medium group-hover:text-gray-900 transition-colors"
                                            x-text="feature"></span>
                                    </div>
                                </template>
                            </div>

                            <!-- Enhanced CTA button -->
                            <button
                                :class="`group relative bg-gradient-to-r from-${service.color}-500 to-${service.color}-600 text-white px-8 py-4 rounded-xl font-semibold hover:shadow-lg hover:scale-105 transition-all duration-300 overflow-hidden`">
                                <div
                                    class="absolute inset-0 bg-white/20 transform -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-1000">
                                </div>
                                <span class="relative">Learn More About <span x-text="service.name"></span></span>
                            </button>
                        </div>
                    </template>
                </div>

                <!-- Enhanced Service Visualization -->
                <div class="flex justify-center items-center">
                    <div class="relative w-full max-w-lg">
                        <!-- Outer glow container -->
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-blue-400/20 to-green-400/20 rounded-3xl blur-xl -z-10 transform scale-105">
                        </div>

                        <!-- Main card with enhanced styling -->
                        <div
                            class="relative rounded-3xl bg-gradient-to-br from-white to-gray-50/80 border border-gray-200/60 shadow-2xl shadow-blue-500/10 p-6 backdrop-blur-sm">
                            <!-- Image container with gradient overlay -->
                            <div
                                class="relative rounded-2xl overflow-hidden bg-gradient-to-br from-blue-100/40 to-green-100/40">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/5 to-transparent z-10"></div>

                                <template x-for="service in services" :key="service.id">
                                    <div x-show="activeService === service.id" class="w-full h-[480px] relative">
                                        <img :src="service.image" :alt="service.name"
                                            class="w-full h-full object-cover rounded-2xl transform hover:scale-105 transition-transform duration-700">

                                        <!-- Floating service badge -->
                                        <div class="absolute top-4 right-4">
                                            <div class="bg-white/90 backdrop-blur-sm rounded-full px-4 py-2 shadow-lg">
                                                <span class="font-semibold text-gray-800"
                                                    x-text="service.name"></span>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>

                            <!-- Enhanced decorative elements -->
                            <div
                                class="absolute -top-2 -right-2 w-6 h-6 bg-gradient-to-r from-blue-400 to-green-400 rounded-full blur-sm">
                            </div>
                            <div
                                class="absolute -bottom-2 -left-2 w-8 h-8 bg-gradient-to-r from-green-400 to-blue-400 rounded-full blur-sm">
                            </div>

                            <!-- Subtle border glow -->
                            <div class="absolute inset-0 rounded-3xl ring-2 ring-white/60 pointer-events-none"></div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>