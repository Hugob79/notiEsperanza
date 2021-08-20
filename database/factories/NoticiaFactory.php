<?php

namespace Database\Factories;

use App\Models\Noticia;
use Illuminate\Database\Eloquent\Factories\Factory;

class NoticiaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Noticia::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker->sentence,
            'contenido' => $this->faker->text,
            'categoria' => $this->faker->randomElement(['social', 'institucional', 'educacion']),
            'foto' => $this->faker->randomElement(['/imagenes/foto3.jpg', '/imagenes/foto2.jpg', '/imagenes/foto1.jpg']),
            'ubicacion' => $this->faker->randomElement(['centro', 'izquierda', 'derecha'])
        ];
    }
}
