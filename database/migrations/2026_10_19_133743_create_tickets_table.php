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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')
            ->constrained('categories')
            ->restrictOnDelete();

            $table->foreignId('department_id')
            ->constrained('departments')
            ->restrictOnDelete();

            $table->foreignId('assignee_id')
            ->nullable()
            ->constrained('users')
            ->restrictOnDelete();

            $table->foreignId('requester_id')
            ->constrained('users')
            ->restrictOnDelete();
           

            $table->string('title');
            $table->text('description');
            $table->string('priority')->default('normal');
            $table->string('status')->default('open');
            $table->text('closing_note')->nullable();
            $table->timestamp('closed_at')->nullable();
         $table->timestamps();
         $table->index(['department_id', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
