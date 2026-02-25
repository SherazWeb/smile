<?php
// database/factories/EventFactory.php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    protected $model = Event::class;

    public function definition()
    {
        $categories = [
            'workshops',
            'camps',
            'corporate',
            'schools',
            'awareness'
        ];

        $tags = [
            ['Workplace Wellness', 'Stress Management'],
            ['Free Screening', 'Multi-Specialty', 'Family'],
            ['Students', 'Anti-Bullying', 'Exam Stress'],
            ['Parenting', 'Child Development', 'Digital Wellness'],
            ['Autism', 'Community Walk', 'Inclusion'],
            ['Corporate', 'Ergonomics', 'Burnout Prevention']
        ];

        $locations = [
            'Secretariat', 'Al Qusais', 'Dubai National School',
            'Al Nahda', 'City Walk', 'DIFC', 'Business Bay',
            'Jumeirah', 'Dubai Mall', 'Mirdif'
        ];

        $badges = [
            'Workshop', 'Free Camp', 'School Program',
            'Workshop', 'Awareness', 'Corporate'
        ];

        $badgeColors = [
            'teal-600', 'green-600', 'blue-600',
            'purple-600', 'amber-600', 'red-600'
        ];

        $participantUnits = [
            'participants', 'beneficiaries', 'students',
            'parents', 'participants', 'companies'
        ];

        $selectedCategories = $this->faker->randomElements($categories, $this->faker->numberBetween(1, 3));
        $selectedTags = $this->faker->randomElement($tags);
        $badgeIndex = array_search($selectedCategories[0] ?? 'workshops', $categories) % count($badges);

        return [
            'title' => $this->faker->sentence(4),
            'slug' => $this->faker->slug,
            'description' => $this->faker->paragraphs(3, true),
            'location' => $this->faker->randomElement($locations),
            'event_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'event_end_date' => $this->faker->optional(0.3)->dateTimeBetween('-1 year', 'now'),
            'image_path' => 'images/events/' . $this->faker->randomElement(['workshop', 'camp', 'school', 'parenting', 'autism', 'corporate']) . '.jpg',
            'gallery_folder' => 'events/gallery/' . $this->faker->slug,
            'participant_count' => $this->faker->numberBetween(20, 500),
            'participant_unit' => $this->faker->randomElement($participantUnits),
            'categories' => $selectedCategories,
            'tags' => $selectedTags,
            'badge_text' => $badges[$badgeIndex],
            'badge_color' => $badgeColors[$badgeIndex],
            'highlights' => $this->faker->sentences(3),
            'is_featured' => $this->faker->boolean(30),
            'display_order' => $this->faker->numberBetween(0, 100),
        ];
    }

    // State for specific event types
    public function workshop()
    {
        return $this->state(function (array $attributes) {
            return [
                'categories' => ['workshops'],
                'badge_text' => 'Workshop',
                'badge_color' => 'teal-600',
            ];
        });
    }

    public function freeCamp()
    {
        return $this->state(function (array $attributes) {
            return [
                'categories' => ['camps'],
                'badge_text' => 'Free Camp',
                'badge_color' => 'green-600',
                'participant_unit' => 'beneficiaries',
            ];
        });
    }

    public function corporate()
    {
        return $this->state(function (array $attributes) {
            return [
                'categories' => ['corporate'],
                'badge_text' => 'Corporate',
                'badge_color' => 'blue-600',
                'participant_unit' => 'companies',
            ];
        });
    }

    public function school()
    {
        return $this->state(function (array $attributes) {
            return [
                'categories' => ['schools'],
                'badge_text' => 'School Program',
                'badge_color' => 'purple-600',
                'participant_unit' => 'students',
            ];
        });
    }

    public function awareness()
    {
        return $this->state(function (array $attributes) {
            return [
                'categories' => ['awareness'],
                'badge_text' => 'Awareness',
                'badge_color' => 'amber-600',
                'participant_unit' => 'participants',
            ];
        });
    }

    public function featured()
    {
        return $this->state(function (array $attributes) {
            return [
                'is_featured' => true,
            ];
        });
    }
}