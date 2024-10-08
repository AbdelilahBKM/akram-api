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
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('nom_produit')->unique();
            $table->string('image_produit');
            $table->string('image_url');
            $table->string('description')->nullable();
            $table->decimal('prix', 9, 2);
            $table->boolean('en_promotion')->default(false);
            $table->decimal('remise', 9, 2)->default(0);
            $table->date('date_limit_promotion')->nullable();
            $table->foreignId('categorie')->constrained('categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
