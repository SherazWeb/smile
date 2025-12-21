<script>
    document.addEventListener('alpine:init', () => {
        Alpine.store('serviceIcons', {
            psychological: `
                <svg xmlns="http://www.w3.org/2000/svg" 
     viewBox="0 0 640 640" 
     width="28" 
     height="28" 
     fill="#37A47D">
  <path d="M320 576C461.4 576 576 461.4 576 320C576 178.6 461.4 64 320 64C178.6 64 64 178.6 64 320C64 461.4 178.6 576 320 576zM229.4 385.9C249.8 413.9 282.8 432 320 432C357.2 432 390.2 413.9 410.6 385.9C418.4 375.2 433.4 372.8 444.1 380.6C454.8 388.4 457.2 403.4 449.4 414.1C420.3 454 373.2 480 320 480C266.8 480 219.7 454 190.6 414.1C182.8 403.4 185.2 388.4 195.9 380.6C206.6 372.8 221.6 375.2 229.4 385.9zM208 272C208 254.3 222.3 240 240 240C257.7 240 272 254.3 272 272C272 289.7 257.7 304 240 304C222.3 304 208 289.7 208 272zM400 240C417.7 240 432 254.3 432 272C432 289.7 417.7 304 400 304C382.3 304 368 289.7 368 272C368 254.3 382.3 240 400 240z"/>
</svg>

            `,
            physiocare: `
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"
                width="28"
                height="28"
                fill="#37A47D"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M320 144C350.9 144 376 118.9 376 88C376 57.1 350.9 32 320 32C289.1 32 264 57.1 264 88C264 118.9 289.1 144 320 144zM233.4 291.9L256 269.3L256 338.6C256 366.6 268.2 393.3 289.5 411.5L360.9 472.7C366.8 477.8 370.7 484.8 371.8 492.5L384.4 580.6C386.9 598.1 403.1 610.3 420.6 607.8C438.1 605.3 450.3 589.1 447.8 571.6L435.2 483.5C431.9 460.4 420.3 439.4 402.6 424.2L368.1 394.6L368.1 279.4L371.9 284.1C390.1 306.9 417.7 320.1 446.9 320.1L480.1 320.1C497.8 320.1 512.1 305.8 512.1 288.1C512.1 270.4 497.8 256.1 480.1 256.1L446.9 256.1C437.2 256.1 428 251.7 421.9 244.1L404 221.7C381 192.9 346.1 176.1 309.2 176.1C277 176.1 246.1 188.9 223.4 211.7L188.1 246.6C170.1 264.6 160 289 160 314.5L160 352C160 369.7 174.3 384 192 384C209.7 384 224 369.7 224 352L224 314.5C224 306 227.4 297.9 233.4 291.9zM245.8 471.3C244.3 476.5 241.5 481.3 237.7 485.1L169.4 553.4C156.9 565.9 156.9 586.2 169.4 598.7C181.9 611.2 202.2 611.2 214.7 598.7L283 530.4C294.5 518.9 302.9 504.6 307.4 488.9L309.6 481.3L263.6 441.9C261.1 439.7 258.6 437.5 256.2 435.1L245.8 471.3z"/></svg>
            `,
            nutrition: `
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"
                width="28"
                height="28"
                fill="#37A47D"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M127.9 78.4C127.1 70.2 120.2 64 112 64C103.8 64 96.9 70.2 96 78.3L81.9 213.7C80.6 219.7 80 225.8 80 231.9C80 277.8 115.1 315.5 160 319.6L160 544C160 561.7 174.3 576 192 576C209.7 576 224 561.7 224 544L224 319.6C268.9 315.5 304 277.8 304 231.9C304 225.8 303.4 219.7 302.1 213.7L287.9 78.3C287.1 70.2 280.2 64 272 64C263.8 64 256.9 70.2 256.1 78.4L242.5 213.9C241.9 219.6 237.1 224 231.4 224C225.6 224 220.8 219.6 220.2 213.8L207.9 78.6C207.2 70.3 200.3 64 192 64C183.7 64 176.8 70.3 176.1 78.6L163.8 213.8C163.3 219.6 158.4 224 152.6 224C146.8 224 142 219.6 141.5 213.9L127.9 78.4zM512 64C496 64 384 96 384 240L384 352C384 387.3 412.7 416 448 416L480 416L480 544C480 561.7 494.3 576 512 576C529.7 576 544 561.7 544 544L544 96C544 78.3 529.7 64 512 64z"/></svg>
            `,
            autism: `
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="#37A47D" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 12l4.5-4.5L12 12l4.5-4.5L21 12M6 18h12" />
                </svg>
            `,
            children: `
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"
                width="28"
                height="28"
                fill="#37A47D"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M320 32C342.1 32 360 49.9 360 72C360 94.1 342.1 112 320 112C297.9 112 280 94.1 280 72C280 49.9 297.9 32 320 32zM40 128C62.1 128 80 145.9 80 168L80 328.2C80 345.2 86.7 361.5 98.7 373.5L149.8 424.6C158.1 432.9 171.1 434.2 180.8 427.7C193.7 419.1 195.5 400.8 184.5 389.9C177.2 382.6 161.4 366.8 137.3 342.7C124.8 330.2 124.8 309.9 137.3 297.4C149.8 284.9 170.1 284.9 182.6 297.4C206.7 321.5 222.5 337.3 229.8 344.6L229.8 344.6L255.1 369.9C276.1 390.9 287.9 419.4 287.9 449.1L287.9 528C287.9 554.5 266.4 576 239.9 576L173.2 576C156.2 576 139.9 569.3 127.9 557.3L28.1 457.4C10.1 439.4 0 415 0 389.5L0 168C0 145.9 17.9 128 40 128zM600 128C622.1 128 640 145.9 640 168L640 389.5C640 415 629.9 439.4 611.9 457.4L512 557.3C500 569.3 483.7 576 466.7 576L400 576C373.5 576 352 554.5 352 528L352 449.1C352 419.4 363.8 390.9 384.8 369.9L410.1 344.6L410.1 344.6C417.4 337.3 433.2 321.5 457.3 297.4C469.8 284.9 490.1 284.9 502.6 297.4C515.1 309.9 515.1 330.2 502.6 342.7C478.5 366.8 462.7 382.6 455.4 389.9C444.4 400.9 446.2 419.1 459.1 427.7C468.8 434.2 481.8 432.9 490.1 424.6L541.2 373.5C553.2 361.5 559.9 345.2 559.9 328.2L560 168C560 145.9 577.9 128 600 128zM384.5 213L364.7 196.3L375.8 285.1C377.4 298.3 368.1 310.2 355 311.9C341.9 313.6 329.9 304.2 328.2 291.1L323.8 256.1L316.2 256.1L311.8 291.1C310.2 304.3 298.2 313.6 285 311.9C271.8 310.2 262.5 298.3 264.2 285.1L275.3 196.3L255.5 213C245.4 221.6 230.2 220.3 221.7 210.2C213.2 200.1 214.4 184.9 224.5 176.4L252.4 152.8C271.3 136.8 295.3 128 320 128C344.7 128 368.7 136.8 387.6 152.7L415.5 176.3C425.6 184.9 426.9 200 418.3 210.1C409.7 220.2 394.6 221.5 384.5 212.9z"/></svg>
            `,
            academics: `
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"
                width="28"
                height="28"
                fill="#37A47D"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M80 259.8L289.2 345.9C299 349.9 309.4 352 320 352C330.6 352 341 349.9 350.8 345.9L593.2 246.1C602.2 242.4 608 233.7 608 224C608 214.3 602.2 205.6 593.2 201.9L350.8 102.1C341 98.1 330.6 96 320 96C309.4 96 299 98.1 289.2 102.1L46.8 201.9C37.8 205.6 32 214.3 32 224L32 520C32 533.3 42.7 544 56 544C69.3 544 80 533.3 80 520L80 259.8zM128 331.5L128 448C128 501 214 544 320 544C426 544 512 501 512 448L512 331.4L369.1 390.3C353.5 396.7 336.9 400 320 400C303.1 400 286.5 396.7 270.9 390.3L128 331.4z"/></svg>
            `
        });
    });
