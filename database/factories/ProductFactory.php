<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Statusproduct;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->sentence(3);
        $slug = Str::slug($name);
        $subCategory = Subcategory::all()->random();
        $cost = $this->faker->randomElement([123.64, 123.00, 230.00, 88.90, 590.99, 854.99, 2030.99, 1290.75]);
        $percent_profit = $this->faker->randomElement([20, 25, 15]);
        //Busco si ya existe un SKU para esa sub categoría, para incrementar el ID. Si no existe lo inicializo en 0001

        $idSKU = $this->faker->numberBetween($min = 1, $max = 9999);
        $idSKU = sprintf('%04s', $idSKU);
        return [
            'name' => $name,
            'slug' => $slug,
            'description' => $this->faker->text(),
            'cost' => $cost,
            'percent_profit' => $percent_profit,
            'price' => $cost * $percent_profit / 100 + $cost,
            'quantity' => $this->faker->randomElement([10, 30, 8, 22, 124, 250, 12, 45, 90, 64]),
            'subcategory_id' => $subCategory,
            'SKU' => strtoupper(substr($subCategory->category->slug, 0, 2) . substr($subCategory->slug, 0, 2)) . $idSKU,
            'statusproduct_id' => Statusproduct::all()->random()
        ];
    }
}
