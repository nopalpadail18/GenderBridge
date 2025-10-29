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
        Schema::create('tbl_forum_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('forum_post_id')->constrained('tbl_forum_posts')->onDelete('cascade');
            $table->foreignId('parent_id')->nullable()->constrained('tbl_forum_comments')->onDelete('cascade');
            $table->longText('content');
            $table->enum('status', ['published', 'hidden_by_moderator'])->default('published');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_forum_comments');
    }
};
