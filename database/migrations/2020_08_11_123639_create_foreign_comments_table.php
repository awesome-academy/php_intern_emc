<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')
                ->on('products')->onDelete('cascade');

            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade');

            $table->foreign('parent_id')->references('id')
                ->on('comments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign('comments_product_id_foreign');
            $table->dropForeign('comments_user_id_foreign');
            $table->dropForeign('comments_parent_id_foreign');
        });
    }
}