</script>

<div x-data="{
    activeService: 1,
    activeTestimonial: 0,
    services: [{
            id: 1,
            name: 'Psychological',
            iconKey: 'psychological',
            color: 'blue',
            image: '{{ asset('images/therapy.png') }}',
            title: 'Psychological Health Services',
            description: 'Our licensed psychologists provide evidence-based therapy for anxiety, depression, trauma, and relationship issues. We create safe spaces for healing and personal growth.',
            features: ['Individual Therapy', 'Couples Counseling', 'Stress Management', 'Trauma Therapy']
        },
        {
            id: 2,
            name: 'Physiocare',
            iconKey: 'physiocare',
            color: 'green',
            image: '{{ asset('images/physio.png') }}',
            title: 'Physiotherapy & Rehabilitation',
            description: 'Advanced physical therapy treatments for injury recovery, chronic pain management, and mobility improvement using cutting-edge techniques and equipment.',
            features: ['Sports Injury', 'Post-Surgical Rehab', 'Pain Management', 'Mobility Training']
        },
        {
            id: 3,
            name: 'Nutrition',
            iconKey: 'nutrition',
            color: 'yellow',
            image: '{{ asset('images/diet.png') }}',
            title: 'Nutrition & Dietitian Services',
            description: 'Personalized dietary plans and nutritional guidance tailored to your health goals, medical conditions, and lifestyle needs.',
            features: ['Weight Management', 'Medical Nutrition', 'Sports Nutrition', 'Pediatric Nutrition']
        },
        {
            id: 4,
            name: 'Autism & Speech',
            iconKey: 'autism',
            color: 'purple',
            image: '{{ asset('images/therapy.png') }}',
            title: 'Autism & Speech Therapy',
            description: 'Specialized care and therapy programs for children with autism spectrum disorder and speech development challenges.',
            features: ['ABA Therapy', 'Speech Therapy', 'Social Skills', 'Parent Training']
        },
        {
            id: 5,
            name: 'Specialized Children Care',
            iconKey: 'children',
            color: 'purple',
            image: '{{ asset('images/child.png') }}',
            title: 'Specialized Children',
            description: 'Specialized child and therapy programs for children with autism spectrum disorder and speech development challenges.',
            features: ['ABA Therapy', 'Speech Therapy', 'Daily Life Skills Training', 'Academic Schooling', 'Nutrition & Diet Plan', 'Occupational Therapy']
        },
        {
            id: 6,
            name: 'Academic Services',
            iconKey: 'academics',
            color: 'sky',
            image: '{{ asset('images/edu.png') }}',
            title: 'Academic Support & Learning Programs',
            description: 'Comprehensive academic support programs for students to enhance learning, boost performance, and overcome educational challenges with personalized guidance.',
            features: ['Special Education Support', 'Tutoring & Homework Help', 'Learning Assessments', 'Skill Development Workshops', 'Study Counseling']
        }
    ],

    scrollToSection(section) {
        document.getElementById(section)?.scrollIntoView({ behavior: 'smooth' });
        this.isMenuOpen = false;
    },
    init() {
        setInterval(() => {
            this.activeTestimonial = (this.activeTestimonial + 1) % 3;
        }, 5000);
    }
}">

    <!-- Enhanced Hero Section -->
    <x-hero-section />

    <!-- Interactive Services Section -->
    <x-services />

    <!-- Value Proposition Section -->
    <x-values />

    <!-- Team Preview Section -->
    <x-doctor-profile />

    <!-- Testimonials Section -->
    <x-testimonials />

    <!-- Stats Section -->
    <x-stats />

</div>
