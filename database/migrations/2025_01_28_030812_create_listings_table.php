<?php

use App\Models\User;
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
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->string('slug')->unique(); // Unique slug
            $table->string('company');
            $table->string('location');
            $table->text('logo')->nullable(); // Text for longer paths
            $table->boolean('is_highlighted')->default(false)->index();
            $table->boolean('is_active')->default(true)->index();
            $table->text('content');
            $table->text('apply_link'); // Text for longer URLs
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};
