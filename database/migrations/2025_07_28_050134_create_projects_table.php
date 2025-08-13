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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('type', ['mobile_application', 'website', 'ui_ux_design', 'desktop_application','iot_project','game'])->default('website');
            $table->text('description');
            $table->json('tech_stack')->nullable(); // ["Laravel", "React"]
            $table->string('link_preview')->nullable(); // Netlify/Vercel
            $table->string('github_link')->nullable();
            $table->string('thumbnail')->nullable(); // gambar preview
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
