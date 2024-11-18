<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Cart;
use App\Models\User;
use App\Models\ItemType;
use App\Models\Item;
use Faker\Factory as FakerFactory;


class DatabaseSeeder extends Seeder
{
    protected $faker;

    public function __construct()
    {
        $this->faker = FakerFactory::create();
    }

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        ItemType::truncate();
        Item::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // User
        $user_janedoe = User::factory(1)->janeDoe()->create(); // Create one user with janeDoe state
        // dd('JANE DOE', $user_janedoe);
        $user = User::factory(9)->create();

        // Item type
        $item_types = ItemType::factory(5)->create();

        // Item
        $items = Item::factory(20)->create();

        // Cart

        $carts = [];
        foreach ($items as $item) {
            $cart = Cart::factory()->make([
                'product_id' => $item->product_id,
                'user_id' => $item->user_id,
        ]);

        // Add the cart to the array
        $carts[] = $cart->toArray();
        }

        // Insert all the carts into the database at once
        Cart::insert($carts);

        // $this->call([
        //     DashboardTableSeeder::class,
        // ]);
    }
}
