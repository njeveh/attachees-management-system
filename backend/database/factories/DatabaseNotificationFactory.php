<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Notifications\DatabaseNotification;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Illuminate\Notifications\DatabaseNotification>
 */
class DatabaseNotificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => fake()->uuid(),
            'type' => 'App\Notifications\DepartmentNotification',
            'notifiable_type' => 'App\Models\Department',
            'notifiable_id' => 1,
            'data' => [
                'from' => 'Central services',
                'title' => 'Advert Ammends',
                'body' => 'bla bla bla',
                'attachments_links' => [
                    'https://laravel.com/docs/10.x/eloquent-factories#introduction',
                    'https://laravel.com/docs/10.x/eloquent-factories#creating-models-using-factories',
                ],
            ],
        ];
    }

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DatabaseNotification::class;
}