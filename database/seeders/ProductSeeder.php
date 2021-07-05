<?php

namespace Database\Seeders;

use App\DTO\Product as ProductDTO;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => 'Achocolatado',
                'description' => 'Achocolatado em pó',
                'brand' => 'Toddy',
                'price' => 10,
                'quantity' => 10
            ],
            [
                'name' => 'Leite',
                'description' => 'Leite',
                'brand' => 'Parmalate',
                'price' => 3.49,
                'quantity' => 100
            ],
            [
                'name' => 'Pneu',
                'description' => 'Pneu de caminhão',
                'brand' => 'Goodyear',
                'price' => 350,
                'quantity' => '50'
            ]
        ];

        foreach ($products as $product) {
            $dto = new ProductDTO(
                $product['name'],
                $product['description'],
                $product['brand'],
                (float) $product['price'],
                (int) $product['quantity']
            );

            if (!$record = Product::getFromDTO($dto)) {
                Product::createFromDTO($dto);
                continue;
            }

            $record->updateFromDTO($dto);
        }
    }
}
