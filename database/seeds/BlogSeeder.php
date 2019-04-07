<?php

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class, 7)
           ->create()
           ->each(function ($cat) {
               for ($i=0; $i < 3; $i++) { 
                   $cat->blogs()->save(factory(Blog::class)->make());
               }
            });
    }
}
