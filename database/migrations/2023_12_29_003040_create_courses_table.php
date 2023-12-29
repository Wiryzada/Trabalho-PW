<?php

use App\Models\Institution;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('acronym')->nullable();
            $table->enum('type',
                [
                    'Ensino Fundamental',
                    'Ensino Médio',
                    'Ensino Técnico',
                    'Bacharelado',
                    'Licenciatura',
                    'Tecnólogo',
                    'Especialização',
                    'Mestrado',
                    'Doutorado'
                ]
            )->default('Bacharelado');
            $table->foreignIdFor(Institution::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
