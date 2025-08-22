<?php
declare(strict_types=1);
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
        Schema::create('inspection_configurations', function (Blueprint $table) {
            $table->id();
            $table->string('no');
            $table->string('measuring_tool');
            $table->string('specification');
            $table->string('tolerance_upper');
            $table->string('tolerance_lower');
            $table->string('upper_limit');
            $table->string('lower_limit');
            $table->string('center');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inspection_configurations');
    }
};