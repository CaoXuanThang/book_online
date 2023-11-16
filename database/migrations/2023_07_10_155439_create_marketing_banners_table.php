<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marketing_banners', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Trường banner_name (tên banner)
            $table->string('description')->nullable(); // Trường banner_description (mới
            $table->string('image'); // Trường image_url (đường dẫn hình ảnh)
            $table->string('book_id');
            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marketing_banners');
    }
};
