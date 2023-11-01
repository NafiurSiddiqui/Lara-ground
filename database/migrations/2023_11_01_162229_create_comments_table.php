<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            // $table->unsignedBigInteger('user_id');
            $table->text('body');
            $table->timestamps();
            // Foreign key constraints
            // $table->foreign('post_id')->references('id')->on('posts')
            // ->cascadeOnDelete()
            
            //shortcut to foreign constraints is put up there
           
        });

        /**
         * @unsignedBigInteger('post_id') and user_id: done so to create the relationship.
         * The reason we used unsignedBigInteger is because 'user_id' and 'post_id' in the db is of BigInt.
         * unsigned meaning always a postive number and never a negative.
         */

        /**
         * NOTE:
         *FOREIGN CONSTRAINTS -
         *Foreign key constraints are used to prevent actions that would destroy links between tables.
         *For example, if you delete a record from one table, it will automatically remove any records with foreign keys pointing to this primary key.
         *SO, our Foreign contstraints are saying, if a post with the post_id is deleted, cascade down and delete all records associated with this post.

         */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
