<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Project;

class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition(): array
    {
        return [
            'nome' => $this->faker->sentence(3),
            'descricao' => $this->faker->paragraph(),
            'data_inicio' => $this->faker->date(),
            'status' => $this->faker->randomElement(['Pendente', 'Em Andamento', 'Concluído']),
            'user_id' => $this->faker->randomElement(['1', '2' ,'5', '6', '7']),
        ];
    }
}
