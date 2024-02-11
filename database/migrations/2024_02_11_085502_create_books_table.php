<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    /**
     * Run the migrations.
     */
    public function up(): void {
        if (!Schema::hasTable('books')) {
            
            
            Schema::create('books', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->charset = 'utf8mb4';
                $table->collation = 'utf8mb4_unicode_ci';
                $table->comment('Public Book\'s table');
                $table->increments('id');
                $table->string('title', 255);
                $table->string('author', 255);
                $table->boolean('active')->default(0);
                $table->boolean('deleted')->default(0);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        if (Schema::hasTable('books')) {
            Schema::dropIfExists('books');
        }
    }
};
