<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\User;
use App\Enums\Gender;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{

    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $role = Role::inRandomOrder()->first(['id', 'permissions']);

        return [

            'name'          => $this->faker->unique()->name,
            'date_of_birth'           => $this->faker->date(),
            'email'         => $this->faker->unique()->safeEmail,
            'phone'         => $this->faker->unique()->phoneNumber,
            'nid_number'    => $this->faker->unique()->numberBetween(1000000000, 9999999999),
            'address'       => $this->faker->address,

            'password'      => Hash::make('12345678'),
            'gender'        => Gender::MALE,

            'role_id'       => $role->id,
            'permissions'   => $role->permissions ?? [],

            // 'image_id'      => DB::table('uploads')->insertGetId(['original' => 'backend/images/avatar/user-profile.png']),

        ];
    }
}
