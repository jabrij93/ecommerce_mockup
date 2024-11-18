<?php

    namespace Database\Factories;

    use App\Models\Item;
    use Illuminate\Database\Eloquent\Factories\Factory;

    /**
     * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
     */
    class ItemFactory extends Factory
    {
        protected $model = Item::class;
        
        /**
         * Define the model's default state.
         *
         * @return array<string, mixed>
         */
        public function definition()
        {
            $images = null;

            // Simulate image upload process
            $imageExtensions = ['jpg', 'jpeg', 'png'];
            $randomExtension = $this->faker->randomElement($imageExtensions);
            $imageName = date('YmdHis') . '.' . $randomExtension;
            $images = $imageName;

            // Generate random 8 characters product_id
            $alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $alphaPart = substr(str_shuffle($alphabet), 0, 3);
            $numericPart = str_pad(mt_rand(0, 99999), 5, '0', STR_PAD_LEFT);
            $productId = $alphaPart . $numericPart;

            return [
                'name' => $this->faker->word(1),
                'type_id' => $this->faker->randomElement(['1', '2', '3', '4', '5']),
                'user_id' => $this->faker->randomElement(['1', '2', '3','4','5','6','7','8','9']),
                'price' => $this->faker->randomFloat(2, 10, 999), 
                'images' => $images,
                'product_id' => $productId,
            ];
        }
    }
