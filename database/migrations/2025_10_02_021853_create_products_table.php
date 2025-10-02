<?php
// database/migrations/xxxx_xx_xx_create_products_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->text('description');
            $table->decimal('price', 10, 2);  // Giá tiền
            $table->string('image')->nullable();  // Đường dẫn ảnh
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->integer('stock')->default(0);  // Tồn kho
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('products');
    }
};