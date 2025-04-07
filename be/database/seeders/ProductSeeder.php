<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Điện thoại iPhone 14',
                'price' => 25000000,
                'sale' => 23990000,
                'image' => 'phone14.png',
                'extra_images' => json_encode(['iphone14_1.jpg', 'iphone14_2.jpg']),
                'short_description' => 'Điện thoại iPhone 14 chính hãng',
                'detailed_description' => 'Màn hình Super Retina XDR, chip A15 Bionic',
                'stock_quantity' => 100,
                'rating' => 5,
                'status' => 1,
                'views' => 500,
                'tags' => 'iPhone, Apple, Smartphone',
                'sold' => 30,
                'category_id' => 1,
            ],
            [
                'name' => 'Laptop Dell XPS 13',
                'price' => 30000000,
                'sale' => 28990000,
                'image' => 'dell13.jpg',
                'extra_images' => json_encode(['dellxps_1.jpg', 'dellxps_2.jpg']),
                'short_description' => 'Laptop mỏng nhẹ hiệu năng cao',
                'detailed_description' => 'Trang bị Intel Core i7, màn hình 4K UHD',
                'stock_quantity' => 50,
                'rating' => 5,
                'status' => 1,
                'views' => 320,
                'tags' => 'Laptop, Dell, XPS',
                'sold' => 20,
                'category_id' => 2,
            ],
            [
                'name' => 'Máy tính bảng iPad Air',
                'price' => 16000000,
                'sale' => 15490000,
                'image' => 'ipadair.jpg',
                'extra_images' => json_encode(['ipadair_1.jpg', 'ipadair_2.jpg']),
                'short_description' => 'iPad Air 2022 chính hãng',
                'detailed_description' => 'Chip M1, màn hình Liquid Retina',
                'stock_quantity' => 80,
                'rating' => 4,
                'status' => 1,
                'views' => 210,
                'tags' => 'iPad, Apple, Tablet',
                'sold' => 25,
                'category_id' => 3,
            ],
            [
                'name' => 'Tai nghe Sony WH-1000XM4',
                'price' => 9000000,
                'sale' => 8490000,
                'image' => 'sonywh1000xm4.avif',
                'extra_images' => json_encode(['sonywh_1.jpg', 'sonywh_2.jpg']),
                'short_description' => 'Tai nghe chống ồn cao cấp',
                'detailed_description' => 'Công nghệ chống ồn ANC, thời lượng pin 30h',
                'stock_quantity' => 70,
                'rating' => 5,
                'status' => 1,
                'views' => 180,
                'tags' => 'Tai nghe, Sony, Chống ồn',
                'sold' => 15,
                'category_id' => 4,
            ],
            [
                'name' => 'Loa JBL Charge 5',
                'price' => 4000000,
                'sale' => 3790000,
                'image' => 'jblcharge5.jpg',
                'extra_images' => json_encode(['jblcharge_1.jpg', 'jblcharge_2.jpg']),
                'short_description' => 'Loa bluetooth di động',
                'detailed_description' => 'Chống nước IP67, thời gian phát nhạc 20h',
                'stock_quantity' => 60,
                'rating' => 4,
                'status' => 1,
                'views' => 150,
                'tags' => 'Loa, JBL, Bluetooth',
                'sold' => 12,
                'category_id' => 5,
            ],
        ]);
    }
}
