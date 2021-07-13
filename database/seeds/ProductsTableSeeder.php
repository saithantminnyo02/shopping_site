<?php

use Illuminate\Database\Seeder;
use App\Product;
use Carbon\Carbon;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(Product::class, 50)->create();

        // $product = Product::create([
        //     'name' => 'Shirt',
        //     'description' => 'Nice Shirt',
        //     'quantity' => 10,
        //     'price' => 10000,
        //     'photo_name' => 'photo1.jpg',
        //     'created_at' => Carbon::now()
        // ]);$product->categories()->sync(1);

        $product = Product::create([
            'name' => 'Annava',
            'description' => 'Butterfly Sleeve Top & Batik',
            'quantity' => 10,
            'price' => 20000,
            'photo_name' => 'Product Photo/clothes/annava/annava1.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(1);

        $product = Product::create([
            'name' => 'Annava',
            'description' => 'Printed Cotton Crop Top & Side Stripe Bell Pants',
            'quantity' => 10,
            'price' => 20000,
            'photo_name' => 'Product Photo/clothes/annava/annava2.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(1);

        $product = Product::create([
            'name' => 'Annava',
            'description' => 'Jet Khote Trench Coat Dress',
            'quantity' => 10,
            'price' => 18000,
            'photo_name' => 'Product Photo/clothes/annava/annava3.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(1);

        $product = Product::create([
            'name' => 'Dress',
            'description' => 'White Crop Top & Summer Dress',
            'quantity' => 5,
            'price' => 12000,
            'photo_name' => 'Product Photo/clothes/dress/dress1.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(1);

        $product = Product::create([
            'name' => 'Dress',
            'description' => 'Summer Dress',
            'quantity' => 7,
            'price' => 11000,
            'photo_name' => 'Product Photo/clothes/dress/dress2.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(1);

        $product = Product::create([
            'name' => 'Dress',
            'description' => 'Traditional Black Dress with Collar',
            'quantity' => 5,
            'price' => 14000,
            'photo_name' => 'Product Photo/clothes/dress/dress3.jpeg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(1);

        $product = Product::create([
            'name' => 'Dress',
            'description' => 'Traditional Black Dress',
            'quantity' => 8,
            'price' => 13000,
            'photo_name' => 'Product Photo/clothes/dress/dress4.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(1);

        $product = Product::create([
            'name' => 'Hoodie',
            'description' => 'Cloudy Woolly Hoodie',
            'quantity' => 10,
            'price' => 15000,
            'photo_name' => 'Product Photo/clothes/hoodie/hoodie1.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(1);

        $product = Product::create([
            'name' => 'Hoodie',
            'description' => 'Blue Hai',
            'quantity' => 10,
            'price' => 13000,
            'photo_name' => 'Product Photo/clothes/hoodie/hoodie2.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(1);

        $product = Product::create([
            'name' => 'Hoodie',
            'description' => 'Aesthetic Yellow Hoodie',
            'quantity' => 8,
            'price' => 16000,
            'photo_name' => 'Product Photo/clothes/hoodie/hoodie3.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(1);

        $product = Product::create([
            'name' => 'Hoodie',
            'description' => 'Old Navy',
            'quantity' => 10,
            'price' => 17000,
            'photo_name' => 'Product Photo/clothes/hoodie/hoodie4.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(1);

        $product = Product::create([
            'name' => 'Hoodie',
            'description' => 'Simple Pullover Hoodie',
            'quantity' => 10,
            'price' => 18000,
            'photo_name' => 'Product Photo/clothes/hoodie/hoodie5.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(1);

        $product = Product::create([
            'name' => 'Hoodie',
            'description' => 'Snow Flake Pattern',
            'quantity' => 10,
            'price' => 18000,
            'photo_name' => 'Product Photo/clothes/hoodie/hoodie6.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(1);

        $product = Product::create([
            'name' => 'Shirt',
            'description' => 'Aesthetic Pink Long Sleeve',
            'quantity' => 7,
            'price' => 8000,
            'photo_name' => 'Product Photo/clothes/shirt/shirt1.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(1);

        $product = Product::create([
            'name' => 'Shirt',
            'description' => 'Comfortable Shirt',
            'quantity' => 10,
            'price' => 10000,
            'photo_name' => 'Product Photo/clothes/shirt/shirt2.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(1);

        $product = Product::create([
            'name' => 'Shirt',
            'description' => 'Simple Top with Lines',
            'quantity' => 10,
            'price' => 11000,
            'photo_name' => 'Product Photo/clothes/shirt/shirt3.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(1);

        $product = Product::create([
            'name' => 'Shirt',
            'description' => 'Blue & Yellow Lines',
            'quantity' => 10,
            'price' => 10000,
            'photo_name' => 'Product Photo/clothes/shirt/shirt4.jpeg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(1);

        $product = Product::create([
            'name' => 'Shirt',
            'description' => 'Plaid Shirt',
            'quantity' => 8,
            'price' => 13000,
            'photo_name' => 'Product Photo/clothes/shirt/shirt5.jpeg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(1);

        $product = Product::create([
            'name' => 'Shirt',
            'description' => 'French Toast School Wear',
            'quantity' => 15,
            'price' => 12000,
            'photo_name' => 'Product Photo/clothes/shirt/shirt6.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(1);

        $product = Product::create([
            'name' => 'Shirt',
            'description' => 'Disney Hawaii Shirt',
            'quantity' => 10,
            'price' => 12000,
            'photo_name' => 'Product Photo/clothes/shirt/shirt7.jpeg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(1);

        $product = Product::create([
            'name' => 'Skirt',
            'description' => 'Hearty Heart',
            'quantity' => 5,
            'price' => 10000,
            'photo_name' => 'Product Photo/clothes/skirt/skirt1.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(1);

        $product = Product::create([
            'name' => 'Skirt',
            'description' => 'Plaid Mini Skirt',
            'quantity' => 10,
            'price' => 9000,
            'photo_name' => 'Product Photo/clothes/skirt/skirt2.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(1);

        $product = Product::create([
            'name' => 'Skirt',
            'description' => 'Jean Short Skirt',
            'quantity' => 8,
            'price' => 12000,
            'photo_name' => 'Product Photo/clothes/skirt/skirt3.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(1);

        $product = Product::create([
            'name' => 'Skirt',
            'description' => 'Pleated Long Skirt',
            'quantity' => 7,
            'price' => 10500,
            'photo_name' => 'Product Photo/clothes/skirt/skirt4.jpeg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(1);

        $product = Product::create([
            'name' => 'Trousers',
            'description' => 'Slim Fit Trousers',
            'quantity' => 10,
            'price' => 11000,
            'photo_name' => 'Product Photo/clothes/trousers/trousers1.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(1);

        $product = Product::create([
            'name' => 'Trousers',
            'description' => 'Joggers',
            'quantity' => 15,
            'price' => 10000,
            'photo_name' => 'Product Photo/clothes/trousers/trousers2.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(1);

        $product = Product::create([
            'name' => 'Trousers',
            'description' => 'Casual Trousers',
            'quantity' => 10,
            'price' => 20000,
            'photo_name' => 'Product Photo/clothes/trousers/trousers3.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(1);

        $product = Product::create([
            'name' => 'Trousers',
            'description' => 'Film Avenue Check Trousers',
            'quantity' => 12,
            'price' => 14000,
            'photo_name' => 'Product Photo/clothes/trousers/trousers4.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(1);

        $product = Product::create([
            'name' => 'Trousers',
            'description' => 'Casual Harem Pants',
            'quantity' => 10,
            'price' => 10000,
            'photo_name' => 'Product Photo/clothes/trousers/trousers5.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(1);

        $product = Product::create([
            'name' => 'Trousers',
            'description' => 'Jumpsuit Strap Dungaree Harem Trousers',
            'quantity' => 10,
            'price' => 13000,
            'photo_name' => 'Product Photo/clothes/trousers/trousers6.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(1);

        //Shoe

        $product = Product::create([
            'name' => 'Eyeshadow',
            'description' => 'Play color eye maple road',
            'quantity' => 10,
            'price' => 24000,
            'photo_name' => 'Product Photo/Cosmetic/1.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(2);
        $product = Product::create([
            'name' => 'Eyeshadow',
            'description' => 'Play Color Eye Mini',
            'quantity' => 20,
            'price' => 25000,
            'photo_name' => 'Product Photo/Cosmetic/2.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(2);
        $product = Product::create([
            'name' => 'Eyeshadow',
            'description' => 'Cherry BLossom blusher',
            'quantity' => 20,
            'price' => 13000,
            'photo_name' => 'Product Photo/Cosmetic/3.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(2);
        $product = Product::create([
            'name' => 'Eyeshadow',
            'description' => 'Tulip day',
            'quantity' => 10,
            'price' => 20000,
            'photo_name' => 'Product Photo/Cosmetic/4.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(2);
        $product = Product::create([
            'name' => 'Eyeshadow',
            'description' => 'Maple Road',
            'quantity' => 20,
            'price' => 9000,
            'photo_name' => 'Product Photo/Cosmetic/20.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(2);

        $product = Product::create([
            'name' => 'Mask',
            'description' => 'Green Tea Vitalizing Mud Mask',
            'quantity' => 15,
            'price' => 2000,
            'photo_name' => 'Product Photo/Cosmetic/5.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(2);
        $product = Product::create([
            'name' => 'Mask',
            'description' => 'Calendula Soothing Mud Mask',
            'quantity' => 15,
            'price' => 2000,
            'photo_name' => 'Product Photo/Cosmetic/6.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(2);
        $product = Product::create([
            'name' => 'Mask',
            'description' => 'Aloe Collagen Mask',
            'quantity' => 20,
            'price' => 2000,
            'photo_name' => 'Product Photo/Cosmetic/7.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(2);
        $product = Product::create([
            'name' => 'Mask',
            'description' => 'Avocado Collagen Mask',
            'quantity' => 20,
            'price' => 2000,
            'photo_name' => 'Product Photo/Cosmetic/8.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(2);
        $product = Product::create([
            'name' => 'Mask',
            'description' => 'Blueberry Collagen Mask',
            'quantity' => 20,
            'price' => 2000,
            'photo_name' => 'Product Photo/Cosmetic/9.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(2);
        $product = Product::create([
            'name' => 'Lipstick',
            'description' => 'Shine chip lip lacquer',
            'quantity' => 20,
            'price' => 16000,
            'photo_name' => 'Product Photo/Cosmetic/10.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(2);
        $product = Product::create([
            'name' => 'Lipstick',
            'description' => 'Apieu water light tint',
            'quantity' => 30,
            'price' => 9000,
            'photo_name' => 'Product Photo/Cosmetic/11.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(2);
        $product = Product::create([
            'name' => 'Lipstick',
            'description' => 'Velvet lip tint',
            'quantity' => 30,
            'price' => 19500,
            'photo_name' => 'Product Photo/Cosmetic/12.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(2);
        $product = Product::create([
            'name' => 'Lipstick',
            'description' => 'Lilybyred mood liar velvet tint',
            'quantity' => 20,
            'price' => 10000,
            'photo_name' => 'Product Photo/Cosmetic/13.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(2);
        $product = Product::create([
            'name' => 'Lipstick',
            'description' => 'tattoo tint',
            'quantity' => 25,
            'price' => 15000,
            'photo_name' => 'Product Photo/Cosmetic/14.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(2);
        $product = Product::create([
            'name' => 'Foundation',
            'description' => 'Serum Foundation',
            'quantity' => 25,
            'price' => 19000,
            'photo_name' => 'Product Photo/Cosmetic/15.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(2);
        $product = Product::create([
            'name' => 'Foundation',
            'description' => 'Double lasting foundation',
            'quantity' => 10,
            'price' => 18500,
            'photo_name' => 'Product Photo/Cosmetic/16.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(2);
        $product = Product::create([
            'name' => 'Foundation',
            'description' => 'Double lasting cushion',
            'quantity' => 15,
            'price' => 28000,
            'photo_name' => 'Product Photo/Cosmetic/17.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(2);
        $product = Product::create([
            'name' => 'Foundation',
            'description' => 'Skin glow essence cushion',
            'quantity' => 10,
            'price' => 25500,
            'photo_name' => 'Product Photo/Cosmetic/18.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(2);
        $product = Product::create([
            'name' => 'Foundation',
            'description' => 'Laneige layering cushion',
            'quantity' => 20,
            'price' => 30000,
            'photo_name' => 'Product Photo/Cosmetic/19.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(2);
        $product = Product::create([
            'name' => 'Mascara',
            'description' => 'Maybelline',
            'quantity' => 15,
            'price' => 8000,
            'photo_name' => 'Product Photo/Cosmetic/21.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(2);
        $product = Product::create([
            'name' => 'Mascara',
            'description' => 'Novo',
            'quantity' => 25,
            'price' => 9000,
            'photo_name' => 'Product Photo/Cosmetic/22.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(2);
        $product = Product::create([
            'name' => 'Mascara',
            'description' => 'Beauty charm',
            'quantity' => 10,
            'price' => 12000,
            'photo_name' => 'Product Photo/Cosmetic/23.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(2);
        $product = Product::create([
            'name' => 'Mascara',
            'description' => 'Etude house',
            'quantity' => 20,
            'price' => 15000,
            'photo_name' => 'Product Photo/Cosmetic/24.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(2);
        $product = Product::create([
            'name' => 'Mascara',
            'description' => 'Loreal',
            'quantity' => 10,
            'price' => 13000,
            'photo_name' => 'Product Photo/Cosmetic/25.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(2);
        $product = Product::create([
            'name' => 'Eyeliner',
            'description' => 'NYX matte liquid',
            'quantity' => 10,
            'price' => 19000,
            'photo_name' => 'Product Photo/Cosmetic/26.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(2);
        $product = Product::create([
            'name' => 'Eyeliner',
            'description' => 'Retractable eyeliner',
            'quantity' => 10,
            'price' => 19000,
            'photo_name' => 'Product Photo/Cosmetic/27.jpeg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(2);
        $product = Product::create([
            'name' => 'Eyeliner',
            'description' => 'Matte liquid',
            'quantity' => 10,
            'price' => 21000,
            'photo_name' => 'Product Photo/Cosmetic/28.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(2);
        $product = Product::create([
            'name' => 'Eyeliner',
            'description' => 'Pencil Eyeliner',
            'quantity' => 10,
            'price' => 19000,
            'photo_name' => 'Product Photo/Cosmetic/29.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(2);
        $product = Product::create([
            'name' => 'Eyeliner',
            'description' => 'Pencil',
            'quantity' => 10,
            'price' => 18000,
            'photo_name' => 'Product Photo/Cosmetic/30.jpeg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(2);

        //Stationary

        $product = Product::create([
            'name' => '2020 Monthly Planner Book',
            'description' => '1 year planner with important dates',
            'quantity' => 50,
            'price' => 7500,
            'photo_name' => 'Product Photo/Stationary/1.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(4);


        $product = Product::create([
            'name' => 'Diary Notebook',
            'description' => 'This notebook would be the perfect book for you to share and collect your memories',
            'quantity' => 50,
            'price' => 5500,
            'photo_name' => 'Product Photo/Stationary/5.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(4);

        $product = Product::create([
            'name' => 'Black Sketch Diary Notebook',
            'description' => 'Ideal for writing,drawing and sketching & A very beautiful gift for yourself or your friends',
            'quantity' => 50,
            'price' => 6500,
            'photo_name' => 'Product Photo/Stationary/4.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(4);

        $product = Product::create([
            'name' => 'Foil Washi Tape',
            'description' => 'To decorate your notebook',
            'quantity' => 50,
            'price' => 4500,
            'photo_name' => 'Product Photo/Stationary/8.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(4);

        $product = Product::create([
            'name' => 'Glitter Pens',
            'description' => 'To decorate your notebook',
            'quantity' => 50,
            'price' => 3500,
            'photo_name' => 'Product Photo/Stationary/11.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(4);

        $product = Product::create([
            'name' => '2020 Monthly Planner Book',
            'description' => '1 year planner with important dates',
            'quantity' => 50,
            'price' => 7500,
            'photo_name' => 'Product Photo/Stationary/2.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(4);


        $product = Product::create([
            'name' => 'Pastel Pens',
            'description' => 'To decorate your notebook',
            'quantity' => 50,
            'price' => 3500,
            'photo_name' => 'Product Photo/Stationary/12.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(4);

        $product = Product::create([
            'name' => 'Diary Notebook',
            'description' => 'This notebook would be the perfect book for you to share and collect your memories',
            'quantity' => 30,
            'price' => 5500,
            'photo_name' => 'Product Photo/Stationary/6.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(4);

        $product = Product::create([
            'name' => 'Diary Notebook',
            'description' => 'This notebook would be the perfect book for you to share and collect your memories',
            'quantity' => 50,
            'price' => 5500,
            'photo_name' => 'Product Photo/Stationary/7.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(4);


        $product = Product::create([
            'name' => 'All Black Notebook',
            'description' => 'Ideal for writing,drawing and sketching & A very beautiful gift for yourself or your friends',
            'quantity' => 50,
            'price' => 7000,
            'photo_name' => 'Product Photo/Stationary/3.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(4);

        $product = Product::create([
            'name' => 'Keychains',
            'description' => 'keychain',
            'quantity' => 50,
            'price' => 1800,
            'photo_name' => 'Product Photo/Stationary/13.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(4);

        $product = Product::create([
            'name' => 'Keychains',
            'description' => 'keychain',
            'quantity' => 50,
            'price' => 1800,
            'photo_name' => 'Product Photo/Stationary/14.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(4);

        $product = Product::create([
            'name' => 'Keychains',
            'description' => 'keychain',
            'quantity' => 50,
            'price' => 1800,
            'photo_name' => 'Product Photo/Stationary/15.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(4);

        $product = Product::create([
            'name' => 'Keychains',
            'description' => 'keychain',
            'quantity' => 50,
            'price' => 1800,
            'photo_name' => 'Product Photo/Stationary/16.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(4);

        $product = Product::create([
            'name' => 'Stationary Rack',
            'description' => 'To decorate your notebook',
            'quantity' => 50,
            'price' => 18500,
            'photo_name' => 'Product Photo/Stationary/17.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(4);

        $product = Product::create([
            'name' => 'Stationary Rack',
            'description' => 'To available space inside your store',
            'quantity' => 50,
            'price' => 18500,
            'photo_name' => 'Product Photo/Stationary/18.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(4);

        $product = Product::create([
            'name' => 'Stationary Rack',
            'description' => 'To available space inside your store',
            'quantity' => 50,
            'price' => 18500,
            'photo_name' => 'Product Photo/Stationary/19.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(4);

        $product = Product::create([
            'name' => 'Ring Binder Notebook',
            'description' => 'To collect and share your memories',
            'quantity' => 50,
            'price' => 5500,
            'photo_name' => 'Product Photo/Stationary/20.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(4);


        $product = Product::create([
            'name' => 'Ring Binder Notebook',
            'description' => 'To collect and share your memories',
            'quantity' => 50,
            'price' => 5500,
            'photo_name' => 'Product Photo/Stationary/21.jpg',
            'created_at' => Carbon::now()
        ]);$product->categories()->sync(4);


        // $product = Product::create([
        //     'name' => 'Ring Binder Notebook',
        //     'description' => 'To collect and share your memories',
        //     'quantity' => 50,
        //     'price' => 5500,
        //     'photo_name' => 'Product Photo/Stationary/22.jpg',
        //     'created_at' => Carbon::now()
        // ]);$product->categories()->sync(4);


        // $product = Product::create([
        //     'name' => 'Stickers',
        //     'description' => 'sticker',
        //     'quantity' => 50,
        //     'price' => 1000,
        //     'photo_name' => 'Product Photo/Stationary/23.jpg',
        //     'created_at' => Carbon::now()
        // ]);$product->categories()->sync(4);

        //shoes
        $product = Product::create(['name'=>'Adidas', 'description'=>'Alphabounce Instinct CC',
'quantity'=>10,
'price'=>196000,
'photo_name'=>'Product Photo/Shoes/adidas/Alphabounce Instinct CC.jpg',
'created_at'=> Carbon::now()]);$product->categories()->sync(3);

$product = Product::create(['name'=>'Adidas', 'description'=>'Crazychaos Shoes',
'quantity'=>10,
'price'=>148500,
'photo_name'=>'Product Photo/Shoes/adidas/Crazychaos Shoes.jpg',
'created_at'=> Carbon::now()]);$product->categories()->sync(3);

$product = Product::create(['name'=>'Adidas', 'description'=>'Ultraboost 20',
'quantity'=>10,
'price'=>325000,
'photo_name'=>'Product Photo/Shoes/adidas/Ultraboost 20.jpg',
'created_at'=> Carbon::now()]);$product->categories()->sync(3);

$product = Product::create(['name'=>'Adidas', 'description'=>'adidas Nova Run',
'quantity'=>10,
'price'=>173400,
'photo_name'=>'Product Photo/Shoes/adidas/adidas Nova Run.jpg',
'created_at'=> Carbon::now()]);$product->categories()->sync(3);

$product = Product::create(['name'=>'Adidas', 'description'=>'Alphabounce RC 2s',
'quantity'=>7,
'price'=>158400,
'photo_name'=>'Product Photo/Shoes/adidas/Alphabounce RC 2.jpg',
'created_at'=> Carbon::now()]);$product->categories()->sync(3);

$product = Product::create(['name'=>'Nike', 'description'=>'Nike M2k Tekno',
'quantity'=>5,
'price'=>21000,
'photo_name'=>'Product Photo/Shoes/nike/Nike M2k Tekno.jpg',
'created_at'=> Carbon::now()]);$product->categories()->sync(3);

$product = Product::create(['name'=>'Nike', 'description'=>'Air Force 1',
'quantity'=>8,
'price'=>285000,
'photo_name'=>'Product Photo/Shoes/nike/Air Force 1.jpg',
'created_at'=> Carbon::now()]);$product->categories()->sync(3);

$product = Product::create(['name'=>'Nike', 'description'=>'Airmax 90 CNY',
'quantity'=>10,
'price'=>92000,
'photo_name'=>'Product Photo/Shoes/nike/Airmax 90 CNY.jpg',
'created_at'=> Carbon::now()]);$product->categories()->sync(3);

$product = Product::create(['name'=>'Nike', 'description'=>'Nike Lunarcharge',
'quantity'=>10,
'price'=>78000,
'photo_name'=>'Product Photo/Shoes/nike/Nike Lunarcharge.jpg',
'created_at'=> Carbon::now()]);$product->categories()->sync(3);

$product = Product::create(['name'=>'Nike', 'description'=>'Nike Air SPAN II',
'quantity'=>10,
'price'=>115000,
'photo_name'=>'Product Photo/Shoes/nike/Nike Air SPAN II.jpg',
'created_at'=> Carbon::now()]);$product->categories()->sync(3);

$product = Product::create(['name'=>'Puma', 'description'=>'2020 Style Rider',
'quantity'=>10,
'price'=>209900,
'photo_name'=>'Product Photo/Shoes/puma/2020 Style Rider.jpg',
'created_at'=> Carbon::now()]);$product->categories()->sync(3);

$product = Product::create(['name'=>'Puma', 'description'=>'Zone XT',
'quantity'=>10,
'price'=>189900,
'photo_name'=>'Product Photo/Shoes/puma/Zone XT.jpg',
'created_at'=> Carbon::now()]);$product->categories()->sync(3);

$product = Product::create(['name'=>'Puma', 'description'=>'Hybrid',
'quantity'=>10,
'price'=>249900,
'photo_name'=>'Product Photo/Shoes/puma/Hybrid.jpg',
'created_at'=> Carbon::now()]);$product->categories()->sync(3);

$product = Product::create(['name'=>'Puma', 'description'=>'LQDCELL Tension Rave men\'s training shoe',
'quantity'=>7,
'price'=>209900,
'photo_name'=>'Product Photo/Shoes/puma/LQDCELL Tension Rave men\'s training shoe.jpg',
'created_at'=> Carbon::now()]);$product->categories()->sync(3);

$product = Product::create(['name'=>'Puma', 'description'=>'Run & Train',
'quantity'=>10,
'price'=>17700,
'photo_name'=>'Product Photo/Shoes/puma/Run & Train.jpg',
'created_at'=> Carbon::now()]);$product->categories()->sync(3);

      

    }
}
