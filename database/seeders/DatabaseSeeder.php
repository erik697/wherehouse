<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use App\Models\Wherehouse;
use App\Models\WherehouseProduct;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@super.com',
            'password' => "admin",
            'level' => 'admin'
        ]);

        User::factory()->create([
            'name' => 'gavin',
            'email' => 'gavin@gmail.com',
            'password' => "gavin",
            'level' => 'user'
        ]);

        User::factory()->create([
            'name' => 'manager',
            'email' => 'manager@gmail.com',
            'password' => "manager",
            'level' => 'manager'
        ]);

        $wherehouses = [
            ['code' => 'AV 6',
            'name' => 'Audio Visual 6'],
            ['code' => 'AV 3',
            'name' => 'Audio Visual 3']
        ];
        DB::table('wherehouses')->insert($wherehouses);
        // Wherehouse::factory()->create([
        //     'code' => 'AV 6',
        //     'name' => 'Audio Visual 6'
        // ]);

        $products = $products = [
            [
                'code' => '11113',
                'name' => 'Monitor Acer',
                'price' => 1500000
            ],
            [
                'code' => '11114',
                'name' => 'Keyboard Logitech',
                'price' => 250000
            ],
            [
                'code' => '11115',
                'name' => 'Mouse Razer',
                'price' => 500000
            ],
            [
                'code' => '11116',
                'name' => 'Headset HyperX',
                'price' => 750000
            ],
            [
                'code' => '11117',
                'name' => 'Webcam Logitech',
                'price' => 400000
            ],
            [
                'code' => '11118',
                'name' => 'Printer Canon',
                'price' => 1200000
            ],
            [
                'code' => '11119',
                'name' => 'Router TP-Link',
                'price' => 300000
            ],
            [
                'code' => '11120',
                'name' => 'Laptop Stand',
                'price' => 200000
            ],
            [
                'code' => '11121',
                'name' => 'SSD Samsung 500GB',
                'price' => 1000000
            ],
            [
                'code' => '11122',
                'name' => 'RAM Corsair 8GB',
                'price' => 700000
            ],
            [
                'code' => '11123',
                'name' => 'Power Supply 500W',
                'price' => 600000
            ],
            [
                'code' => '11124',
                'name' => 'Cooling Fan Noctua',
                'price' => 300000
            ],
            [
                'code' => '11125',
                'name' => 'Motherboard ASUS',
                'price' => 2500000
            ],
            [
                'code' => '11126',
                'name' => 'Graphic Card NVIDIA GTX 1650',
                'price' => 3500000
            ],
            [
                'code' => '11127',
                'name' => 'CPU Intel i5',
                'price' => 2800000
            ],
            [
                'code' => '11128',
                'name' => 'UPS APC',
                'price' => 1000000
            ],
            [
                'code' => '11129',
                'name' => 'Ethernet Cable 10m',
                'price' => 50000
            ],
            [
                'code' => '11130',
                'name' => 'USB Hub 4-Port',
                'price' => 150000
            ],
            [
                'code' => '11131',
                'name' => 'External HDD 1TB',
                'price' => 1200000
            ],
            [
                'code' => '11132',
                'name' => 'Surge Protector',
                'price' => 100000
            ],
            [
                'code' => '11133',
                'name' => 'Webcam Cover',
                'price' => 20000
            ],
            [
                'code' => '11134',
                'name' => 'Laptop Sleeve',
                'price' => 100000
            ],
            [
                'code' => '11135',
                'name' => 'Wireless Mouse Logitech',
                'price' => 300000
            ],
            [
                'code' => '11136',
                'name' => 'Docking Station',
                'price' => 700000
            ],
            [
                'code' => '11137',
                'name' => 'DisplayPort Cable',
                'price' => 100000
            ],
            [
                'code' => '11138',
                'name' => 'Bluetooth Adapter',
                'price' => 75000
            ],
            [
                'code' => '11139',
                'name' => 'Laptop Cooling Pad',
                'price' => 150000
            ],
            [
                'code' => '11140',
                'name' => 'Wireless Keyboard',
                'price' => 350000
            ],
            [
                'code' => '11141',
                'name' => 'USB-C Adapter',
                'price' => 50000
            ],
            [
                'code' => '11142',
                'name' => 'Smart Plug',
                'price' => 100000
            ],
            [
                'code' => '11143',
                'name' => 'Monitor Arm',
                'price' => 250000
            ],
            [
                'code' => '11144',
                'name' => 'Graphics Tablet Wacom',
                'price' => 1500000
            ],
            [
                'code' => '11145',
                'name' => 'Projector Screen',
                'price' => 500000
            ],
            [
                'code' => '11146',
                'name' => 'Portable Projector',
                'price' => 2000000
            ],
            [
                'code' => '11147',
                'name' => 'Laptop Charger Universal',
                'price' => 300000
            ],
            [
                'code' => '11148',
                'name' => 'SSD External 250GB',
                'price' => 800000
            ],
            [
                'code' => '11149',
                'name' => 'Microphone Stand',
                'price' => 100000
            ],
            [
                'code' => '11150',
                'name' => 'Monitor LG',
                'price' => 1800000
            ],
            [
                'code' => '11151',
                'name' => 'Wireless Headphones',
                'price' => 500000
            ],
            [
                'code' => '11152',
                'name' => 'Gaming Chair',
                'price' => 1500000
            ],
            [
                'code' => '11153',
                'name' => 'VR Headset',
                'price' => 2500000
            ],
            [
                'code' => '11154',
                'name' => 'External DVD Drive',
                'price' => 300000
            ],
            [
                'code' => '11155',
                'name' => 'Soundbar',
                'price' => 600000
            ],
            [
                'code' => '11156',
                'name' => 'Desk Lamp LED',
                'price' => 100000
            ],
            [
                'code' => '11157',
                'name' => 'Laptop Backpack',
                'price' => 200000
            ],
            [
                'code' => '11158',
                'name' => 'Portable SSD 1TB',
                'price' => 1500000
            ],
            [
                'code' => '11159',
                'name' => 'Smart Speaker',
                'price' => 400000
            ],
            [
                'code' => '11160',
                'name' => 'Ergonomic Mouse Pad',
                'price' => 50000
            ]
        ];
        


        // Product::factory()->create([
        //     'code' => '11112',
        //     'name' => 'Monitor Asus',
        //     'price' => 1650000
        // ]);
        DB::table('products')->insert($products);
        WherehouseProduct::factory()->create([
            'Wherehouse_id'=> 1,
            'user_id'=> 1,
            'status'=> 'success',
            'register'=> '2024-10-24'
        ]);

        $log_product = [
            [
                'Wherehouse_product_id'=> 1,
                'product_id' => 1,
                'amount'=> 30,
                'type'=> 'in',
                'status' => 'good'
            ],
            [
                'Wherehouse_product_id'=> 1,
                'product_id' => 1,
                'amount'=> 20,
                'type'=> 'in',
                'status' => 'bad'
            ],
            [
                'Wherehouse_product_id'=> 1,
                'product_id' => 2,
                'amount'=> 33,
                'type'=> 'in',
                'status' => 'good'
            ],
            [
                'Wherehouse_product_id'=> 1,
                'product_id' => 2,
                'amount'=> 33,
                'type'=> 'in',
                'status' => 'good'
            ],
            [
                'Wherehouse_product_id' => 1,
                'product_id' => 2,
                'amount' => 75,
                'type' => 'in',
                'status' => 'good'
            ],
            [
                'Wherehouse_product_id' => 1,
                'product_id' => 3,
                'amount' => 60,
                'type' => 'in',
                'status' => 'good'
            ],
            [
                'Wherehouse_product_id' => 1,
                'product_id' => 4,
                'amount' => 80,
                'type' => 'in',
                'status' => 'good'
            ],
            [
                'Wherehouse_product_id' => 1,
                'product_id' => 5,
                'amount' => 45,
                'type' => 'in',
                'status' => 'good'
            ],
            [
                'Wherehouse_product_id' => 1,
                'product_id' => 6,
                'amount' => 90,
                'type' => 'in',
                'status' => 'good'
            ],
            [
                'Wherehouse_product_id' => 1,
                'product_id' => 7,
                'amount' => 55,
                'type' => 'in',
                'status' => 'good'
            ],
            [
                'Wherehouse_product_id' => 1,
                'product_id' => 8,
                'amount' => 70,
                'type' => 'in',
                'status' => 'good'
            ],
            [
                'Wherehouse_product_id' => 1,
                'product_id' => 9,
                'amount' => 65,
                'type' => 'in',
                'status' => 'good'
            ],
            [
                'Wherehouse_product_id' => 1,
                'product_id' => 10,
                'amount' => 85,
                'type' => 'in',
                'status' => 'good'
            ],
            [
                'Wherehouse_product_id' => 1,
                'product_id' => 11,
                'amount' => 50,
                'type' => 'in',
                'status' => 'good'
            ],
            [
                'Wherehouse_product_id' => 1,
                'product_id' => 12,
                'amount' => 60,
                'type' => 'in',
                'status' => 'good'
            ],
            [
                'Wherehouse_product_id' => 1,
                'product_id' => 13,
                'amount' => 70,
                'type' => 'in',
                'status' => 'good'
            ],
            [
                'Wherehouse_product_id' => 1,
                'product_id' => 14,
                'amount' => 55,
                'type' => 'in',
                'status' => 'good'
            ],
            [
                'Wherehouse_product_id' => 1,
                'product_id' => 15,
                'amount' => 65,
                'type' => 'in',
                'status' => 'good'
            ],
            [
                'Wherehouse_product_id' => 1,
                'product_id' => 16,
                'amount' => 75,
                'type' => 'in',
                'status' => 'good'
            ],
            [
                'Wherehouse_product_id' => 1,
                'product_id' => 17,
                'amount' => 85,
                'type' => 'in',
                'status' => 'good'
            ],
            [
                'Wherehouse_product_id' => 1,
                'product_id' => 18,
                'amount' => 60,
                'type' => 'in',
                'status' => 'good'
            ],
            [
                'Wherehouse_product_id' => 1,
                'product_id' => 19,
                'amount' => 45,
                'type' => 'in',
                'status' => 'good'
            ],
            [
                'Wherehouse_product_id' => 1,
                'product_id' => 20,
                'amount' => 80,
                'type' => 'in',
                'status' => 'good'
            ],
            [
                'Wherehouse_product_id' => 1,
                'product_id' => 21,
                'amount' => 90,
                'type' => 'in',
                'status' => 'good'
            ],
            [
                'Wherehouse_product_id' => 1,
                'product_id' => 22,
                'amount' => 55,
                'type' => 'in',
                'status' => 'good'
            ],
            [
                'Wherehouse_product_id' => 1,
                'product_id' => 23,
                'amount' => 75,
                'type' => 'in',
                'status' => 'good'
            ],
            [
                'Wherehouse_product_id' => 1,
                'product_id' => 24,
                'amount' => 65,
                'type' => 'in',
                'status' => 'good'
            ],
            [
                'Wherehouse_product_id' => 1,
                'product_id' => 25,
                'amount' => 85,
                'type' => 'in',
                'status' => 'good'
            ],
            [
                'Wherehouse_product_id' => 1,
                'product_id' => 26,
                'amount' => 50,
                'type' => 'in',
                'status' => 'good'
            ],
            [
                'Wherehouse_product_id' => 1,
                'product_id' => 27,
                'amount' => 70,
                'type' => 'in',
                'status' => 'good'
            ],
            [
                'Wherehouse_product_id' => 1,
                'product_id' => 28,
                'amount' => 60,
                'type' => 'in',
                'status' => 'good'
            ],
            [
                'Wherehouse_product_id' => 1,
                'product_id' => 29,
                'amount' => 75,
                'type' => 'in',
                'status' => 'good'
            ],
            [
                'Wherehouse_product_id' => 1,
                'product_id' => 30,
                'amount' => 55,
                'type' => 'in',
                'status' => 'good'
            ]
        ];

        DB::table('log_products')->insert($log_product);

    }
}
