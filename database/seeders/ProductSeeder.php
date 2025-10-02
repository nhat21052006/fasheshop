<?php
// database/seeders/ProductSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use App\Models\Role;
use App\Models\User;

class ProductSeeder extends Seeder {
    public function run(): void {
        // Tạo roles
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);

        // Tạo admin user
        User::create([
            'name' => 'Admin Fashe',
            'email' => 'admin@fasheshop.com',
            'password' => bcrypt('password'),
            'role_id' => 1  // Admin
        ]);

        // Tạo categories
        $aoCategory = Category::create(['name' => 'Áo thun']);
        $quanCategory = Category::create(['name' => 'Quần jeans']);

        // Tạo products mẫu
        Product::create([
            'name' => 'Áo thun nam cotton',
            'description' => 'Áo thun chất lượng cao, thoáng mát.',
            'price' => 200000,
            'image' => 'ao_thun_nam.jpg',  // Upload ảnh vào storage sau
            'category_id' => $aoCategory->id,
            'stock' => 50
        ]);

        Product::create([
            'name' => 'Quần jeans nữ',
            'description' => 'Quần jeans slim fit, bền đẹp.',
            'price' => 350000,
            'image' => 'quan_jeans_nu.jpg',
            'category_id' => $quanCategory->id,
            'stock' => 30
        ]);

        // Thêm 3-4 sản phẩm nữa tương tự...
    }
}