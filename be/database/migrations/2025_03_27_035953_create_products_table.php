<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Khóa chính AUTO_INCREMENT
            $table->string('name', 255); // Tên sản phẩm
            $table->integer('price'); // Giá sản phẩm
            $table->integer('sale')->default(0); // Giá giảm giá (mặc định 0)
            $table->string('image', 255)->nullable(); // Ảnh sản phẩm chính (có thể null)
            $table->string('extra_images', 500)->nullable(); // Ảnh bổ sung (chuỗi JSON hoặc danh sách URL)
            $table->text('short_description')->nullable(); // Mô tả ngắn
            $table->text('detailed_description')->nullable(); // Mô tả chi tiết
            $table->integer('stock_quantity')->default(1); // Số lượng trong kho (mặc định 0)
            $table->tinyInteger('rating')->default(0); // Đánh giá sản phẩm (mặc định 0)
            $table->tinyInteger('status')->default(1); // Trạng thái sản phẩm (1: hiển thị, 0: ẩn)
            $table->integer('views')->default(0); // Số lượt xem (mặc định 0)
            $table->text('tags')->nullable(); // Thẻ sản phẩm (có thể null)
            $table->integer('sold')->default(0); // Số lượng đã bán (mặc định 0)
            $table->unsignedBigInteger('category_id')->nullable(); // ID danh mục (liên kết đến categories)
            $table->timestamps(); // created_at & updated_at

            // Tạo khóa ngoại liên kết đến bảng categories
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
