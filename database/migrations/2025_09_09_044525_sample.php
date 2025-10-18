<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // === USERS TABLE ===
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role')->default('user'); // ubah default dari 'users' jadi 'user'
            $table->rememberToken();
            $table->timestamps();
        });

        // === CATEGORIES TABLE ===
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // === PRODUCTS TABLE ===
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');      
            $table->string('unit');             
            $table->string('type');              
            $table->text('information')->nullable(); 
            $table->integer('qty');               
            $table->string('producer');          
            $table->unsignedBigInteger('category_id')->nullable(); 
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('users');
    }
};
