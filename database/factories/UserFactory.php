<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' =>'password',
            'phone' => $this->faker->phoneNumber,
            'gender' => $this->faker->randomElement(['male', 'female']),
            'api_key' => Str::random(32),
            'image' => $this->faker->imageUrl(),
            'remember_token' => Str::random(10),
            'city_id' => \App\Models\City::factory(),
            'country_id' => \App\Models\Country::factory(),
            'disability_type_id' => \App\Models\DisabilityType::factory(),
            'organization_id' => \App\Models\Organization::factory(),
        ];
    }
}

