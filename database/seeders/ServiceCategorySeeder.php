<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('service_categories')->insert([
            ["category_title" => "AC", "slug" => "ac", "category_image" => "1521969345.png"],
            ["category_title" => "Beauty", "slug" => "beauty", "category_image" => "1521969358.png"],
            ["category_title" => "Plumbing", "slug" => "plumbing", "category_image" => "1521969490.png"],
            ["category_title" => "Electrical", "slug" => "electrical", "category_image" => "1521969419.png"],
            ["category_title" => "Shower Filter", "slug" => "shower-filter", "category_image" => "1521969430.png"],
            ["category_title" => "Home Cleaning", "slug" => "home-cleaning", "category_image" => "1521969446.png"],
            ["category_title" => "Carpentry", "slug" => "carpentry", "category_image" => "1521969454.png"],
            ["category_title" => "Pest Control", "slug" => "pest-control", "category_image" => "1521969464.png"],
            ["category_title" => "Chimney Hob", "slug" => "chimney-hob", "category_image" => "1521969490.png"],
            ["category_title" => "Water Purification", "slug" => "water-purification", "category_image" => "1521972593.png"],
            ["category_title" => "Computer Repairs", "slug" => "computer-repairs", "category_image" => "1521969512.png"],
            ["category_title" => "TV", "slug" => "tv", "category_image" => "1521969522.png"],
            ["category_title" => "Refrigerator", "slug" => "refrigerator", "category_image" => "1521969536.png"],
            ["category_title" => "Geyser", "slug" => "geyser", "category_image" => "1521969558.png"],
            ["category_title" => "Car", "slug" => "car", "category_image" => "1521969599.png"],
            ["category_title" => "Document", "slug" => "document", "category_image" => "1521974355.png"],
            ["category_title" => "Movers & Packers", "slug" => "movers-and-packers", "category_image" => "1521972624.png"],
            ["category_title" => "Home Automation", "slug" => "home-automation", "category_image" => "1521969622.png"],
            ["category_title" => "Laundry", "slug" => "laundry", "category_image" => "1521972663.png"],
            ["category_title" => "Painting", "slug" => "painting", "category_image" => "1521972643.png"],
        ]);
    }
}
