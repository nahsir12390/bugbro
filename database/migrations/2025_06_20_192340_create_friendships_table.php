<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  // database/migrations/xxxx_xx_xx_create_friendships_table.php

public function up()
{
    Schema::create('friendships', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('sender_id');
        $table->unsignedBigInteger('receiver_id');
        $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending');
        $table->timestamps();

        $table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('receiver_id')->references('id')->on('users')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('friendships');
    }
};
