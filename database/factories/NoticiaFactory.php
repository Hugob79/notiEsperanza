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
        $rutaFoto= '/storage/fotos-noticias/sin-imagen.jpg';
        return [
            'titulo' => $this->faker->sentence,
            'contenido' => $this->faker->text,
            'categoria' => $this->faker->randomElement(['social', 'institucional', 'educacion']),
            // 'foto' => $this->faker->randomElement(['/imagenes/foto3.jpg', '/imagenes/foto2.jpg', '/imagenes/foto1.jpg']),
            'foto' => $this->faker->imageUrl($width = 640, $height = 480),
            'ubicacion' => $this->faker->randomElement(['center', 'right', 'left'])
        ];
    }
}
