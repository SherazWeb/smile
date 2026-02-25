<?php
// database/seeders/EventSeeder.php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    public function run()
    {
        // Clear existing events
        Event::truncate();

        // Workshop for Government Employees
        Event::create([
            'title' => 'Stress Management for Government Employees',
            'slug' => 'stress-management-government-employees',
            'description' => 'Interactive workshop on work-life balance and stress reduction techniques for civil servants. Participants learned practical mindfulness exercises and time management strategies.',
            'location' => 'Secretariat',
            'event_date' => '2024-03-15',
            'image_path' => 'images/events/government-workshop.jpg',
            'participant_count' => 45,
            'participant_unit' => 'participants',
            'categories' => ['workshops', 'corporate'],
            'tags' => ['Workplace Wellness', 'Stress Management'],
            'badge_text' => 'Workshop',
            'badge_color' => 'teal-600',
            'highlights' => [
                'Interactive stress management techniques',
                'Work-life balance strategies',
                'Mindfulness exercises'
            ],
            'is_featured' => true,
            'display_order' => 1
        ]);

        // Free Health Camp
        Event::create([
            'title' => 'Community Mental Health & Wellness Camp',
            'slug' => 'community-mental-health-wellness-camp',
            'description' => 'Free psychological consultations, physiotherapy screenings, and nutrition counseling for residents. The camp provided comprehensive health checkups and wellness advice.',
            'location' => 'Al Qusais',
            'event_date' => '2024-02-28',
            'image_path' => 'images/events/health-camp.jpg',
            'participant_count' => 120,
            'participant_unit' => 'beneficiaries',
            'categories' => ['camps', 'awareness'],
            'tags' => ['Free Screening', 'Multi-Specialty', 'Family'],
            'badge_text' => 'Free Camp',
            'badge_color' => 'green-600',
            'highlights' => [
                'Free psychological consultations',
                'Physiotherapy screenings',
                'Nutrition counseling'
            ],
            'is_featured' => true,
            'display_order' => 2
        ]);

        // Student Mental Health Awareness
        Event::create([
            'title' => 'Youth Mental Health & Academic Success',
            'slug' => 'youth-mental-health-academic-success',
            'description' => 'Interactive session on exam stress management, bullying awareness, and building resilience. Students engaged in group activities and learned coping strategies.',
            'location' => 'Dubai National School',
            'event_date' => '2024-01-20',
            'image_path' => 'images/events/student-workshop.jpg',
            'participant_count' => 200,
            'participant_unit' => 'students',
            'categories' => ['schools', 'workshops'],
            'tags' => ['Students', 'Anti-Bullying', 'Exam Stress'],
            'badge_text' => 'School Program',
            'badge_color' => 'purple-600',
            'highlights' => [
                'Exam stress management techniques',
                'Bullying awareness and prevention',
                'Resilience building activities'
            ],
            'is_featured' => true,
            'display_order' => 3
        ]);

        // Parenting Workshop
        Event::create([
            'title' => 'Positive Parenting in Digital Age',
            'slug' => 'positive-parenting-digital-age',
            'description' => 'Guidance for parents on managing children\'s screen time, behavior challenges, and emotional development. Experts shared practical strategies for modern parenting.',
            'location' => 'Al Nahda',
            'event_date' => '2023-12-10',
            'image_path' => 'images/events/parenting-workshop.jpg',
            'participant_count' => 65,
            'participant_unit' => 'parents',
            'categories' => ['workshops', 'awareness'],
            'tags' => ['Parenting', 'Child Development', 'Digital Wellness'],
            'badge_text' => 'Workshop',
            'badge_color' => 'teal-600',
            'highlights' => [
                'Screen time management',
                'Positive discipline techniques',
                'Emotional intelligence development'
            ],
            'is_featured' => false,
            'display_order' => 4
        ]);

        // Autism Awareness Campaign
        Event::create([
            'title' => 'World Autism Awareness Day Walk',
            'slug' => 'world-autism-awareness-day-walk',
            'description' => 'Community walk and information session to promote understanding and acceptance of autism spectrum disorder. Families, educators, and supporters came together.',
            'location' => 'City Walk',
            'event_date' => '2024-04-02',
            'image_path' => 'images/events/autism-awareness.jpg',
            'participant_count' => 300,
            'participant_unit' => 'participants',
            'categories' => ['awareness', 'camps'],
            'tags' => ['Autism', 'Community Walk', 'Inclusion'],
            'badge_text' => 'Awareness',
            'badge_color' => 'amber-600',
            'highlights' => [
                'Community awareness walk',
                'Information sessions',
                'Family support resources'
            ],
            'is_featured' => true,
            'display_order' => 5
        ]);

        // Corporate Wellness Program
        Event::create([
            'title' => 'Corporate Wellness & Resilience Program',
            'slug' => 'corporate-wellness-resilience-program',
            'description' => 'Two-day wellness initiative including mental health talks, ergonomic assessments, and stress management workshops for corporate employees.',
            'location' => 'DIFC',
            'event_date' => '2024-03-05',
            'event_end_date' => '2024-03-06',
            'image_path' => 'images/events/corporate-wellness.jpg',
            'participant_count' => 5,
            'participant_unit' => 'companies',
            'categories' => ['corporate', 'workshops'],
            'tags' => ['Corporate', 'Ergonomics', 'Burnout Prevention'],
            'badge_text' => 'Corporate',
            'badge_color' => 'blue-600',
            'highlights' => [
                'Mental health awareness talks',
                'Ergonomic assessments',
                'Stress management workshops'
            ],
            'is_featured' => true,
            'display_order' => 6
        ]);

        // Additional Events using Factory (optional)
        // Event::factory()->count(10)->create();
    }
}