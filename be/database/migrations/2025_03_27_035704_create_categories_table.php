<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // Khóa chính AUTO_INCREMENT
            $table->string('name', 255); // Tên danh mục
            $table->string('image', 255)->nullable(); // Ảnh danh mục (có thể null)
            $table->text('description')->nullable(); // Mô tả danh mục (có thể null)
            $table->string('type', 50)->nullable(); // Loại danh mục (có thể null)
            $table->tinyInteger('status')->default(1); // Trạng thái (mặc định 1: hoạt động)
            $table->timestamps(); // created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};

