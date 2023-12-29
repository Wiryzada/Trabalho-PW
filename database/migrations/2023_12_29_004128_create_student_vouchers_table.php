<?php

use App\Models\Student;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('student_vouchers', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Student::class);
            $table->date('validity')->nullable();
            $table->enum('status', ['Pendente', 'Aprovado', 'Reprovado'])->default('Pendente');
            $table->string('code_voucher')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_vouchers');
    }
};
