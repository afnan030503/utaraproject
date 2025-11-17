<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Employee;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create Admin User
        User::create([
            'name' => 'Admin',
            'email' => 'admin@utara.coffee',
            'password' => bcrypt('12345678')
        ]);

        // Kopi Susu Category
        $kopiSusu = Category::create(['name' => 'Kopi Susu', 'slug' => 'kopi-susu', 'order' => 1]);
        
        Menu::create(['category_id' => $kopiSusu->id, 'name' => 'Kopi Susu Gula Aren', 'price' => 28000]);
        Menu::create(['category_id' => $kopiSusu->id, 'name' => 'Kopi Susu Salted Caramel', 'price' => 32000]);
        Menu::create(['category_id' => $kopiSusu->id, 'name' => 'Kopi Susu Butterscotch', 'price' => 32000]);
        Menu::create(['category_id' => $kopiSusu->id, 'name' => 'Kopi Susu Almond', 'price' => 32000]);
        Menu::create(['category_id' => $kopiSusu->id, 'name' => 'Kopi Susu Caramel', 'price' => 28000]);

        // Espresso Based
        $espresso = Category::create(['name' => 'Espresso Based', 'slug' => 'espresso-based', 'order' => 2]);
        
        Menu::create(['category_id' => $espresso->id, 'name' => 'Cappuccino', 'price' => 25000]);
        Menu::create(['category_id' => $espresso->id, 'name' => 'Latte', 'price' => 25000]);
        Menu::create(['category_id' => $espresso->id, 'name' => 'Dirty Latte', 'price' => 25000]);
        Menu::create(['category_id' => $espresso->id, 'name' => 'Spanish Latte', 'price' => 28000]);

        // Americano Series
        $americano = Category::create(['name' => 'Americano Series', 'slug' => 'americano-series', 'order' => 3]);
        
        Menu::create(['category_id' => $americano->id, 'name' => 'Classic Americano', 'price' => 18000]);
        Menu::create(['category_id' => $americano->id, 'name' => 'Americano Lychee Berry', 'price' => 25000]);
        Menu::create(['category_id' => $americano->id, 'name' => 'Americano Lemonade', 'price' => 25000]);
        Menu::create(['category_id' => $americano->id, 'name' => 'Americano Spice Berry', 'price' => 25000]);

        // Non-Coffee Beverages
        $nonCoffee = Category::create(['name' => 'Non-Coffee Beverages', 'slug' => 'non-coffee', 'order' => 4]);
        
        Menu::create(['category_id' => $nonCoffee->id, 'name' => 'Choco Berry Freeze', 'price' => 26000]);
        Menu::create(['category_id' => $nonCoffee->id, 'name' => 'Berry Matcha', 'price' => 17000]);
        Menu::create(['category_id' => $nonCoffee->id, 'name' => 'Choco Latte', 'price' => 24000]);
        Menu::create(['category_id' => $nonCoffee->id, 'name' => 'Choco Almond', 'price' => 24000]);
        Menu::create(['category_id' => $nonCoffee->id, 'name' => 'Matcha Latte', 'price' => 20000]);
        Menu::create(['category_id' => $nonCoffee->id, 'name' => 'Dirty Matcha', 'price' => 21000]);

        // Tea & Refreshments
        $tea = Category::create(['name' => 'Tea & Refreshments', 'slug' => 'tea-refreshments', 'order' => 5]);
        
        Menu::create(['category_id' => $tea->id, 'name' => 'Lemon Tea', 'price' => 17000]);
        Menu::create(['category_id' => $tea->id, 'name' => 'Lychee Tea', 'price' => 17000]);
        Menu::create(['category_id' => $tea->id, 'name' => 'Pina Coco', 'price' => 24000]);
        Menu::create(['category_id' => $tea->id, 'name' => 'Red Ocean', 'price' => 24000]);
        Menu::create(['category_id' => $tea->id, 'name' => 'Virgin Mojito', 'price' => 24000]);
        Menu::create(['category_id' => $tea->id, 'name' => 'Strawberry Lemonade', 'price' => 20000]);

        // Manual Brew
        $manual = Category::create(['name' => 'Manual Brew', 'slug' => 'manual-brew', 'order' => 6]);
        
        Menu::create(['category_id' => $manual->id, 'name' => 'V60 Pour Over', 'price' => 25000]);
        Menu::create(['category_id' => $manual->id, 'name' => 'Tubruk', 'price' => 18000]);

        // Signature Dishes
        $signature = Category::create(['name' => 'Signature Dishes', 'slug' => 'signature-dishes', 'order' => 7]);
        
        Menu::create(['category_id' => $signature->id, 'name' => 'Ocean Burger', 'price' => 28000, 'description' => 'Crispy fish fillet with sauce and fresh veggies on a soft bun']);
        Menu::create(['category_id' => $signature->id, 'name' => 'Firebird Burger', 'price' => 24000, 'description' => 'Fried chicken, coleslaw, and smoked mayo in a bold, fiery burger']);
        Menu::create(['category_id' => $signature->id, 'name' => 'Northern Burger', 'price' => 32000, 'description' => 'Grilled beef patty, fresh coleslaw, and smoked mayo in a bold, fiery burger']);

        // Super Big
        $superBig = Category::create(['name' => 'Super Big', 'slug' => 'super-big', 'order' => 8]);
        
        Menu::create(['category_id' => $superBig->id, 'name' => 'Ocean Burger Double Party', 'price' => 36000, 'description' => 'Double fish patty, double the flavor—stacked with sauce and greens']);
        Menu::create(['category_id' => $superBig->id, 'name' => 'Northern Burger Double Party', 'price' => 44000]);
        Menu::create(['category_id' => $superBig->id, 'name' => 'Firebird Burger Double Party', 'price' => 30000, 'description' => 'Double fish patty, double the flavor—stacked with sauce and greens']);

        // Snacks & Sides
        $snacks = Category::create(['name' => 'Snacks & Sides', 'slug' => 'snacks-sides', 'order' => 9]);
        
        Menu::create(['category_id' => $snacks->id, 'name' => 'Wedge Wonders', 'price' => 18000]);
        Menu::create(['category_id' => $snacks->id, 'name' => 'Crispy-on-the-outside, soft-on-the-inside potato wedges', 'price' => 19000]);
        Menu::create(['category_id' => $snacks->id, 'name' => 'Crunchy Rings', 'price' => 18000, 'description' => 'Golden fried onion rings with a light, savory crunch']);
        Menu::create(['category_id' => $snacks->id, 'name' => 'Golden Corn', 'price' => 16000, 'description' => 'Grilled corn ribs with sweet, salty, and smoky seasoning']);
        Menu::create(['category_id' => $snacks->id, 'name' => 'Nuggy Bites', 'price' => 19000, 'description' => 'Crispy chicken nuggets with salty, and smoky seasoning']);
        Menu::create(['category_id' => $snacks->id, 'name' => 'Nori Strips', 'price' => 15000, 'description' => 'Golden-fried enoki mushrooms with a light, sweet-smoky twist']);

        // Employees
        Employee::create(['name' => 'Pak Tua', 'position' => 'Senior Barista', 'photo' => '/employees/pak-tua.jpg', 'hashtag' => '#Skripshit', 'order' => 1]);
        Employee::create(['name' => 'Cinta & Kandas', 'position' => 'Barista Team', 'photo' => '/employees/cinta-kandas.jpg', 'hashtag' => '#CintaKandas', 'order' => 2]);
        Employee::create(['name' => 'Sambat Duo', 'position' => 'Service Team', 'photo' => '/employees/sambat.jpg', 'hashtag' => '#Sambat', 'order' => 3]);
        Employee::create(['name' => 'Ganteng Squad', 'position' => 'Kitchen Team', 'photo' => '/employees/ganteng.jpg', 'hashtag' => '#ganteng-gantengGay', 'order' => 4]);
    }
}