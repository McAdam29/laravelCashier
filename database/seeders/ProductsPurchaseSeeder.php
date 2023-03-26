<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductPurchase;

class ProductsPurchaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        for($a=1;$a<100;$a++) {
            if ($a%2 == 0) {
                $planType = 2;
                $planPrice = 1500;
                $planName = 'MSI Gaming Conductor';
                $productID = 'price_1MpUcuSBAosP2SVFxSguPPu0';
            } else {
                $planType = 1;
                $planPrice = 800;
                $planName = 'AMD Gaming Set';
                $productID = 'price_1MpVcKSBAosP2SVFMxPyymcU';
            }
            $list = [
                'fk_users_id' => 1500 + (int)$a,
                'fk_customers_id' => 2300 + (int)$a,
                'product_name' => $planName,
                'product_type' => $planType,
                'product_id' => $productID,
                'price' => $planPrice,
                'remarks' => 'Remarks '.$a
            ];

            ProductPurchase::create($list);
        }
    }
}
