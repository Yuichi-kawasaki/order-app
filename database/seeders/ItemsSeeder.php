<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = ["鶏肉","牛肉","豚肉","じゃがいも","人参","キャベツ","白菜","なす","玉ねぎ","塩","サラダ油"];

        foreach ($items as $item) {
            Item::create([
                'name' => $item,
            ]);
        }
    }
}
