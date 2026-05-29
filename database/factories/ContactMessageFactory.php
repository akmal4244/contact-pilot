<?php

namespace Database\Factories;

use App\Models\ContactMessage;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactMessageFactory extends Factory
{
    protected $model = ContactMessage::class;

    public function definition(): array
    {
        return [
            'name'       => fake()->name(),
            'email'      => fake()->safeEmail(),
            'phone'      => fake()->optional(0.6)->regexify('01[0-9]-[0-9]{7,8}'),
            'subject'    => fake()->sentence(4),
            'message'    => fake()->paragraph(3),
            'ip_address' => fake()->ipv4(),
            'is_read'    => fake()->boolean(30),
        ];
    }
}
