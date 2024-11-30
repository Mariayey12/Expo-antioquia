namespace Database\Factories;
<?php
use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdminFactory extends Factory
{
    protected $model = Admin::class;

    public function definition()
    {
        return [
            'permissions' => $this->faker->word,
            'department' => $this->faker->word,
            'notes' => $this->faker->sentence,
        ];
    }
}
