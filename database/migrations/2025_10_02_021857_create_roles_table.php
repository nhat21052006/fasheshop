<?php
// database/migrations/xxxx_xx_xx_create_roles_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');  // 'admin', 'user'
            $table->timestamps();
        });

        // Thêm cột role_id vào bảng users (nếu chưa có)
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('role_id')->default(2)->constrained('roles');  // Default user
        });
    }

    public function down(): void {
        Schema::dropIfExists('roles');
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
            $table->dropColumn('role_id');
        });
    }
};