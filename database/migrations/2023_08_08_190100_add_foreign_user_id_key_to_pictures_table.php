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
        Schema::table('pictures', function (Blueprint $table) {
            //aggiungo la foreign key
            $table->foreignId('user_id')
            ->nullable()->costrained()
            //!si usa nullable perchè 
            // ->onUpdate('cascade')--> questa non serve perchè l'id è univoco oer sempre
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pictures', function (Blueprint $table) {
            //! fare il drop con l'utilizzo di un array
            $table->dropForeign(['user_id']);
        });
    }
};
