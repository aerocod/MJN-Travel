<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Destination>
 */
class DestinationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "category_id" => mt_rand(1,5),
            "title" => $this->faker->sentence(mt_rand(1,2)),
            //ini untuk regenerate slug
            "slug" => $this->faker->slug(),
            //ini untuk regenerate paragraf tapi disini ditambahkan mt_rand yang minimum kata 10 dan maximum kata 25
            "body" => "<p>".implode("<p></p>",$this->faker->paragraphs(mt_rand(10,25)))."</p>",
            //ini untuk meregenerate user id menggunakan mt rand yang minimum 1 dan maximum 3 karena di database kita hanya gunakan 3 user
            //ini untuk meregenerate category id menggunakan mt rand yang minimum 1 dan maximum 2 karena di database kita hanya gunakan 2 category yaotu web design dan personal
            "price" => $this->faker->numberBetween(1,100)
        ];
    }
}
